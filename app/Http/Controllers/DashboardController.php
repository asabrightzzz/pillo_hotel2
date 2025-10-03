<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data untuk dashboard
        $totalRooms = \App\Models\Room::count();
        $availableRooms = \App\Models\Room::where('status', 'available')->count();
        $occupiedRooms = \App\Models\Room::where('status', 'occupied')->count();
        $totalReservations = \App\Models\Reservation::count();
        $pendingReservations = \App\Models\Reservation::where('status', 'Pending')->count();
        $confirmedReservations = \App\Models\Reservation::where('status', 'Confirmed')->count();
        $checkedInReservations = \App\Models\Reservation::where('status', 'Checked_in')->count();
        $totalGuests = \App\Models\Guest::count();
        $latestReservations = \App\Models\Reservation::with('guest')->latest()->take(5)->get();
        $roomCategories = \App\Models\RoomCategory::all();
        
        return view('dashboard', compact(
            'totalRooms', 
            'availableRooms', 
            'occupiedRooms', 
            'totalReservations', 
            'pendingReservations', 
            'confirmedReservations', 
            'checkedInReservations', 
            'totalGuests',
            'latestReservations',
            'roomCategories'
        ));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
