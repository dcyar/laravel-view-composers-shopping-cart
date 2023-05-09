<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $user->load('shopping_cart.details');

        $product = Product::find($request->integer('product_id'));

        if ($existsProduct = $user->shopping_cart->details->firstWhere('product_id', $product->id)) {
            $existsProduct->increment('quantity', 1, [
                'total' => ($existsProduct->quantity + 1) * $product->price,
            ]);
        } else {
            $user->shopping_cart->details()->create([
                'product_id' => $product->id,
                'price' => $product->price,
                'total' => $product->price,
            ]);
        }

        $user->shopping_cart->update([
            'amount' => $user->shopping_cart->details()->sum('total'),
        ]);

        return to_route('dashboard')->with('success', "el producto se ha agregado al carrito correctamente.");
    }

    public function removeFromCart(Request $request)
    {
        $user = Auth::user();
        $user->load('shopping_cart.details');

        if ($existsProduct = $user->shopping_cart->details->firstWhere('id', $request->integer('detail_id'))) {
            $existsProduct->delete();
        }

        $user->shopping_cart->update([
            'amount' => $user->shopping_cart->details()->sum('total'),
        ]);

        return to_route('dashboard')->with('success', "el producto se ha eliminado del carrito correctamente.");
    }
}
