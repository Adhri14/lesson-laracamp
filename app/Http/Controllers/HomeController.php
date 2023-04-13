<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('user.welcome');
    }

    public function dashboard(): View
    {
        $data['checkouts'] = Checkout::with('Camp')->whereUserId(Auth::id())->get();

        // return $checkouts;

        return view('user.dashboard', $data);
    }
}
