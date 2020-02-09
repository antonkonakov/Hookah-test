<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HookahRequest;
use App\Repositories\Eloquent\HookahRepository;

class HookahController extends Controller
{
    /**
     * @var HookahRepository
     */
    private $hookahRepository;

    public function __construct(HookahRepository $hookahRepository)
    {
        $this->hookahRepository = $hookahRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($smoking_bar_id)
    {
        return response()->json($this->hookahRepository->all($smoking_bar_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($smoking_bar_id, HookahRequest $request)
    {
        return response()->json($this->hookahRepository->save($smoking_bar_id, $request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($smoking_bar_id, $hookah_id)
    {
        return response()->json($this->hookahRepository->get($smoking_bar_id, $hookah_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($smoking_bar_id, $hookah_id, HookahRequest $request)
    {
        return response()->json($this->hookahRepository->update($smoking_bar_id, $hookah_id, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($smoking_bar_id, $hookah_id)
    {
        //
    }
}
