<?php

use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Employee;

test('portfolio visitor can access dashboard directly', function () {
    $response = $this->get('/app/dashboard');
    $response->assertStatus(200);
});

test('root url redirects directly to dashboard', function () {
    $response = $this->get('/');
    $response->assertRedirect(route('app.dashboard.index'));
});

test('room inventory and reservation workflow works with string code', function () {
    $category = RoomCategory::create([
        'name' => 'Deluxe Suite',
        'price' => 1500000,
        'room_size' => '45 sqm',
        'capacity' => 2,
        'bed_setup' => 'Double',
    ]);

    $room = Room::create([
        'name' => '101',
        'status' => 'Available',
        'room_category_id' => $category->id,
        'description' => 'Ocean view suite',
    ]);

    $guest = Guest::create([
        'name' => 'Jane Doe',
        'phone' => '08123456789',
        'identity_number' => '3201234567890001',
        'identity_photo' => 'identity_photos/sample.jpg',
    ]);

    $code = '3260915001'; // Over 2.14 billion
    $reservation = Reservation::create([
        'code' => $code,
        'guest_id' => $guest->id,
        'status' => 'Confirmed',
        'voucher' => 'WELCOME10',
    ]);

    expect($reservation->code)->toBe('3260915001');
    expect($room->roomCategory->name)->toBe('Deluxe Suite');
});

test('employee password is automatically hashed', function () {
    $employee = Employee::create([
        'name' => 'Frontdesk Staff',
        'email' => 'frontdesk@example.com',
        'phone' => '08987654321',
        'gender' => 'Female',
        'password' => 'secret123',
    ]);

    expect($employee->password)->not->toBe('secret123');
    expect(Illuminate\Support\Facades\Hash::check('secret123', $employee->password))->toBeTrue();
});
