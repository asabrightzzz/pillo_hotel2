@extends('layout')

@section('content')
    <div class="col-xl">
        <form action="/app/guest" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Guest Identification</h5>
                    <small class="text-muted float-end">Pillo Hotel</small>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                placeholder="Name..." aria-label="Name..." aria-describedby="basic-icon-default-fullname2"
                                name="name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="tel" id="basic-icon-default-phone" class="form-control phone-mask"
                                placeholder="08xx-xxxx-xxxx" aria-label="08xx-xxxx-xxxx"
                                aria-describedby="basic-icon-default-phone2" name="phone" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">ID Number</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                placeholder="ID Number..." aria-label="ID Number"
                                aria-describedby="basic-icon-default-company2" name="identity_number" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">ID Card Photo</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-image"></i></span>
                            <input type="file" id="basic-icon-default-company" class="form-control"
                                accept=".jpg,.jpeg,.png" aria-label="ID Card Photo"
                                aria-describedby="basic-icon-default-company2" name="identity_photo" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
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
                    @foreach ($guests as $gst)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gst->name }}</td>
                            <td>{{ $gst->phone }}</td>
                            <td>{{ $gst->identity_number }}</td>
                            <td>
                                <img src="{{ asset('storage/identity_photos/' . basename($gst->identity_photo)) }}"
                                    alt="ID Photo" style="max-width: 100px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#photoModal{{ $gst->id }}">
                                <!-- Modal -->
                                <div class="modal fade" id="photoModal{{ $gst->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">ID Photo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/identity_photos/' . basename($gst->identity_photo)) }}"
                                                    alt="ID Photo" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <div class="text-center">
                                <td class="d-flex">
                                    <a href="/app/guest/{{ $gst->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    &nbsp;
                                    <form action="/app/guest/{{ $gst->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
