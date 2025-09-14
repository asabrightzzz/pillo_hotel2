@extends('layout')

@section('content')
         <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Employee</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname" name="name" placeholder="Mulyono" aria-label="Username...">
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="text" id="basic-icon-default-phone" name="phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941">
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="email" id="basic-icon-default-email" name="email" class="form-control" placeholder="john.doe" aria-label="john.doe">
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="password">Password</label>
                          <div class="input-group input-group-merge">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="gender">Gender</label>
                          <select name="gender" id="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
              <hr>

    <h5 class="mt-4">List Of Employee</h5>
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Gender</th>
              </tr>
          </thead>
          <tbody>
              @foreach($employee as $emp)
                  <tr>
                      <td>{{ $emp->id }}</td>
                      <td>{{ $emp->name }}</td>
                      <td>{{ $emp->phone }}</td>
                      <td>{{ $emp->email }}</td>
                      <td>{{ $emp->password }}</td>
                      <td>{{ $emp->gender }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>


                      
                    
   @endsection