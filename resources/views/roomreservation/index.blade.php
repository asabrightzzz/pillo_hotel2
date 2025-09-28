@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header text-white">
            <h4 class="fw-bold mb-0">Room Reservation Management</h4>
        </div>
        <div class="card-body">

            @if ($mainReservation)
                Room Reservation for Code: {{ $mainReservation->code }} ({{ $mainReservation->guest->name ?? 'Guest Unknown' }})
                <a href="{{ route('app.roomreservation.index') }}" class="btn btn-sm btn-light float-end">See All</a>
            @else
                All Room Reservations
            @endif

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="p-3 border rounded">
                        <h5 class="mb-3">Add Room Reservation</h5>
                        <form action="{{ route('app.roomreservation.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="reservation_id" class="form-label">main Reservation Code</label>
                                <select name="reservation_id" id="reservation_id" class="form-select" required>
                                    <option value="" hidden>-- Select Reservation Code --</option>
                                    @foreach ($reservations as $r)
                                        <option value="{{ $r->id }}">{{ $r->code }} ({{ $r->guest->name ?? 'N/A' }})</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Room</label>
                                <select name="room_id" id="room_id" class="form-select" required>
                                    <option value="" hidden>-- Select Room --</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->number }} ({{ $room->category->name ?? 'N/A' }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="arrival" class="form-label">Arrival</label>
                                    <input type="date" name="arrival" id="arrival" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="departure" class="form-label">Departure</label>
                                    <input type="date" name="departure" id="departure" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="adults" class="form-label">Adults</label>
                                    <input type="number" name="adults" class="form-control" value="1" min="1" required>
                                </div>
                                <div class="col">
                                    <label for="child" class="form-label">Child</label>
                                    <input type="number" name="child" class="form-control" value="0" min="0">
                                </div>
                                <div class="col">
                                    <label for="infant" class="form-label">Infant</label>
                                    <input type="number" name="infant" class="form-control" value="0" min="0">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="roomrate" class="form-label">Roomrate (/Nights)</label>
                                <input type="number" name="roomrate" class="form-control" placeholder="Examples: 500000" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Reservation Code</th>
                                    <th>Room</th>
                                    <th>Check In/Out</th>
                                    <th>Nights</th>
                                    <th>Guest</th>
                                    <th>Rate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomReservations as $rr)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rr->reservation->code ?? 'N/A' }}</td>
                                        <td>{{ $rr->room->number ?? 'N/A' }}</td>
                                        <td>{{ $rr->arrival }} / {{ $rr->departure }}</td>
                                        <td>{{ $rr->nights }}</td>
                                        <td>{{ $rr->adults }}+{{ $rr->child }}+{{ $rr->infant }}</td>
                                        <td>Rp. {{ number_format($rr->roomrate, 0, ',', '.') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('app.roomreservation.edit', $rr->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="{{ route('app.roomreservation.destroy', $rr->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection