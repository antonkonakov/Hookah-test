<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Repositories\BookingRepositoryInterface;

class BookingController extends Controller
{

    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {

        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        return response()->json($this->bookingRepository->save($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function getAvailibleHookahs() {
        //return response()->json($this->bookingRepository->save($request));
    }

    public function getCustomersList () {
        return response()->json($this->bookingRepository->getCustomersList());
    }
}
