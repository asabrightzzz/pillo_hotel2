@extends('layout')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="bg-white p-4 rounded shadow-sm mb-4">
                @if ($mainReservation)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <span class="badge bg-info fs-6 me-2">Reservation</span>
                            <h5 class="mb-0">Code: {{ $mainReservation->code }} -
                                {{ $mainReservation->guest->name ?? 'Guest Unknown' }}</h5>
                        </div>
                        <a href="{{ route('app.roomreservation.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list me-1"></i> View All Reservations
                        </a>
                    </div>
                @else
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="fas fa-list-alt me-2"></i>All Room Reservations</h5>
                    </div>
                @endif
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h5 class="border-bottom pb-3 mb-4">
                            <i class="fas fa-plus-circle text-success me-2"></i>Add Room Reservation
                        </h5>
                        <form action="{{ route('app.roomreservation.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="reservation_id" class="form-label fw-bold">Reservation Code</label>
                                <select name="reservation_id" id="reservation_id" class="form-select shadow-sm" required>
                                    <option value="" hidden>-- Select Reservation Code --</option>
                                    @if ($mainReservation)
                                        <option value="{{ $mainReservation->id }}" selected>{{ $mainReservation->code }}
                                            ({{ $mainReservation->guest->name ?? 'N/A' }})</option>
                                    @else
                                        @foreach ($reservations as $r)
                                            <option value="{{ $r->id }}">{{ $r->code }}
                                                ({{ $r->guest->name ?? 'N/A' }})
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="room_id" class="form-label fw-bold">Room</label>
                                <select name="room_id" id="room_id" class="form-select shadow-sm" required>
                                    <option value="" hidden>-- Select Room --</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}" data-price="{{ $room->category->price ?? 0 }}"
                                            {{ isset($selectedRoomId) && $selectedRoomId == $room->id ? 'selected' : '' }}>
                                            {{ $room->name ?? 'N/A' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="arrival" class="form-label fw-bold">Arrival</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" name="arrival" id="arrival" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="departure" class="form-label fw-bold">Departure</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" name="departure" id="departure" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="adults" class="form-label fw-bold">Adults</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                        <input type="number" name="adults" class="form-control" value="1"
                                            min="1" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="child" class="form-label fw-bold">Child</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-child"></i></span>
                                        <input type="number" name="child" class="form-control" value="0"
                                            min="0">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="infant" class="form-label fw-bold">Infant</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light"><i class="fas fa-baby"></i></span>
                                        <input type="number" name="infant" class="form-control" value="0"
                                            min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="total_nights" class="form-label fw-bold">Total Nights</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light"><i class="fas fa-moon"></i></span>
                                    <input type="number" name="total_nights" id="total_nights" class="form-control"
                                        readonly>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="roomrate" class="form-label fw-bold">Room Rate (per Night)</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light">Rp</span>
                                    <input type="number" name="roomrate" id="roomrate" class="form-control"
                                        placeholder="Auto-filled from room category" readonly required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="total_rate" class="form-label fw-bold">Total Rate</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light">Rp</span>
                                    <input type="number" name="total_rate" id="total_rate" class="form-control"
                                        readonly>
                                </div>
                            </div>

                            <script>
                                function calcTotal() {
                                    const arrival = new Date(document.getElementById('arrival').value);
                                    const departure = new Date(document.getElementById('departure').value);
                                    const rate = parseFloat(document.getElementById('roomrate').value) || 0;
                                    if (!isNaN(arrival) && !isNaN(departure) && departure > arrival) {
                                        const nights = Math.ceil((departure - arrival) / (1000 * 60 * 60 * 24));
                                        document.getElementById('total_nights').value = nights;
                                        document.getElementById('total_rate').value = nights * rate;
                                    } else {
                                        document.getElementById('total_nights').value = '';
                                        document.getElementById('total_rate').value = '';
                                    }
                                }
                                document.getElementById('arrival').addEventListener('change', calcTotal);
                                document.getElementById('departure').addEventListener('change', calcTotal);
                                document.getElementById('roomrate').addEventListener('input', calcTotal);

                                // Auto-fill room rate when room is selected
                                document.getElementById('room_id').addEventListener('change', function() {
                                    const selected = this.options[this.selectedIndex];
                                    const price = selected.getAttribute('data-price') || 0;
                                    document.getElementById('roomrate').value = price;
                                    calcTotal();
                                });
                            </script>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-2">
                                    <i class="fas fa-save me-2"></i>Save Reservation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="bg-white p-4 rounded shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Reservation</th>
                                        <th>Room</th>
                                        <th>Stay Period</th>
                                        <th>Guests</th>
                                        <th>Rate</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roomReservations as $rr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="fw-bold">{{ $rr->reservation->code ?? 'N/A' }}</span>
                                                <div class="small text-muted">{{ $rr->reservation->guest->name ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ $rr->room->name ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="text-center">
                                                        <div>{{ date('d M Y', strtotime($rr->arrival)) }}</div>
                                                        <div class="text-muted small">to
                                                            {{ date('d M Y', strtotime($rr->departure)) }}</div>
                                                        <div class="badge bg-secondary mt-1 p-1" style="font-size: 10px">{{ $rr->nights }} nights
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <span class="badge bg-primary">{{ $rr->adults }} Adults</span>
                                                        @if ($rr->child > 0)
                                                            <span class="badge bg-info">{{ $rr->child }} Child</span>
                                                        @endif
                                                        @if ($rr->infant > 0)
                                                            <span class="badge bg-warning">{{ $rr->infant }}
                                                                Infant</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Rp {{ number_format($rr->roomrate, 0, ',', '.') }}
                                                </div>
                                                <div class="small text-muted">per night</div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('app.roomreservation.edit', $rr->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('app.roomreservation.destroy', $rr->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this reservation?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const arrivalInput = document.getElementById('arrival');
            const departureInput = document.getElementById('departure');

            arrivalInput.addEventListener('change', function() {
                const arrivalDate = new Date(this.value);
                if (!isNaN(arrivalDate)) {
                    // Disable departure dates before arrival
                    const arrivalISO = arrivalDate.toISOString().split('T')[0];
                    departureInput.setAttribute('min', arrivalISO);
                    // Reset departure if it's before the new arrival
                    if (departureInput.value && new Date(departureInput.value) < arrivalDate) {
                        departureInput.value = '';
                    }
                }
            });
        });
    </script>
@endsection
