<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\Store;
use App\Models\CampBenefit;
use App\Models\Camps;
use App\Models\Checkout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Camps $camp, Request $request)
    {
        if ($camp->isRegistered) {
            $request->session()->flash('error', "You already registered {$camp->title} camp.");
            return Redirect::route('dashboard');
        }
        return view('checkout.create', [
            "camp" => $camp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request, Camps $camp): RedirectResponse
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;

        // update user
        $user = Auth::user();
        $user->occupation = $data['occupation'];
        $user->save();

        Checkout::create($data);
        return Redirect::route('checkout.success');
    }

    public function success_checkout(): View
    {
        return view("checkout.success");
    }
}
