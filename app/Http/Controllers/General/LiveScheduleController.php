<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLiveScheduleRequest;
use App\Http\Requests\UpdateLiveScheduleRequest;
use App\Models\LiveSchedule;

class LiveScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLiveScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LiveSchedule $liveSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LiveSchedule $liveSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLiveScheduleRequest $request, LiveSchedule $liveSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LiveSchedule $liveSchedule)
    {
        //
    }
}
