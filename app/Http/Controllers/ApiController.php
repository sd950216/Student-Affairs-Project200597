<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Dotenv;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        //
        $data = json_decode($request->getContent(), true);

        // Check if admin user already exists
        $adminUser = User::where('email', $data['email'])->first();
        if ($adminUser) {
            return new JsonResponse(['error' => 'Admin user already exists'], 400);
        }

        // Create new admin user
        $adminUser = new User();
        $adminUser->name = $data['name'];
        $adminUser->email = $data['email'];
        $adminUser->password = Hash::make($data['password']);
        $adminUser->role = 'admin';
        $adminUser->save();

        return new JsonResponse(['message' => 'Admin user created successfully'], 201);
    }

}
