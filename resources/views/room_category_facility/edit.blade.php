@extends ('layout')

@section ('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Data</h4>
        <div class="card-body">
            <form action="/app/room_category_facility/{{ $room_category_facility->id }}" method="POST">
                
                @csrf
                @method('PUT')
                <label class="form-label" for="basic-default-email">Room Category</label>
                <select name="room_category_id" id="rc_id" class="form-control mb-6" required>
                    @foreach ($roomCategories as $rc)             
                    <option value="{{ $rc->id }}" {{ $room_category_facility->rc_id == $rc->id ? 'selected' : '' }}>{{ $rc->name }}</option>
                    @endforeach
                </select>
                    <div class="mt-5 ">
                        <label class="form-label" for="basic-default-email">Facility</label>
                        <select name="facility_id" id="rc_id" class="form-control mb-6" required>
                    @foreach ($facility as $fc)             
                    <option value="{{ $fc->id }}" {{ $room_category_facility->fc_id == $fc->id ? 'selected' : '' }}>{{ $fc->name }}</option>
                    @endforeach
                </select>
                    </div>
                <div class="mt-5 ">
                    <h6 class="mb-1">Quantity</h6>
                    <input type="text" name="qty" id="email" class="form-control" value="{{$room_category_facility->qty}}"
                    placeholder="Amount">
                </div>
                <div class="mb-2 text-start mt-4">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
        @endsection