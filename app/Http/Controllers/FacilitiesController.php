<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
            'name' => 'required',
            'type' => 'required|in:room,public',
            'stock' => 'nullable|integer',
        ]);

        Facility::create($request->all());
        return redirect()->route('facilities.index')->with('success', 'Fasilitas ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facilities $facilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facilities $facilities)
    {
    return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facilities $facilities)
    {
     $request->validate([
            'name' => 'required',
            'type' => 'required|in:room,public',
            'stock' => 'nullable|integer',
        ]);

        $facility->update($request->all());
        return redirect()->route('facilities.index')->with('success', 'Fasilitas diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facilities $facilities)
    {
     $facility->delete();
        return redirect()->route('facilities.index')->with('success', 'Fasilitas dihapus.');
    }
}
