@extends('layout')

@push('style')
    <style>
        th {
            padding: 10px !important;
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
                <div class="col-4">
                    <form action="/reservation" method="POST">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="Code Reservation">
                        </div>
                        <div class="mb-2">
                            <select name="guest_id" id="guest_id" class="form-control">
                                <option value="" hidden>-- Pilih Guest --</option>
                                <option value="1">Ghattan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <select name="status" id="status" class="form-select">
                                <option value="" hidden>-- Pilih Status --</option>
                                <option value="Booked">Booked</option>
                                <option value="Payment">Payment</option>
                                <option value="Check in">Check in</option>
                                <option value="Check out">Check out</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="voucher" id="voucher" class="form-control" placeholder="Voucher">
                        </div>
                        <div class="mb-2 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Guest</th>
                                    <th>Status</th>
                                    <th>Voucher</th>
                                    <th>Aksi</th>
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
                                    <td>
                                        <a href="/reservation/{{$rsv->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
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
