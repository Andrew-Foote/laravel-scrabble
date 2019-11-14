<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
	$members = \App\Member::all()->sortBy('joindate');
    return view('index', ['members' => $members]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/leaderboard', function() {
	$members = \App\Member::all();
	return view('leaderboard', ['members' => $members->sortByDesc('averageScore')->take(10)]);
})->name('leaderboard');

Route::get('/profile/{member_id}', function ($member_id) {
	return view('profile', ['member' => \App\Member::find($member_id)]);
})->name('profile');

Route::get('/profile/{member_id}/edit', function ($member_id) {
	return view('profile-edit', ['member' => \App\Member::find($member_id)]);
})->name('profile-edit');

Route::post('/profile/{member_id}/edit/submit', function ($member_id, Request $request) {
	$data = $request->validate([
		'name' => 'required|max:255',
		'email' => 'required|email|max:255',
	]);
	$member = \App\Member::find($member_id);
	$member->name = $data['name'];
	$member->email = $data['email'];
	$member->save();
	return redirect(route('profile', ['member' => $member->id]));
})->name('profile-edit-submit');