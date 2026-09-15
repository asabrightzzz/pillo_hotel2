<?php

namespace App\Http\Controllers;

use App\Models\RoomCategoryFacility;
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
        $roomcategoryfacility = RoomCategoryFacility::with(['roomCategory', 'facility'])
            ->orderBy('room_category_id')
            ->get();
        $roomCategories = RoomCategory::all();
        $facility = Facility::all();

        return view('room_category_facility.index', compact('roomCategories', 'facility', 'roomcategoryfacility'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('app.room_category_facility.index');
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

        $exists = RoomCategoryFacility::where('room_category_id', $request->room_category_id)
            ->where('facility_id', $request->facility_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Fasilitas pada kategori kamar ini sudah ada!');
        }

        RoomCategoryFacility::create([
            'room_category_id' => $request->room_category_id,
            'facility_id' => $request->facility_id,
            'qty' => $request->qty ?? 1,
        ]);

        return redirect()->back()->with('success', 'Fasilitas kategori kamar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomCategoryFacility $room_category_facility)
    {
        return redirect()->route('app.room_category_facility.edit', $room_category_facility->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomCategoryFacility $room_category_facility)
    {
        $roomCategories = RoomCategory::all();
        $facility = Facility::all();

        return view('room_category_facility.edit', compact('roomCategories', 'facility', 'room_category_facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomCategoryFacility $room_category_facility)
    {
        $request->validate([
            'room_category_id' => 'required|exists:room_categories,id',
            'facility_id' => 'required|exists:facilities,id',
            'qty' => 'required|integer|min:1',
        ]);

        $room_category_facility->update([
            'room_category_id' => $request->room_category_id,
            'facility_id' => $request->facility_id,
            'qty' => $request->qty,
        ]);

        return redirect()->route('app.room_category_facility.index')->with('success', 'Fasilitas kategori kamar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomCategoryFacility $room_category_facility)
    {
        $room_category_facility->delete();

        return back()->with('success', 'Fasilitas kategori kamar berhasil dihapus!');
    }
}
