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
        $guests = Guest::all();
        $reservations = Reservation::with('guest')->latest()->get();
        $today = now();
        $datePart = $today->format('ymd');

        $lastReservation = Reservation::whereDate('created_at', $today->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $sequence = 1;
        if ($lastReservation && !empty($lastReservation->code)) {
            $lastCode = (string) $lastReservation->code;
            $lastSequence = (int) substr($lastCode, -3);
            $sequence = $lastSequence + 1;
        }

        $autoReservationCode = '3' . $datePart . sprintf('%03d', $sequence);

        return view('reservation.index', compact('guests', 'reservations', 'autoReservationCode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('app.reservation.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:32',
            'guest_id' => 'required|exists:guests,id',
            'status' => 'required|in:Pending,Confirmed,Checked_in,Checked_out,Cancelled',
            'voucher' => 'nullable|string|max:255',
        ]);

        Reservation::create($validated);
        return back()->with('success', 'Reservation added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return redirect()->route('app.reservation.edit', $reservation->id);
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
        $validated = $request->validate([
            'code' => 'required|string|max:32',
            'guest_id' => 'required|exists:guests,id',
            'status' => 'required|in:Pending,Confirmed,Checked_in,Checked_out,Cancelled',
            'voucher' => 'nullable|string|max:255',
        ]);

        $reservation->update($validated);

        return redirect()->route('app.reservation.index')->with('success', 'Reservation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return back()->with('success', 'Reservation deleted successfully!');
    }
}
