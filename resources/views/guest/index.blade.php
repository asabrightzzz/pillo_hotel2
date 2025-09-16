@extends('layout')

@section('content')
    <div class="col-xxl- mb-6 order-0">
    <div class="col-xxl-12 mb-6 order-0">
        <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Welcome, Admin! 🎉</h5>
                        <p class="mb-6"> --Halaman data pelanggan
                        </p>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-6">
                        <img src="../assets/img/illustrations/man-with-laptop.png" height="175" alt="View Badge User">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl">
      <form action="/guest" method="post">
        @csrf
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Guest Identification</h5>
            <small class="text-muted float-end">Pillo Hotel</small>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                  <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Username..." aria-label="Username..." aria-describedby="basic-icon-default-fullname2" name="name">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2"name="phone">
                </div>
              </div>                        
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-company">ID Number</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="basic-icon-default-company" class="form-control" placeholder="ID Number..." aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" name="identity_number">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-company">ID Card Photo</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="basic-icon-default-company" class="form-control" placeholder="as..." aria-label="ACME Inc." aria-describedby="basic-icon-default-company2"name="identity_photo">
                  </div>
                </div>
                <div class="form-text">You can use letters, numbers &amp; periods</div>
                <button type="submit" class="btn btn-primary">Send</button>
              </div>            
            </form>
          </div>
        </div>
      </form>
      <div class="card mb-4">
          <h5 class="m-5 text-end">Guest Data</h5>
          <div class="table-responsive">
            <table class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>ID Number</th>
                  <th>ID Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($guests as $gst)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $gst->name }}</td>
                  <td>{{ $gst->phone }}</td>
                  <td>{{ $gst->identity_number }}</td>
                  <td>{{ $gst->identity_photo }}</td>
                  <div class="text-center">
                    <td class="d-flex">
                      <a href="/guest/{{ $gst->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                      &nbsp;
                      <form action="/guest/{{ $gst->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </div>
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
