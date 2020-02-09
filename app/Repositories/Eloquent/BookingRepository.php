<?php


namespace App\Repositories\Eloquent;


use App\Models\Booking;
use App\Models\Hookah;
use App\Repositories\BookingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingRepository implements BookingRepositoryInterface
{
    public function all() {

    }

    public function delete($booking_id) {
    }

    public function save(Request $request) {
        $booking_to['booking_to'] = (new Carbon($request->booking_from))->addMinutes(30);
        request()->merge($booking_to);
        $target_hookahs = (new HookahRepository())->pickHookahsForBooking($request);

        if(!empty($target_hookahs)) {
            $hookah_list = Hookah::with('booking')
                ->where('smoking_bar_id', $request->smoking_bar_id)
                ->whereIn('id', $target_hookahs)
                ->get();

            if (isset($hookah_list)) {
                foreach ($hookah_list as $hookah) {
                    $booking = new Booking($request->all());
                    $hookah->Booking()->save($booking);
                }
            }
            return "succes";
        }
        return "no availible hookahs on this time";
    }

    public function getCustomersList() {
        return Booking::select('name')
            ->where('booking_from', '>', now())
            ->distinct()->get();
    }
}
