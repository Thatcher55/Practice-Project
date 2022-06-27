<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Controller;

class UserSettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('settings', [
             'User' => $user
        ]);
    }



}
