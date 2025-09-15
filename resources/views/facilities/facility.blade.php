@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-gray-800">Facilities Management</h3>
                <a href="" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus me-2"></i>Add
                </a>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
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
                        {{-- Menggunakan perulangan @forelse untuk menampilkan data fasilitas --}}
                        {{-- @forelse ($facilities as $facility) --}}
                            <tr class="align-middle">
                                <td class="text-start"></td>
                                <td class="text-start">
                                    <span class="">
                                        {{-- {{ $facility->type }} --}}
                                    </span>
                                </td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="" method="POST">
                                            {{-- @csrf
                                            @method('DELETE') --}}
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        {{-- @empty --}}
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    No facilities found.
                                </td>
                            </tr>
                        {{-- @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
