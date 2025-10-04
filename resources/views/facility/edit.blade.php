@extends('layout')

@section('content')

<link href="https://www.google.com/search?q=https://cdn.jsdelivr.net/npm/bootstrap%405.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="card my-4 mx-auto" style="max-width: 600px;">
<div class="card-header d-flex justify-content-between align-items-center">
<h3 class="card-title h5 fw-bold text-gray-800">Edit Facilities</h3>
<a href="{{ route('app.facility.index') }}" class="btn btn-secondary">
<i class="fas fa-arrow-left me-2"></i> Back
</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger mb-4" role="alert">
        <h4 class="alert-heading fw-bold">There's something wrong with your input:</h4>
        <hr>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body">
    <form action="{{ route('app.facility.update', $facility->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Facility Name" value="{{ old('name', $facility->name) }}" required>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label" for="type">Facility Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="" hidden>-- Select Type --</option>
                    <option value="room" @if(old('type', $facility->type) === 'room') selected @endif>Room Facility</option>
                    <option value="public" @if(old('type', $facility->type) === 'public') selected @endif>Public Facility</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="stock">Stock</label> 
                <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock', $facility->stock) }}" placeholder="Stok">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="stock">Consumable</label> 
            <input type="checkbox" class="form-check-input" name="consumable" @if(old('consumable', $facility->consumable)) checked @endif>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" rows="2" id="description" name="description" placeholder="Optional">{{ old('description', $facility->description) }}</textarea>
        </div>
        
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                Update Facility
            </button>
        </div>
    </form>
</div>

</div>

@endsection