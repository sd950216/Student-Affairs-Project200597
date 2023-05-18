<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $subjects = Courses::all();
        if ($subjects->count()==0){
            return redirect('/AddSubject')->with('message', 'Please add subject first.');
        }
        else

        return view('auth.register')->with(compact('subjects'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:255'],
            'AcademicNumber' => $request->get('role') === 'student' ? 'required|string|numeric|unique:users' : '',
            'specialization' => $request->get('role') === 'doctor' ? 'required|string|unique:users' : '',


        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'AcademicNumber' => $request->AcademicNumber,
            'Specialization' => $request->specialization,


        ]);
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME)->with('success', 'Account has been created successfully!');
    }
}
