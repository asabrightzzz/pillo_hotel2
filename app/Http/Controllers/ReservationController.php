<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Guest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Variabel Guests berisikan Model Guest yang diperintahkan untuk mengambil semua data pada tabel guest
        $guests = Guest::all();
        $reservations = Reservation::all();
        // $reservations = Reservation::where('guest_id', 1)->get();
        return view('reservation.index', compact('guests', 'reservations'));
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
        Reservation::create($request->all());
        return back();
    }
    
    /**
     * Display the specified resource.
    */
    public function show(Reservation $reservation)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Reservation $reservation)
    {
        $guests = Guest::all();
        return view('reservation.edit', compact('reservation', 'guests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->code      = $request->code;
        $reservation->guest_id  = $request->guest_id;
        $reservation->status    = $request->status;
        $reservation->voucher   = $request->voucher;
        $reservation->update();

        return redirect('reservation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return back();
    }
}
