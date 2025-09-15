@extends ('layout')

@section ('content')

@endsection
<div class="row justify-content-center">
        <div class="col-lg-6 justify-content-center">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="fw-bold mb-0 text-center">Edit Employee</h4>
                </div>
                <div class="card-body">
                    <form action="/employee/{{ $employee->id }}" method="POST"></form>
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <h6 class="mb-1">Name Employee</h6>
                    <input type="text" name="full_name" id="full_name" class="form-control"
                    placeholder="Full Name" value="{{ $employee->code }}">
                    </div>
                    <div class="mt-5 ">
                        <h6 class="mb-1">Phone</h6>
                    <input type="text" name="phone" id="phone" class="form-control"
                    placeholder="Phone" value="{{ $employee->code }}">
                    </div>
                    <div class="mt-5 ">
                        <h6 class="mb-1">Phone</h6>
                    <input type="text" name="phone" id="phone" class="form-control"
                    placeholder="Phone" value="{{ $employee->code }}">
                    </div>
                </div>
            </div>
        </div>
    </div>