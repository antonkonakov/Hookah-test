<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface BookingRepositoryInterface
{
    public function all();

    public function delete($booking_id);

    public function save(Request $request);
}
