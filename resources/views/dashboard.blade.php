@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary fs-3 fw-bold">Selamat Datang di Pillo Hotel Dashboard!</h5>
                            <p class="mb-4">Anda memiliki <span class="fw-bold">{{ $pendingReservations }}</span> reservasi
                                yang menunggu konfirmasi. Periksa sekarang untuk memastikan pelayanan terbaik.</p>
                            <a href="{{ route('app.reservation.index') }}" class="btn btn-sm btn-outline-primary">Lihat
                                Reservasi</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" height="140"
                                alt="View Badge User">
                            {{-- <img src="{{ asset('/assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Utama -->
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Kamar</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalRooms }}</h4>
                            </div>
                            <small>{{ $availableRooms }} tersedia, {{ $occupiedRooms }} terisi</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded p-2">
                                <i class="bx bx-home-alt bx-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Reservasi</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalReservations }}</h4>
                            </div>
                            <small>{{ $confirmedReservations }} terkonfirmasi</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="bx bx-calendar-check bx-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Check-In Aktif</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $checkedInReservations }}</h4>
                            </div>
                            <small>Tamu yang sedang menginap</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-warning rounded p-2">
                                <i class="bx bx-user-check bx-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Tamu</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalGuests }}</h4>
                            </div>
                            <small>Terdaftar dalam sistem</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded p-2">
                                <i class="bx bx-group bx-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Reservasi Terbaru -->
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0">Reservasi Terbaru</h5>
                    <a href="{{ route('app.reservation.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach ($latestReservations as $reservation)
                            <li class="d-flex mb-3 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="bx bx-calendar"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $reservation->code }}</h6>
                                        <small>{{ $reservation->guest->name }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <span
                                            class="badge bg-label-{{ $reservation->status == 'Pending' ? 'warning' : ($reservation->status == 'Confirmed' ? 'success' : ($reservation->status == 'Checked_in' ? 'info' : 'primary')) }}">{{ $reservation->status }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kategori Kamar -->
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0">Kategori Kamar</h5>
                    <a href="{{ route('app.room_category.index') }}" class="btn btn-sm btn-outline-primary">Kelola
                        Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Jumlah Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($roomCategories as $category)
                                    <tr>
                                        <td><strong>{{ $category->name }}</strong></td>
                                        <td>{{ $category->rooms_count }}</td>
                                        <td>
                                            <a href="{{ route('app.room_category.edit', $category->id) }}"
                                                class="btn btn-sm btn-icon btn-outline-primary">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Cepat -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Navigasi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('app.room.index') }}"
                                    class="btn btn-outline-primary btn-lg mb-2 rounded-circle p-3">
                                    <i class="bx bx-home-alt bx-md"></i>
                                </a>
                                <span>Kamar</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('app.reservation.index') }}"
                                    class="btn btn-outline-success btn-lg mb-2 rounded-circle p-3">
                                    <i class="bx bx-calendar-check bx-md"></i>
                                </a>
                                <span>Reservasi</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('app.guest.index') }}"
                                    class="btn btn-outline-info btn-lg mb-2 rounded-circle p-3">
                                    <i class="bx bx-user bx-md"></i>
                                </a>
                                <span>Tamu</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('app.facility.index') }}"
                                    class="btn btn-outline-warning btn-lg mb-2 rounded-circle p-3">
                                    <i class="bx bx-spa bx-md"></i>
                                </a>
                                <span>Fasilitas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
