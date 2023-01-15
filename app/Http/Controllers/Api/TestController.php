<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestResource;
use App\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TestResource::collection(Test::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestRequest $request)
    {
        $test = Test::create($request->validated());
        return $test;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return $test;
        return new TestResource($test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTestRequest $request
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());
        return $test;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return response(null, 204);
    }
}
