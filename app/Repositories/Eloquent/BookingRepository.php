<?php


namespace App\Repositories\Eloquent;


use App\Models\Booking;
use App\Models\Hookah;
use App\Repositories\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingRepository implements BookingRepositoryInterface
{
    public function all() {

    }

    public function delete($booking_id) {
    }

    public function save(Request $request) {
        $availible_hookah = (new HookahRepository())->getAvailableForBooking($request);
        $hookah_list = Hookah::with('booking')
            ->where('smoking_bar_id', $request->smoking_bar_id)
            ->whereIn('id', $availible_hookah)
            ->where('tubes_count', '>=', $request->customers_count)
            ->first();

        if(isset($hookah_list)) {
            $booking = new Booking($request->all());
            $hookah_list->Booking()->save($booking);
        }
    }
}
