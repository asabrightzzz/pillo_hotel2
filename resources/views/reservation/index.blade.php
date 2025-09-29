@extends('layout')

@push('style')
    <style>
        th {
            padding: 5px !important;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold mb-0">Reservation</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 col-lg-4">
                    <form action="/app/reservation" method="post">
                        @csrf
                        <input type="text" class="form-control mb-2" name="code" placeholder="Add Reservation Code"
                            required>
                        <select name="guest_id" id="guest_id" class="form-control mb-2" required>
                            <option value="" hidden>-- Select Guest --</option>
                            @foreach ($guests as $guest)
                                <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                            @endforeach
                        </select>
                        <select name="status" id="status" class="form-control mb-2" required>
                            <option value="" hidden>-- Select Status --</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed" selected>confirmed</option>
                            <option value="Checked in">Checked in</option>
                            <option value="Checked out">Checked out</option>
                        </select>
                        <input type="text" class="form-control mb-2" name="voucher" placeholder="Add Voucher Code">
                        <div class="text-end">
                            <button class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Guest</th>
                                    <th>Status</th>
                                    <th>Voucher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $rsv)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rsv->code }}</td>
                                        <td>{{ $rsv->guest->name }}</td>
                                        <td>{{ $rsv->status }}</td>
                                        <td>{{ $rsv->voucher }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('app.reservation.edit', $rsv->id) }}" class="btn btn-warning btn-sm" title="Edit">Edit</a>
                                            &nbsp;
                                        <form action="{{ route('app.reservation.destroy', $rsv->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                              <a href="{{ route('app.roomreservation.index') }}" class="btn btn-primary btn-sm ms-1" title="Room">Room</a>
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