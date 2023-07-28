<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Checkout\Paid;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $data['checkouts'] = Checkout::with('Camp')->get();
        return view('admin.dashboard', $data);
    }

    public function updatePaid(Request $request, Checkout $checkout)
    {
        // Checkout::whereId($checkout->id)->update(['is_paid' => 1]);
        $checkout->is_paid = true;
        $checkout->save();
        Mail::to($checkout->user->email)->send(new Paid($checkout));
        $request->session()->flash('success', "Checkout with Camp Name {$checkout->camp->title} and Username {$checkout->user->name} has been updated!");
        return Redirect::route('admin.dashboard');
    }
}
