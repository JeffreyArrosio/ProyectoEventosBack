<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    $data = $request->query('data');
    //dd($data);
    return redirect('http://localhost:5175?data='.$data);
})->middleware('auth');


Route::get('/logout-user', function() {
    return view('logout');
})->middleware('auth');

// Route::get('/auth/check', function () {
//     return response()->json([
//         'authentificated' => Auth::check(),
//         'user' => Auth::user(),
//     ]);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
