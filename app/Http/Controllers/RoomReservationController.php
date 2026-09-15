<?php

namespace App\Http\Controllers;

use App\Models\RoomReservation;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = RoomReservation::with(['reservation', 'room'])->latest();
        
        if ($request->has('reservation_id')) {
            $reservationId = $request->query('reservation_id');
            $query->where('reservation_id', $reservationId);
            
            $mainReservation = Reservation::find($reservationId);
        } else {
            $mainReservation = null;
        }
        
        $selectedRoomId = null;
        if ($request->has('room_id')) {
            $selectedRoomId = $request->query('room_id');
        }

        $roomReservations = $query->get();
        $reservations = Reservation::all(); 
        $rooms = Room::all();

        return view('roomreservation.index', compact('roomReservations', 'reservations', 'rooms', 'mainReservation', 'selectedRoomId'));
    }

    public function create()
    {
        return redirect()->route('app.roomreservation.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'room_id' => 'required|exists:rooms,id',
            'arrival' => 'required|date',
            'departure' => 'required|date|after_or_equal:arrival',
            'adults' => 'required|integer|min:1',
            'roomrate' => 'required|numeric',
        ]);

        $nights = 1;
        if ($request->filled('arrival') && $request->filled('departure')) {
            try {
                $arrival = new \DateTime($request->arrival);
                $departure = new \DateTime($request->departure);
                $nights = max(1, $arrival->diff($departure)->days);
            } catch (\Exception $e) {
                $nights = 1;
            }
        }

        $data = $request->all();
        $data['nights'] = $nights;
        
        RoomReservation::create($data);

        $redirectParams = $request->reservation_id ? ['reservation_id' => $request->reservation_id] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Added Successfully!');
    }

    public function edit(RoomReservation $roomreservation)
    {
        $room_reservation = $roomreservation;
        $reservations = Reservation::all();
        $rooms = Room::all();
        
        return view('roomreservation.edit', compact('room_reservation', 'reservations', 'rooms'));
    }

    public function update(Request $request, RoomReservation $roomreservation)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'room_id' => 'required|exists:rooms,id',
            'arrival' => 'required|date',
            'departure' => 'required|date|after_or_equal:arrival',
            'adults' => 'required|integer|min:1',
            'roomrate' => 'required|numeric',
        ]);

        $nights = 1;
        if ($request->filled('arrival') && $request->filled('departure')) {
            try {
                $arrival = new \DateTime($request->arrival);
                $departure = new \DateTime($request->departure);
                $nights = max(1, $arrival->diff($departure)->days);
            } catch (\Exception $e) {
                $nights = 1;
            }
        }

        $roomreservation->update($request->all() + ['nights' => $nights]);

        $redirectParams = $roomreservation->reservation_id ? ['reservation_id' => $roomreservation->reservation_id] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Updated Successfully!');
    }

    public function destroy(RoomReservation $roomreservation)
    {
        $reservationId = $roomreservation->reservation_id;
        $roomreservation->delete();
        $redirectParams = $reservationId ? ['reservation_id' => $reservationId] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Has been Deleted.');
    }
}
