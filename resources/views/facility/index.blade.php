@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-gray-800">Facilities Management</h3>
                <a href="{{ route('app.facility.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus me-2"></i>Add
                </a>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive table-rounded">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-start">Name</th>
                            <th scope="col" class="text-start">Type</th>
                            <th scope="col" class="text-start">Stock</th>
                            <th scope="col" class="text-start">Description</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($facilities as $facility)
                            <tr class="align-middle">
                                <td class="text-start">{{ $facility->name }}</td>
                                <td class="text-start">
                                    <span class="">
                                        <span class="badge {{ $facility->type === 'room' ? 'bg-info' : 'bg-secondary' }}">
                                            {{ ucwords($facility->type) }}
                                        </span>
                                    </span>
                                </td>
                                <td class="text-start">{{ $facility->stock ?? 'N/A' }}</td>
                                <td class="text-start">{{ $facility->description ?? 'No Description' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('app.facility.edit', $facility->id) }}" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('app.facility.destroy', $facility->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this facility?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danoorrgger" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    No facilities found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection