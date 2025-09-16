@extends('layout')

@section('content')

<div class="card mb-6">
          <div class="card-header">
           <h3 class="text-2xl font-bold text-gray-800">Add new Facilities</h3>
           <div class="text-end">
               <a href="{{ route('app.facility.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </a>
           </div>
          </div>

          @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
                <p class="font-bold">Something is wrong with your input:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
              <form action="{{ route('app.facility.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                  <label class="form-label" for="ecommerce-product-name">Name</label>
                  <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product title" name="productTitle" aria-label="Product title">
                </div>
            </form>
            <div class="row mb-6">
              <div class="col"><label class="form-label" for="ecommerce-product-sku">Stock</label> <input type="number" class="form-control" id="ecommerce-product-sku" placeholder="Stock" name="productSku"></div>
              <div class="col"><label class="form-label" for="ecommerce-product-barcode">Type</label> <input type="text" class="form-control" id="ecommerce-product-barcode" placeholder="Type" name="productBarcode"></div>
            </div>
            <!-- Description -->
            <div>
              <label class="mb-1">Description (Optional)</label>
              <div class="form-control p-0">
                <div class="comment-toolbar border-0 border-bottom ql-toolbar ql-snow">
                  <div class="d-flex justify-content-start">
                  </div>
                </div>
                <div class="comment-editor border-0 pb-6 ql-container ql-snow" id="ecommerce-category-description"><div class="ql-editor ql-blank" contenteditable="true" data-placeholder="Product Description"><p><br></p></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
              </div>
            </div>
          </div>
          {{-- <div class="card-body">
          
          </div> --}}
        </div>

    {{-- <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Fasilitas Baru</h1>
            <a href="{{ route('app.facility.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
                <p class="font-bold">Ada beberapa masalah dengan input Anda:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('app.facility.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Fasilitas</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200">
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipe Fasilitas</label>
                    <select name="type" id="type" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200">
                        <option value="room" @if(old('type') === 'room') selected @endif>Fasilitas Kamar</option>
                        <option value="public" @if(old('type') === 'public') selected @endif>Fasilitas Umum</option>
                    </select>
                </div>
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200">
                </div>
            </div>
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200">{{ old('description') }}</textarea>
            </div>
            
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Simpan Fasilitas
                </button>
            </div>
        </form>
    </div> --}}

@endsection