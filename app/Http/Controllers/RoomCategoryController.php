<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomCategories = RoomCategory::all();
        return view('roomcategory.index', compact('roomCategories'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'room_size' => 'required|string|max:100',
            'capacity' => 'required|integer',
            'bed_setup' => 'required|string|max:100',
        ]);

        // Simpan ke database
        RoomCategory::create([
            'name' => $request->name,
            'price' => $request->price,
            'room_size' => $request->room_size,
            'capacity' => $request->capacity,
            'bed_setup' => $request->bed_setup,
        ]);

        return redirect()->back()->with('success', 'Room category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomCategory $roomCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomCategory $roomCategory)
    {
        return view('roomcategory.edit', compact('roomCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomCategory $roomCategory)
    {
       $roomCategory->name = $request->name;
       $roomCategory->price = $request->price;
       $roomCategory->room_size = $request->room_size;
       $roomCategory->capacity = $request->capacity;
       $roomCategory->bed_setup = $request->bed_setup;
       $roomCategory->update();

        return redirect('roomcategories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomCategory $roomCategory)
    {
        $roomCategory->delete();
        return back();
    }
}
