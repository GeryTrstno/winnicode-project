<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page when accessing categories', function () {
    $response = $this->get('/categories'); // Mengakses halaman categories sebagai tamu
    $response->assertRedirect('/login');
});

test('authenticated users can visit categories', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('categories')); // Mengakses halaman categories
    $response->assertStatus(200); // Memastikan status code 200 (OK)
});

