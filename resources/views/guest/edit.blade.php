@extends ('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Guest Data</h5>
                </div>
                <div class="card-body">
                    <form action="/app/guest/{{ $guest->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Username..." aria-label="Username..."
                                    aria-describedby="basic-icon-default-fullname2" name="name"
                                    value="{{ $guest->name }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="658 799 8941" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="phone" value="{{ $guest->phone }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">ID Number</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="ID Number..." aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="identity_number"
                                    value="{{ $guest->identity_number }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="identity_photo">ID Card Photo</label>
                            <input type="file" id="identity_photo" class="form-control" name="identity_photo"
                                onchange="previewImage(event)">
                            @if ($guest->identity_photo)
                                <div class="mt-2">
                                    <img id="preview" src="{{ asset('storage/' . $guest->identity_photo) }}"
                                        alt="ID Card" width="150">
                                </div>
                            @else
                                <div class="mt-2">
                                    <img id="preview" src="#" alt="Preview" width="150" style="display:none;">
                                </div>
                            @endif
                            <script>
                                function previewImage(event) {
                                    const preview = document.getElementById('preview');
                                    preview.style.display = 'block';
                                    preview.src = URL.createObjectURL(event.target.files[0]);
                                }
                            </script>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
