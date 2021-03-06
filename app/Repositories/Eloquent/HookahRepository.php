<?php


namespace App\Repositories\Eloquent;


use App\Http\Requests\BookingRequest;
use App\Http\Requests\HookahRequest;
use App\Models\Hookah;
use App\Models\SmokingBar;
use App\Repositories\HookahRepositoryInterface;
use Illuminate\Http\Request;

class HookahRepository implements HookahRepositoryInterface
{
    public function all($smoking_bar_id) {
        return Hookah::where('smoking_bar_id', $smoking_bar_id)->get();
    }

    public function get($smoking_bar_id, $hookah_id){
        return Hookah::where('smoking_bar_id', $smoking_bar_id)->find($hookah_id);
    }

    public function save($smoking_bar_id, HookahRequest $request) {
        $smoking_bar = SmokingBar::findOrFail($smoking_bar_id);
        $smoking_bar->Hookah()->create($request->all());

        if(isset($smoking_bar->Hookah)){
            return response("success", 204);
        }
    }

    public function update($smoking_bar_id, $hookah_id, HookahRequest $request){
        $hookah = Hookah::where('smoking_bar_id', $smoking_bar_id)->findOrFail($hookah_id);
        $hookah->fill($request);
        $hookah->save();

        if($hookah->save()) {
            return response("success", 204);
        }
    }

    public function delete($smoking_bar_id, $hookah_id){
        $hookah = Hookah::where('smoking_bar_id', $smoking_bar_id)->findOrFail($hookah_id);

        if($hookah->delete()) {
            return response("success", 204);
        }
    }

    public function getAvailableForBooking(BookingRequest $request) {
        $booking_from = $request->booking_from;
        $booking_to = $request->booking_to;

        return Hookah::select('id', 'tubes_count')->whereHas('booking', function ($query) use ($booking_from, $booking_to) {
            $query
                ->whereBetween('bookings.booking_from', [$booking_from, $booking_to])
                ->orWhere(function ($query) use ($booking_from, $booking_to) {
                    $query
                        ->whereBetween('bookings.booking_to', [$booking_from, $booking_to]);
                });

        }, '=', 0)
            ->where('smoking_bar_id', $request->smoking_bar_id)
            ->orderBy('tubes_count', 'DESC')
            ->get()
            ->pluck('tubes_count', 'id')->toArray();
    }

    public function pickHookahsForBooking(BookingRequest $request) {
        $available_hookah = $this->getAvailableForBooking($request);
        $customers_count = $request->customers_count;
        $prepared_hookahs = [];

        if($customers_count > array_sum($available_hookah))  {
            return [];
        }

        while (!empty($available_hookah) && $customers_count > 0) {
            if ($customers_count >= max($available_hookah)) {
                $prepared_hookahs[] = array_key_first($available_hookah);
                $customers_count -= reset($available_hookah);
                unset($available_hookah[array_key_first($available_hookah)]);
                continue;
            } else {
                asort($available_hookah);
                foreach ($available_hookah as $hookah => $tubes) {
                    if ($tubes >= $customers_count) {
                        $prepared_hookahs[] = $hookah;
                        break;
                    }
                }
            }
            break;
        }
        return $prepared_hookahs;
    }
}
