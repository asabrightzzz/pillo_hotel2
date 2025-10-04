<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::all();
        return view('guest.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'identity_number' => 'required|string|max:20',
            'identity_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto identitas
        $identityPhotoPath = $request->file('identity_photo')->store('identity_photos', 'public');

        // Simpan data tamu ke database
        Guest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'identity_number' => $request->identity_number,
            'identity_photo' => $identityPhotoPath,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        return view('guest.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        $guest->name                  = $request->name;
        $guest->phone                = $request->phone;
        $guest->identity_number      = $request->identity_number;
        if ($request->hasFile('identity_photo')) {
            // Hapus foto lama jika ada
            if ($guest->identity_photo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($guest->identity_photo);
            }
            $identityPhotoPath = $request->file('identity_photo')->store('identity_photos', 'public');
            $guest->identity_photo = $identityPhotoPath;
        }
        $guest->update();

        return redirect('app/guest')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();

        return back();
    }
}
