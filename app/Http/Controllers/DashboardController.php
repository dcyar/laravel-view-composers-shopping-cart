<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'shopping_cart' => ShoppingCart::with('details.product')->whereUserId(Auth::id())->first(),
            'products' => Product::all()
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'shopping_cart' => ShoppingCart::with('details.product')->whereUserId(Auth::id())->first(),
        ]);
    }
}
