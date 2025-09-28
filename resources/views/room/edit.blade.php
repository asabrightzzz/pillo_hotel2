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
                    <form action="/reservation/{{ $reservation->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="Code Reservation" value="{{ $reservation->code }}">
                        </div>
                        <div class="mb-2">
                            <select name="guest_id" id="guest_id" class="form-select">
                                <option value="" hidden>-- Pilih Guest --</option>
                                @foreach ($guests as $guest)
                                    <option value="{{ $guest->id }}" {{ $reservation->guest_id == $guest->id ? 'selected' : '' }}>{{ $guest->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <select name="status" id="status" class="form-select">
                                <option value="" hidden>-- Pilih Status --</option>
                                <option value="Booked" {{ $reservation->status == 'Booked' ? 'selected' : '' }}>
                                    Booked</option>
                                <option value="Payment" {{ $reservation->status == 'Payment' ? 'selected' : '' }}>
                                    Payment</option>
                                <option value="Check in" {{ $reservation->status == 'Check in' ? 'selected' : '' }}>
                                    Check in</option>
                                <option value="Check out" {{ $reservation->status == 'Check out' ? 'selected' : '' }}>Check
                                    out</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="voucher" id="voucher" class="form-control" placeholder="Voucher"
                                value="{{ $reservation->voucher }}">
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
