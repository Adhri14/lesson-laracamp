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

    public function dashboard()
    {
        $isAdmin = Auth::user()->is_admin;
        switch ($isAdmin) {
            case true:
                return redirect(route('admin.dashboard'));
            default:
                return redirect(route('user.dashboard'));
        }
    }
}
