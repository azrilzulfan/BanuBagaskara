<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('renders admin login page for guests', function () {
    $response = $this->get(route('admin.login'));

    $response->assertOk();
    $response->assertSee('Masuk Panel Admin');
    $response->assertSee('admin@banubagaskara.id');
});

it('allows valid admin to login and redirects to admin dashboard', function () {
    $admin = User::create([
        'name' => 'Banu Bagaskara Admin',
        'email' => 'admin@banubagaskara.id',
        'password' => Hash::make('BanuBogor2024!*'),
    ]);

    $response = $this->post(route('admin.login.submit'), [
        'email' => 'admin@banubagaskara.id',
        'password' => 'BanuBogor2024!*',
    ]);

    $response->assertRedirect(route('admin.dashboard'));
    $this->assertAuthenticatedAs($admin);

    $admin->refresh();
    expect($admin->last_login_at)->not->toBeNull();
});

it('fails login with invalid password', function () {
    User::create([
        'name' => 'Banu Bagaskara Admin',
        'email' => 'admin@banubagaskara.id',
        'password' => Hash::make('BanuBogor2024!*'),
    ]);

    $response = $this->from(route('admin.login'))->post(route('admin.login.submit'), [
        'email' => 'admin@banubagaskara.id',
        'password' => 'WrongPassword123!',
    ]);

    $response->assertRedirect(route('admin.login'));
    $response->assertSessionHasErrors(['email']);
    $this->assertGuest();
});

it('rate limits admin login after 5 consecutive failed attempts', function () {
    User::create([
        'name' => 'Banu Bagaskara Admin',
        'email' => 'admin@banubagaskara.id',
        'password' => Hash::make('BanuBogor2024!*'),
    ]);

    for ($i = 0; $i < 5; $i++) {
        $this->from(route('admin.login'))->post(route('admin.login.submit'), [
            'email' => 'admin@banubagaskara.id',
            'password' => 'BadPassword',
        ]);
    }

    // 6th attempt should trigger rate limiter error
    $response = $this->from(route('admin.login'))->post(route('admin.login.submit'), [
        'email' => 'admin@banubagaskara.id',
        'password' => 'BadPassword',
    ]);

    $response->assertRedirect(route('admin.login'));
    $response->assertSessionHasErrors(['email']);

    $errors = session('errors')->get('email');
    expect($errors[0])->toContain('Terlalu banyak percobaan masuk gagal');
});

it('redirects unauthenticated users trying to access admin dashboard to login', function () {
    $response = $this->get(route('admin.dashboard'));

    $response->assertRedirect(route('admin.login'));
    $this->assertGuest();
});

it('returns 404 for public register route to prevent unauthorized registration', function () {
    $response = $this->get('/register');

    $response->assertNotFound();
});

it('allows authenticated admin to logout and redirects to login', function () {
    $admin = User::create([
        'name' => 'Banu Bagaskara Admin',
        'email' => 'admin@banubagaskara.id',
        'password' => Hash::make('BanuBogor2024!*'),
    ]);

    $response = $this->actingAs($admin)->post(route('admin.logout'));

    $response->assertRedirect(route('admin.login'));
    $this->assertGuest();
});
