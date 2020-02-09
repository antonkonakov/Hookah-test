<?php

namespace App\Repositories;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\HookahRequest;
use Illuminate\Http\Request;

interface HookahRepositoryInterface
{
    public function all($smoking_bar_id);

    public function get($smoking_bar_id, $hookah_id);

    public function save($smoking_bar_id, HookahRequest $request);

    public function update($smoking_bar_id, $hookah_id, HookahRequest $request);

    public function delete($smoking_bar_id, $hookah_id);

    public function getAvailableForBooking(BookingRequest $request);

    public function pickHookahsForBooking(BookingRequest $request);
}
