<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $student = (new \App\Models\Student())->create([
        'name' => 'New student',
        'birthday' => now(),
        'email' => 'test2d@test.com',
        'mobile' => '1234522',
        'address' => 'Test address',
        'course_title' => 'Test course',
        'category' => [1, 2, 3, 4],
        'status' => 1,
    ]);

    dd($student);

    return view('welcome', [
        'user' => []
    ]);
});

Route::resource('/student', \App\Http\Controllers\StudentController::class);

Route::get('/create-user', function () {

    $user = (new \App\Models\User())->create([
        'name' => 'John Doe',
        'email' => 'john12@doe.com',
        'bio' => 'Hello World',
        'tags' => json_encode(['developer', 'employee', 'nugegoda', 'car', 'dj']),
        'password' => \Illuminate\Support\Facades\Hash::make('password'),
    ]);

    dd($user);


});

Route::get('/get-user', function () {

    $user_id = request()->get('user_id');

    dd((new \App\Models\User())->get());


    dd('SELECT * FROM users WHERE id = ' . $user_id, \App\Models\User::where('id', $user_id)->toSql());
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/updated-on-git', function () {
    return view('test');
});

Route::get('/contact', [
    App\Http\Controllers\ContactController::class, 'showContactForm'
]);
