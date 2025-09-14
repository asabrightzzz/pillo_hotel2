@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-gray-800">Facilities Managment</h3>
        <a href="" class="btn btn-primary shadow-sm"> <i class="fas fa-plus me-2"></i>Add</a>

      </div>

    </div>
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
                            <tr class="align-middle">
                                <td class="text-start"></td>
                                <td class="text-start">
                                    <span class="">
                                    </span>
                                </td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    No facilities found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                          
  </div>
</div>

                  
{{-- <div class="card">
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
</div> --}}
@endsection