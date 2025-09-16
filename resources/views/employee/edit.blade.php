@extends ('layout')

@section ('content')


<div class="row justify-content-center">
    <div class="col-lg-6 justify-content-center">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="fw-bold mb-0 text-center">Edit Employee</h4>
            </div>
            <div class="card-body">
                <form action="/employee/{{ $employee->id }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <h6 class="mb-1">Name Employee</h6>
                        <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}"
                        placeholder="Full Name">
                    </div>
                    <div class="mt-5 ">
                        <h6 class="mb-1">Phone</h6>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{$employee->phone}}"
                        placeholder="Phone">
                    </div>
                <div class="mt-5 ">
                    <h6 class="mb-1">Email</h6>
                    <input type="text" name="email" id="email" class="form-control" value="{{$employee->email}}"
                    placeholder="Phone">
                </div>
                <div class="mt-5 ">
                    <h6 class="mb-1">Password</h6>
                    <input type="text" name="password" id="password" class="form-control" value="{{$employee->password}}"
                    placeholder="Phone">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-2 text-start mt-4">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>                                        
            </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection