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
                    <h4 class="fw-bold mb-0">Edit Room</h4>
                </div>
                <div class="card-body">
                    <form action="/app/room/{{ $room->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Room Name" value="{{ $room->name }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Category</label>
                            <select name="room_category_id" id="room_category_id" class="form-select">
                                <option value="" hidden>-- Select Category --</option>
                                @foreach($roomcategory as $category)
                                    <option value="{{ $category->id }}" {{ $room->room_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $room->description }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="" hidden>-- Select Status --</option>
                                <option value="Available" {{ $room->status == 'Available' ? 'selected' : '' }}>
                                    Available</option>
                                <option value="Occupied" {{ $room->status == 'Occupied' ? 'selected' : '' }}>
                                    Occupied</option>
                                <option value="Maintenance" {{ $room->status == 'Maintenance' ? 'selected' : '' }}>
                                    Maintenance</option>
                                <option value="Reserved" {{ $room->status == 'Reserved' ? 'selected' : '' }}>
                                    Reserved</option>
                            </select>
                        </div>
                        <div class="mb-2 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
