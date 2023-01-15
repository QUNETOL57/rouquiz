<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use App\Models\Test;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tests = Test::all();

        return Inertia::render('Test/List', ['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $test->load('questions');
        dd($test);
        return Inertia::render('Test/Show', ['test' => $test]);
    }


    public function quiz($id)
    {
        $test = Test::findOrFail($id);
        $test->load('questions.answers');
        return Inertia::render('Test/Quiz', ['test' => $test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return '123';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
