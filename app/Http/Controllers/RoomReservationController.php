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
        $arrival = new \DateTime($request->arrival);
        $departure = new \DateTime($request->departure);
        $nights = $arrival->diff($departure)->days;

        $data = $request->all();
        $data['nights'] = $nights;
        
        RoomReservation::create($data);

        $redirectParams = $request->reservation_id ? ['reservation_id' => $request->reservation_id] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Added Successfully!');
    }

    public function edit(RoomReservation $room_reservation)
    {
        $reservations = Reservation::all();
        $rooms = Room::all();
        
        return view('roomreservation.edit', compact('room_reservation', 'reservations', 'rooms'));
    }

    public function update(Request $request, RoomReservation $room_reservation)
    {
        $arrival = new \DateTime($request->arrival);
        $departure = new \DateTime($request->departure);
        $nights = $arrival->diff($departure)->days;

        $room_reservation->update($request->all() + ['nights' => $nights]);

        $redirectParams = $room_reservation->reservation_id ? ['reservation_id' => $room_reservation->reservation_id] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Update Successfully!');
    }

    public function destroy(RoomReservation $room_reservation)
    {
        dd($room_reservation);        
        $reservationId = $room_reservation->reservation_id;
        $room_reservation->delete();
        $redirectParams = $reservationId ? ['reservation_id' => $reservationId] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Has been Deleted.');
    }
}
