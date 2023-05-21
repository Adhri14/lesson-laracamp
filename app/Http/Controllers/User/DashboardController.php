<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['checkouts'] = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        return view('user.dashboard', $data);
    }
}
