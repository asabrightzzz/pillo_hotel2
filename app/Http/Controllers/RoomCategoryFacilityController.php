<?php

namespace App\Http\Controllers;

use App\Models\room_category_facility;
use Illuminate\Http\Request;

class RoomCategoryFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_category_facility = room_category_facility::all();
        return view('room_category_facility.index', compact('room_category_facility'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(room_category_facility $room_category_facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room_category_facility $room_category_facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, room_category_facility $room_category_facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room_category_facility $room_category_facility)
    {
        //
    }
}
