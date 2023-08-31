<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $credentials = $request->validated();

        $user = User::create($credentials);

        Auth::login($user);

        return redirect()->route('tasks.index');
    }
}
