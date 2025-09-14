@extends('layout')

@section('content')

<form method="POST" action="{{ isset($facility) ? route('facilities.update', $facility->id) : route('facilities.store') }}">
    @csrf
    @if(isset($facility)) @method('PUT') @endif

    <label>Nama Fasilitas</label>
    <input type="text" name="name" value="{{ old('name', $facility->name ?? '') }}" required>

    <label>Tipe</label>
    <select name="type" required>
        <option value="room" {{ (old('type', $facility->type ?? '') == 'room') ? 'selected' : '' }}>Room</option>
        <option value="public" {{ (old('type', $facility->type ?? '') == 'public') ? 'selected' : '' }}>Public</option>
    </select>

    <label>Stok (Opsional)</label>
    <input type="number" name="stock" value="{{ old('stock', $facility->stock ?? '') }}">

    <button type="submit">Simpan</button>
</form>
@sectionend