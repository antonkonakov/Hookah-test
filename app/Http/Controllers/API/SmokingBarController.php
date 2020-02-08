<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SmokingBarRequest;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->smokingBarRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmokingBarRequest $request)
    {
        return response()->json($this->smokingBarRepository->save($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->smokingBarRepository->get($id));
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
