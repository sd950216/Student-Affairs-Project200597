<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create-admin', function (Request $request) {
    // Check if API key is valid
    $apiKey = $_ENV['API_KEY'];
    if ($request->header('X-API-KEY') != $apiKey) {
        return response()->json(['error' => 'Unauthorized, Invalid API-KEY'], 401);
    }
    if (User::GetAdminsCount() == 1) {
        return response()->json(['error' => 'There is already an admin'], 401);

    }

    // Create admin user
    $admin = new App\Models\User;
    $admin->name = "TRAP";
    $admin->email = "admin@admin.com";
    $admin->password = Hash::make("12345678");
    $admin->role = 'admin';
    $admin->save();

    return User::GetAdminsCount();
});

