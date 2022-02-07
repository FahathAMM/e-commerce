<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $user    = User::find(Auth::user()->id);
            $product = Product::find($request->product_id);
            if ($product) {
                $user->products()->syncWithPivotValues($request->product_id, ['product_qty' => $request->product_qty]);
            }
            return response()->json(['status' => $product->name . '  Success to Add to Cart']);
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }
}
