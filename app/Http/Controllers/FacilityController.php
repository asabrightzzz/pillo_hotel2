<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{

    public function index()
    {
        $facilities = Facility::all();
        return view('facility.index', compact('facilities'));
    }


    public function create()
    {
        return view('facility.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:room,public',
            'stock' => 'nullable|integer',
            'description' => 'nullable|string'
        ]);

        Facility::create($validatedData);
        return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility)
    {
        return view('facility.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:room,public',
            'stock' => 'nullable|integer',
            'description' => 'nullable|string'
        ]);

        $facility->update($validatedData);
        return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
