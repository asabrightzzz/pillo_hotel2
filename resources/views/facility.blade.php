@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">
    <h1>Facilities list</h1>
    <div class="card-body">
      <div class="row">
        <div class="col-4">
          <form action="" method="post">
            @csrf
            <input type="text" class="form-control" placeholder="Name"/>
            <select name="s=" id="">
              <option value="" hidden></option>
            </select>
          </form>
          <button class="btn btn-purple btn-sm">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection