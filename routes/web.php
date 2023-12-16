<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [Controller::class, 'dailyMenu']);
Route::get('/order/{dish}', [Controller::class, 'order']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';

Route::get("/login", function(Request $request) {
    // dd($request->email);
    $user = User::where("email", $request->email);
    if (empty($user)) {
        $user = User::create([$request->only('email', 'password')]);
    }
    if (Auth::attempt(['email' => $user->email, 'password' => $user->password])) {
        return redirect("/admin");
    }
    return redirect("/admin/login");
});

