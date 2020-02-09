<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SmokingBarRequest;
use App\Http\Resources\SmokingBarResource;
use App\Http\Resources\SmokingBarsResource;
use App\Repositories\SmokingBarRepositoryInterface;
use Illuminate\Http\Request;

class SmokingBarController extends Controller
{
    /**
     * @var SmokingBarRepositoryInterface
     */
    private $smokingBarRepository;

    public function __construct(SmokingBarRepositoryInterface $smokingBarRepository)
    {
        $this->smokingBarRepository = $smokingBarRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return SmokingBarsResource
     */
    public function index()
    {
//        return response()->json($this->smokingBarRepository->all());
        return new SmokingBarsResource($this->smokingBarRepository->all());
    }

    /**
     * @param SmokingBarRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function store(SmokingBarRequest $request)
    {
        return response()->json($this->smokingBarRepository->save($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SmokingBarResource
     */
    public function show($id)
    {
        $smoking_bar = $this->smokingBarRepository->get($id);

        if(!isset($smoking_bar)) {
            return response()->json(['error' => 1],400);
        }
        return new SmokingBarResource($smoking_bar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SmokingBarRequest $request, $id)
    {
        return response()->json($this->smokingBarRepository->update($request, $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->smokingBarRepository->delete($id));
    }
}
