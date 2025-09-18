@extends ('layout')

@section ('content')
        <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Room</h5>
                    </div>
                    <div class="card-body">
                      <form action="/app/employee" method="post">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname" name="name" placeholder="Room" aria-label="Username." required>
                          </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                            <option value="available">available</option>
                            <option value="occupied">occupied</option>
                            <option value="maintance">maintance</option>
                            <option value="reserved">reserved</option>
                            </select>
                        </div>



                        <div class="mb-3">
                          <label class="form-label" for="password">Password</label>
                          <div class="input-group input-group-merge">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                          </div>
                        </div>

                        <div class="mb-2 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <hr>
 <div class="card mb-4">
          <h5 class="m-5">List Room </h5>
          <div class="table-responsive">
            <table class="table table-bordered w-100 mb-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($room as $rm)
                <tr>
                  <td>{{ $rm->id }}</td>
                  <td>{{ $rm->name }}</td>
                  <td>{{ $rm->phone }}</td>
                  <td>{{ $rm->email }}</td>
                  <td>{{ $rm->gender }}</td>
                <td class="d-flex">
                  <a href="/app/room/{{ $rm->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;
                  <form action="/app/room/{{ $rm->id }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  </td>
                  </tr>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
@endsection

