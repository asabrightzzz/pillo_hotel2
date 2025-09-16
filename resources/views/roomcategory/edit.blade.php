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
                    <h4 class="fw-bold mb-0">Edit Room Categories</h4>
                </div>
                <div class="card-body">
                    <form action="/room_category/{{ $roomCategory->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Name" value="{{ $roomCategory->name }}">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="price" id="price" class="form-control"
                             placeholder="Price" value="{{ $roomCategory->price }}">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="room_size" id="room_size" class="form-control"
                                placeholder="Room Size" value="{{ $roomCategory->room_size }}">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="capacity" id="capacity" class="form-control"
                                placeholder="Capacity" value="{{ $roomCategory->capacity }}">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="bed_setup" id="bed_setup" class="form-control"
                                placeholder="Bed Setup" value="{{ $roomCategory->bed_setup }}">
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
