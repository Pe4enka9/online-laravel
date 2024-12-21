<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $allUsers = User::query()->whereNot('id', $user->id)->get();

        return view('index', ['user' => $user, 'allUsers' => $allUsers]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login.index');
    }

    public function showUser(string $login): View
    {
        $user = User::query()->where('login', $login)->firstOrFail();

        return view('user', ['user' => $user]);
    }
}
