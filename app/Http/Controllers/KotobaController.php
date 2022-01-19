<?php

namespace App\Http\Controllers;

use App\Http\Requests\KotobaCreateRequest;
use App\Http\Requests\KotobaUpdateRequest;
use App\Http\Resources\KotobaResource;
use App\Services\KotobaService;

class KotobaController extends Controller
{
    public $kotobaService;

    public function __construct(KotobaService $kotobaService)
    {
        $this->kotobaService = $kotobaService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kotobas = $this->kotobaService->getAll();

        return KotobaResource::collection($kotobas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KotobaCreateRequest $request)
    {
        $this->kotobaService->store($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $kotoba = $this->kotobaService->getById($id);

        return new KotobaResource($kotoba);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KotobaUpdateRequest $request, $id)
    {
        $this->kotobaService->update($id, $request->all());

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kotobaService->destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
