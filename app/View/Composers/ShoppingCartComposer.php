<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ShoppingCartComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $user->shopping_cart->loadMissing('details');

        $view->with('shoppingCart', $user->shopping_cart);
    }
}