<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        // return $cart = $user->products;

        return view('frontend.pages.cart.view-cart', [
            'user' => $user,
            'cart' => $user->products,
        ]);
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $user    = User::find(Auth::user()->id);
            $product = Product::find($request->product_id);
            if ($product) {
                $success =   $user->products()->syncWithoutDetaching([$request->product_id => ['product_qty' => $request->product_qty]]);
                if ($success) {
                    return response()->json(['status' => $product->name . '  Success to Add to Cart']);
                } else {
                    return response()->json(['status' => $product->name . '  Already Exists']);
                }
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }
    public function delete(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->products()->detach($request->product_id);

        return response()->json(['status' => 'Successfully Deleted']);
    } 

    public function updateQuantity(Request $request)
    {

        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $user->products()->syncWithoutDetaching([$request->product_id => ['product_qty' => $request->product_qty]]);
            return response()->json(['status' => 'Quantity Updated']);
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }
}
