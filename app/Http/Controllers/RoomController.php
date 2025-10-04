<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Models\roomcategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $room = Room::all();
    $roomcategory = RoomCategory::all();

    return view('room.index', compact('room','roomcategory'));
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
        Room::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        $roomcategory = RoomCategory::all();
        return view('room.edit', compact('room','roomcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, room $room)
    {
        $room->name              = $request->name;
        $room->status            = $request->status;
        $room->room_category_id  = $request->room_category_id;
        $room->description       = $request->description;
        $room->update();

        return redirect('app/room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room $room)
    {
        //
    }
}
