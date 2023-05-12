<?php

use Dotenv\Dotenv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$dotenv = Dotenv::createImmutable('C:\Users\ss950\Downloads\Laravel\laravel_project');
$dotenv->load();
Route::post('/create-admin', function (Illuminate\Http\Request $request) {
    // Check if API key is valid
    $apiKey = $_ENV['API_KEY'];
    if ($request->header('X-API-KEY') != $apiKey) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Create admin user
    $admin = new App\Models\User;
    $admin->name = "TRAP";
    $admin->email = "admin@admin.com";
    $admin->password = Hash::make("12345678");
    $admin->role = 'admin';
    $admin->save();

    return response()->json(['message' => 'Admin user created successfully'], 201);
});

