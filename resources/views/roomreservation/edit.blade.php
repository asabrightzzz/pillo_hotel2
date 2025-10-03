@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="mb-0 fw-bold mx-3">Edit Room Reservation</h3>
                    <hr>
                    <div class="bg-white p-4 rounded shadow-sm">
                        <form action="/app/roomreservation{{ $room_reservation->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="reservation_id" class="form-label fw-bold">Reservation Code</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-bookmark"></i></span>
                                        <select name="reservation_id" id="reservation_id" class="form-select" required>
                                            @foreach ($reservations as $r)
                                                <option value="{{ $r->id }}" 
                                                    {{ $room_reservation->reservation_id == $r->id ? 'selected' : '' }}>
                                                    {{ $r->code }} ({{ $r->guest->name ?? 'N/A' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="room_id" class="form-label fw-bold">Room</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-door-open"></i></span>
                                        <select name="room_id" id="room_id" class="form-select" required>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}" 
                                                    {{ $room_reservation->room_id == $room->id ? 'selected' : '' }}>
                                                    {{ $room->number }} ({{ $room->category->name ?? 'N/A' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="arrival" class="form-label fw-bold">Arrival Date</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-calendar-check"></i></span>
                                        <input type="date" name="arrival" id="arrival" class="form-control" 
                                            value="{{ $room_reservation->arrival }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="departure" class="form-label fw-bold">Departure Date</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-calendar-minus"></i></span>
                                        <input type="date" name="departure" id="departure" class="form-control" 
                                            value="{{ $room_reservation->departure }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-4 mb-3">
                                    <label for="adults" class="form-label fw-bold">Adults</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                        <input type="number" name="adults" class="form-control" 
                                            value="{{ $room_reservation->adults }}" min="1" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="child" class="form-label fw-bold">Children</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-child"></i></span>
                                        <input type="number" name="child" class="form-control" 
                                            value="{{ $room_reservation->child }}" min="0">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="infant" class="form-label fw-bold">Infants</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-baby"></i></span>
                                        <input type="number" name="infant" class="form-control" 
                                            value="{{ $room_reservation->infant }}" min="0">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="roomrate" class="form-label fw-bold">Room Rate (per Night)</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light">Rp</span>
                                    <input type="number" name="roomrate" class="form-control" 
                                        value="{{ $room_reservation->roomrate }}" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('app.roomreservation.index') }}" class="btn btn-secondary px-4">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection