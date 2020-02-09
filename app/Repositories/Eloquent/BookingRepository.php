<?php


namespace App\Repositories\Eloquent;


use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Hookah;
use App\Repositories\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public function all() {

    }

    public function save(BookingRequest $request) {
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
            return response("success", 204);
        }
        return response("no available hookahs on this time", 204);

    }

    public function getCustomersList() {
        return Booking::select('name')
            ->where('booking_from', '>', now())
            ->distinct()->get();
    }
}
