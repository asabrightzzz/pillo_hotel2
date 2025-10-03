@extends ('layout')

@section('content')

<div class="row">
                    <div class="col-12">
                    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Room Category</h5>
        </div>
        <div class="card-body">

                <form action="/app/room_category_facility" method="POST">
                    @csrf
                    <label class="form-label" for="basic-default-email">Room Category</label>
                    <select name="room_category_id" id="rc_id" class="form-control mb-6" required>
                            <option value="" hidden>-Choose Your Room-</option>
                            @foreach ($roomCategories as $rc)
                            <option value="{{ $rc->id }}">{{ $rc->name }}</option>
                            
                            @endforeach
                        </select>
                        <label class="form-label" for="basic-default-email">Facility</label>
                    <select name="facility_id" id="fc_id" class="form-control mb-6" required>
                            <option value="" hidden>-Choose Your Facility-</option>
                            @foreach ($facility as $fc)
                            <option value="{{ $fc->id }}">{{ $fc->name }}</option>
                            
                            @endforeach
                        </select>
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-message">Amount</label>
                        <input type="number" name="qty" class="form-control" placeholder="Number of Items" required></input>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Send</button>
                </form>
            </div>
        </div>
      </div>

                        <!-- Section Tabel -->
        <div class="col-12">    
            <div class="card mt-6">
                <h5 class="card-header">Room Category & Facilities</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Room name</th>
                                <th>Facility</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($roomcategoryfacility as $rcf)             
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rcf->roomCategory->name }}</td>
                                <td>{{ $rcf->facility->name }}</td>
                                <td>{{ $rcf->qty }}</td>
                                <td>
                                    
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">           
                                        <a class="dropdown-item" href="/app/room_category_facility/{{ $rcf->id }}/edit"><i class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                         <form action="{{ route('app.roomreservation.destroy', $rc->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1" onclick="return confirm('Are you sure to delete this data?')"></i> Delete</a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                </td>
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
    </div>
</div>



@endsection