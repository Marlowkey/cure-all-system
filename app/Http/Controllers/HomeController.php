<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        switch ($user->role) {
            case 'customer':
                return $this->customerView($user);
            case 'admin':
                return $this->adminView($user);
            case 'pharmacist':
                return $this->adminView($user);
            case 'rider':
                return $this->adminView($user);
        }
    }

    private function customerView($user)
    {
        return view('home');
    }

    private function adminView($user)
    {
        return view('dashboard');
    }
}
