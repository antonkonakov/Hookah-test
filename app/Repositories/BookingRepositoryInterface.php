<?php

namespace App\Repositories;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;

interface BookingRepositoryInterface
{
    public function all();

    public function save(BookingRequest $request);

    public function getCustomersList();
}
