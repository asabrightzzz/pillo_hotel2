@extends ('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Guest Data</h5>
                <form action="/guest/{{ $guest->id }}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                  <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Username..." aria-label="Username..." aria-describedby="basic-icon-default-fullname2" name="name" value="{{ $guest->name }}">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2"name="phone" value="{{ $guest->phone }}">
                </div>
              </div>                        
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-company">ID Number</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="basic-icon-default-company" class="form-control" placeholder="ID Number..." aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" name="identity_number" value="{{ $guest->identity_number }}">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-company">ID Card Photo</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="basic-icon-default-company" class="form-control" placeholder="Id Card Photo..." aria-label="ACME Inc." aria-describedby="basic-icon-default-company2"name="identity_photo" value="{{ $guest->identity_photo }}">
                  </div>
                </div>
                <div class="form-text">You can edit your data &amp; other</div>
                <button type="submit" class="btn btn-primary">Send</button>
              </div>            
                </form>
            </div>
        </div>
    </div>
</div>

@endsection