<?php


namespace App\Repositories\Eloquent;


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
    }

    public function update($smoking_bar_id, $hookah_id, HookahRequest $request){
        $hookah = Hookah::where('smoking_bar_id', $smoking_bar_id)->findOrFail($hookah_id);
        $hookah->fill($request);
        $hookah->save();
    }

    public function delete($smoking_bar_id, $hookah_id){
        Hookah::where('smoking_bar_id', $smoking_bar_id)->findOrFail($hookah_id)->delete();
    }

    public function getAvailableForBooking(Request $request) {
        $booking_from = $request->booking_from;
        $booking_to = $request->booking_to;

        return Hookah::whereHas('booking', function($query) use ($booking_from, $booking_to) {
            $query
                ->whereBetween('bookings.booking_from', [$booking_from, $booking_to])
                ->orWhere(function ($query) use ($booking_from, $booking_to) {
                    $query
                        ->whereBetween('bookings.booking_to', [$booking_from, $booking_to]);
                });

        }, '=', 0)
            ->where('smoking_bar_id', $request->smoking_bar_id)
            ->pluck('id')->toArray();
    }
}
