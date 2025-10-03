@extends('layout')

@push('style')
    <style>
        th {
            padding: 10px !important;
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold mb-0">Edit Reservation</h4>
                </div>
                <div class="card-body">
                    <form action="/app/reservation/{{ $reservation->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="code" class="form-label">Code Reservation</label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="Code Reservation" value="{{ old('code', $reservation->code) }}">
                        </div>
                        <div class="mb-2">
                            <label for="guest_id" class="form-label">Guest</label>
                            <select name="guest_id" id="guest_id" class="form-select">
                                <option value="" hidden>-- Select Guest --</option>
                                @foreach ($guests as $guest)
                                    <option value="{{ $guest->id }}"
                                        {{ old('guest_id', $reservation->guest_id) == $guest->id ? 'selected' : '' }}>
                                        {{ $guest->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="" hidden>-- Select Status --</option>
                                <option value="Pending"
                                    {{ old('status', $reservation->status) == 'Pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="Confirmed"
                                    {{ old('status', $reservation->status) == 'Confirmed' ? 'selected' : '' }}>
                                    Confirmed</option>
                                <option value="Checked_in"
                                    {{ old('status', $reservation->status) == 'Checked_in' ? 'selected' : '' }}>
                                    Checked in</option>
                                <option value="Checked_out"
                                    {{ old('status', $reservation->status) == 'Checked_out' ? 'selected' : '' }}>
                                    Checked out</option>
                                <option value="Cancelled"
                                    {{ old('status', $reservation->status) == 'Cancelled' ? 'selected' : '' }}>
                                    Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="voucher" class="form-label">Voucher</label>
                            <input type="text" name="voucher" id="voucher" class="form-control" placeholder="Voucher"
                                value="{{ old('voucher', $reservation->voucher) }}">
                        </div>
                        <div class="mb-2 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
