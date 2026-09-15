<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Guest;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data untuk dashboard
        $totalRooms = Room::count();
        $availableRooms = Room::whereIn('status', ['Available', 'available'])->count();
        $occupiedRooms = Room::whereIn('status', ['Occupied', 'occupied'])->count();
        $totalReservations = Reservation::count();
        $pendingReservations = Reservation::where('status', 'Pending')->count();
        $confirmedReservations = Reservation::where('status', 'Confirmed')->count();
        $checkedInReservations = Reservation::where('status', 'Checked_in')->count();
        $totalGuests = Guest::count();
        $latestReservations = Reservation::with('guest')->latest()->take(5)->get();
        $roomCategories = RoomCategory::all();
        
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
        return redirect()->route('app.dashboard.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('app.dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        return redirect()->route('app.dashboard.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        return redirect()->route('app.dashboard.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        return redirect()->route('app.dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        return redirect()->route('app.dashboard.index');
    }
}
