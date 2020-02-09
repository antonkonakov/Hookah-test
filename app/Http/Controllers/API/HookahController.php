<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HookahRequest;
use App\Http\Resources\HookahResource;
use App\Http\Resources\HookahsResource;
use App\Repositories\HookahRepositoryInterface;

class HookahController extends Controller
{
    /**
     * @var HookahRepositoryInterface
     */
    private $hookahRepository;

    public function __construct(HookahRepositoryInterface $hookahRepository)
    {
        $this->hookahRepository = $hookahRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return HookahsResource
     */
    public function index($smoking_bar_id)
    {
        return new HookahsResource($this->hookahRepository->all($smoking_bar_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $smoking_bar_id
     * @param HookahRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store($smoking_bar_id, HookahRequest $request)
    {
        return response()->json($this->hookahRepository->save($smoking_bar_id, $request));
    }

    /**
     * Display the specified resource.
     *
     * @param $smoking_bar_id
     * @param $hookah_id
     * @return HookahResource
     */
    public function show($smoking_bar_id, $hookah_id)
    {
        $hookah = $this->hookahRepository->get($smoking_bar_id, $hookah_id);

        if(!isset($hookah)) {
            return response()->json(['error' => 1],400);
        }
        return new HookahResource($hookah);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $smoking_bar_id
     * @param $hookah_id
     * @param HookahRequest $request
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
        return response()->json($this->hookahRepository->delete($smoking_bar_id, $hookah_id));
    }
}
