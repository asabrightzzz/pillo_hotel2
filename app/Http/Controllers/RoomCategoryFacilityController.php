<?php

namespace App\Http\Controllers;

use App\Models\room_category_facility;
use App\Models\RoomCategory;
use App\Models\Facility;
use Illuminate\Http\Request;

class RoomCategoryFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomcategoryfacility = room_category_facility::with(['RoomCategory', 'Facility'])
            ->orderBy('room_category_id')
            ->get();
        $roomCategories = RoomCategory::all();
        $facility = facility::all();
        return view('room_category_facility.index', compact('roomCategories', 'facility', 'roomcategoryfacility'));
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
            'room_category_id' => 'required|exists:room_categories,id',
            'facility_id' => 'required|exists:facilities,id',
            'qty' => 'required|integer|min:1',
        ]);
        // Cek apakah kombinasi room_category_id dan facility_id sudah ada
        $exists = room_category_facility::where('room_category_id', $request->room_category_id)
            ->where('facility_id', $request->facility_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Fasilitas pada kamar sudah ada!');
        }

        // Simpan ke database
        room_category_facility::create([
            'room_category_id' => $request->room_category_id,
            'facility_id' => $request->facility_id,
            'qty' => $request->qty ?? 1,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
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
        $roomCategories = RoomCategory::all();
        $facility = facility::all();
        return view('room_category_facility.edit', compact('roomCategories', 'facility', 'room_category_facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, room_category_facility $room_category_facility)
    {
        $room_category_facility->room_category_id      = $request->room_category_id;
        $room_category_facility->facility_id           = $request->facility_id;
        $room_category_facility->qty                   = $request->qty;
        $room_category_facility->update();

        return redirect('app/room_category_facility');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room_category_facility $room_category_facility)
    {
        $room_category_facility->delete();

        return back();
    }
}
