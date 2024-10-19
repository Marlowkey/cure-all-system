<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
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
                return $this->pharmacistView($user);
            case 'pharmacist':
                return $this->adminView($user);
            case 'rider':
                return $this->riderView($user);
        }
    }

    private function customerView($user)
    {
        $featuredMedicines = Medicine::inRandomOrder()->take(4)->get();

        return view('home', compact( 'featuredMedicines'));
    }

    private function adminView($user)
    {
        return view('admin.dashboard');
    }

    private function pharmacistView($user)
    {
        return view('pharmacist.dashboard');
    }

    private function riderView($user)
    {
        $orders = Order::where('status', 'For Shipping')
                       ->get();
        return view('rider.dashboard', ['orders' => $orders]);
    }
}
