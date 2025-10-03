<?php

namespace App\Http\Controllers;

use App\Models\RoomReservation;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomReservationController extends Controller
{
    /**
     * READ: Menampilkan daftar semua reservasi kamar.
     * Dapat difilter berdasarkan reservation_id dari query string.
     */
    public function index(Request $request)
    {
        // Mendapatkan query builder untuk RoomReservation dengan relasi
        $query = RoomReservation::with(['reservation', 'room'])->latest();
        
        // Cek apakah ada reservation_id di URL query string (misal: ?reservation_id=1)
        if ($request->has('reservation_id')) {
            $reservationId = $request->query('reservation_id');
            $query->where('reservation_id', $reservationId);
            
            // Opsional: Ambil detail Reservasi Utama untuk ditampilkan di header
            $mainReservation = Reservation::find($reservationId);
        } else {
            $mainReservation = null;
        }

        $roomReservations = $query->get();

        // Ambil data untuk Form Create agar tidak error saat create
        $reservations = Reservation::all(); 
        $rooms = Room::all();

        return view('roomreservation.index', compact('roomReservations', 'reservations', 'rooms', 'mainReservation'));
    }

    /**
     * CREATE: Menampilkan formulir pembuatan reservasi kamar baru.
     * Karena menggunakan index untuk form, kita hanya perlu mem-pass data.
     */
    public function create()
    {
        // Fungsi create dihilangkan karena logikanya sudah dihandle di index untuk kesederhanaan.
        // Cukup pastikan index me-return data $reservations dan $rooms.
        return redirect()->route('app.roomreservation.index');
    }

    /**
     * CREATE: Menyimpan data baru ke storage.
     */
    public function store(Request $request)
    {
        // 1. Hitung nights
        $arrival = new \DateTime($request->arrival);
        $departure = new \DateTime($request->departure);
        $nights = $arrival->diff($departure)->days;

        // 2. Tambahkan Nights ke request data
        $data = $request->all();
        $data['nights'] = $nights;
        
        // 3. Simpan data
        RoomReservation::create($data);

        // Redirect kembali dengan membawa reservation_id agar tetap terfilter
        $redirectParams = $request->reservation_id ? ['reservation_id' => $request->reservation_id] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Added Successfully!');
    }

    /**
     * EDIT: Menampilkan formulir untuk mengedit reservasi kamar tertentu.
     */
    public function edit(RoomReservation $room_reservation)
    {
        $reservations = Reservation::all();
        $rooms = Room::all();
        
        return view('roomreservation.edit', compact('room_reservation', 'reservations', 'rooms'));
    }

    /**
     * UPDATE: Memperbarui reservasi kamar tertentu.
     */
    public function update(Request $request, RoomReservation $room_reservation)
    {
        // 1. Hitung nights (Ulangi perhitungan)
        $arrival = new \DateTime($request->arrival);
        $departure = new \DateTime($request->departure);
        $nights = $arrival->diff($departure)->days;

        // 2. Update data
        $room_reservation->update($request->all() + ['nights' => $nights]);

        // Redirect kembali dengan membawa reservation_id
        $redirectParams = $room_reservation->reservation_id ? ['reservation_id' => $room_reservation->reservation_id] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Update Successfully!');
    }

    /**
     * DELETE: Menghapus reservasi kamar tertentu.
     */
    public function destroy(RoomReservation $room_reservation)
    {
        $reservationId = $room_reservation->reservation_id;
        $room_reservation->delete();
        
        // Redirect kembali dengan membawa reservation_id
        $redirectParams = $reservationId ? ['reservation_id' => $reservationId] : [];
        
        return redirect()->route('app.roomreservation.index', $redirectParams)
            ->with('success', 'Room Reservation Has been Deleted.');
    }
}
