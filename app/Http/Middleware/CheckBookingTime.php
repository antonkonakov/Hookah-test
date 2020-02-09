<?php

namespace App\Http\Middleware;

use App\Http\Requests\BookingRequest;
use Carbon\Carbon;
use Closure;

class CheckBookingTime
{
    /**
     * Handle an incoming request.
     *
     * @param BookingRequest $request
     * @param \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        if (!isset($request->booking_to)) {
            $booking_to['booking_to'] = (new Carbon($request->booking_from))->addMinutes(30);
            $request->merge($booking_to);
        }

        return $next($request);
    }
}
