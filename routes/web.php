<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->get('/auth/user', function (Request $request) {
    return response()->json($request->user());
});

Route::get('/', function() {
    return redirect('/dashboard');
});

Route::get('/dashboard', function (Request $request) {
    return redirect('https://dannyapi.informaticamajada.es/');
})->middleware('auth');


Route::get('/logout-user', function () {
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
