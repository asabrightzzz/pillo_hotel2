<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::with('roomCategory')->get();
        $roomcategory = RoomCategory::all();

        return view('room.index', compact('room', 'roomcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('app.room.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Available,Occupied,Maintenance,Reserved',
            'room_category_id' => 'required|exists:room_categories,id',
            'description' => 'nullable|string',
        ]);

        Room::create($validated);
        return back()->with('success', 'Room added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return redirect()->route('app.room.edit', $room->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $roomcategory = RoomCategory::all();
        return view('room.edit', compact('room', 'roomcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Available,Occupied,Maintenance,Reserved',
            'room_category_id' => 'required|exists:room_categories,id',
            'description' => 'nullable|string',
        ]);

        $room->update($validated);

        return redirect()->route('app.room.index')->with('success', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('app.room.index')->with('success', 'Room deleted successfully!');
    }
}
