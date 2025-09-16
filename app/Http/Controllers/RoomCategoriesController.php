<?php

namespace App\Http\Controllers;

use App\Models\RoomCategories;
use App\Models\Guest;
use Illuminate\Http\Request;

class RoomCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::all();
        $roomcategories = RoomCategories::all();
        return view('roomcategories.index', compact('roomcategories'));
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
        // Validasi dulu biar aman
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'room_size' => 'required|string|max:100',
            'capacity' => 'required|integer',
            'bed_setup' => 'required|string|max:100',
        ]);

        // Simpan ke database
        RoomCategories::create([
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
    public function show(RoomCategories $roomCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomCategories $roomCategories)
    {
        $guests = Guest::all();
        return view('roomcategories.edit', compact('roomCategories', 'guests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomCategories $roomCategories)
    {
        $roomCategories->name = $request->name;
        $roomCategories->price = $request->price;
        $roomCategories->room_size = $request->room_size;
        $roomCategories->capacity = $request->capacity;
        $roomCategories->bed_setup = $request->bed_setup;
        $roomCategories->update();

        return redirect('roomcategories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomCategories $roomCategories)
    {
        $roomCategories->delete();
        return back();
    }
}
