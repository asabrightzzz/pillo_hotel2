// roomreservation/edit.blade.php

@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="fw-bold mb-0">Edit Reservasi Kamar</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('app.room_reservation.update', $room_reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="reservation_id" class="form-label">Kode Reservasi Utama</label>
                            <select name="reservation_id" id="reservation_id" class="form-select" required>
                                @foreach ($reservations as $r)
                                    <option value="{{ $r->id }}" 
                                        {{ $room_reservation->reservation_id == $r->id ? 'selected' : '' }}>
                                        {{ $r->code }} ({{ $r->guest->name ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="room_id" class="form-label">Kamar</label>
                            <select name="room_id" id="room_id" class="form-select" required>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" 
                                        {{ $room_reservation->room_id == $room->id ? 'selected' : '' }}>
                                        {{ $room->number }} ({{ $room->category->name ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="arrival" class="form-label">Tgl. Kedatangan</label>
                                <input type="date" name="arrival" id="arrival" class="form-control" 
                                    value="{{ $room_reservation->arrival }}" required>
                            </div>
                            <div class="col">
                                <label for="departure" class="form-label">Tgl. Keberangkatan</label>
                                <input type="date" name="departure" id="departure" class="form-control" 
                                    value="{{ $room_reservation->departure }}" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col">
                                <label for="adults" class="form-label">Dewasa</label>
                                <input type="number" name="adults" class="form-control" 
                                    value="{{ $room_reservation->adults }}" min="1" required>
                            </div>
                            <div class="col">
                                <label for="child" class="form-label">Anak</label>
                                <input type="number" name="child" class="form-control" 
                                    value="{{ $room_reservation->child }}" min="0">
                            </div>
                            <div class="col">
                                <label for="infant" class="form-label">Bayi</label>
                                <input type="number" name="infant" class="form-control" 
                                    value="{{ $room_reservation->infant }}" min="0">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="roomrate" class="form-label">Tarif Kamar (Per Malam)</label>
                            <input type="number" name="roomrate" class="form-control" 
                                value="{{ $room_reservation->roomrate }}" required>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('app.room_reservation.index') }}" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection