@extends('layout')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Room Categories</h5>
        <small class="text-body float-end">Room Categories</small>
      </div>
      <div class="card-body">
        <form action="/app/room_category" method="POST">
          @csrf
          <div class="mb-6">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="mb-6">
            <label class="form-label" for="price">Price</label>
            <div class="input-group input-group-merge">
              <input type="text" id="price" name="price" class="form-control" placeholder="100" aria-label="100" aria-describedby="room-price-addon" required>
              <span class="input-group-text" id="room-price-addon">$</span>
            </div>
            <div class="form-text">Enter the price per night</div>
          </div>
          <div class="mb-6">
            <label class="form-label" for="room_size">Room Size</label>
            <input type="text" class="form-control" id="room_size" name="room_size" placeholder="30 sqm" required>
          </div>
          <div class="mb-6">
            <label class="form-label" for="capacity">Capacity</label>
            <input type="text" class="form-control" id="capacity" name="capacity" placeholder="2" required>
          </div>
          <div class="mb-6">
            <label class="form-label" for="bed-setup">Bed setup</label>
            <div class="input-group bed-setup-group">
              <select class="form-control" id="bed_setup" name="bed_setup" style="appearance: none;">
                <option value="Single">Single</option>
                <option value="Queen">Queen</option>
                <option value="King">King</option>
              </select>
              <span class="input-group-text bg-white bed-arrow">
                <svg id="bed-arrow-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                  <path d="M7.247 11.14l-4.796-5.481C1.825 5.21 2.345 4.5 3.163 4.5h9.674c.818 0 1.338.71.712 1.159l-4.796 5.481a1 1 0 0 1-1.506 0z" />
                </svg>
              </span>
            </div>
            <style>
              .bed-arrow svg {
                transition: transform 0.3s cubic-bezier(.4, 0, .2, 1);
              }

              .bed-setup-group:focus-within .bed-arrow svg {
                transform: rotate(180deg);
              }
            </style>
          </div>
          <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">Room Categories Table</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Room</th>
                <th>Capacity</th>
                <th>Bed Setup</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roomCategories as $RC)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $RC->name }}</td>
                <td>{{ $RC->price }}</td>
                <td>{{ $RC->room_size }}</td>
                <td>{{ $RC->capacity }}</td>
                <td>{{ $RC->bed_setup }}</td>
                <td class="d-flex">
                  <a href="/app/room_category/{{ $RC->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;
                  <form action="/app/room_category/{{ $RC->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection