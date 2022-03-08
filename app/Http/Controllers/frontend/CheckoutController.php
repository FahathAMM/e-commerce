<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Nette\Utils\Random;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {

        $user = User::find(Auth::user()->id);

        foreach ($user->products as $userProduct) {
            $productQtyValid = Product::where('qty', $userProduct->qty)->first();
            if ($userProduct->pivot->product_qty > $productQtyValid->qty) {
                $user->products()->detach($productQtyValid->id);
            }
        }

        return view('frontend.pages.checkout.index', [
            'cartItems' => $user->products,
            'user' => $user,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $data = $request->except(['name', '_token', 'password', 'total']);
        $data['name'] = $request->first_name . " " . $request->last_name;
        User::upsert($data, ['email']);

        $user = User::find(Auth::user()->id);

        $order = [
            'tracking_no' => random_int(5, 99999),
            'message' => 'the message',
            'status' => 0,
            'total' => $request->total,
        ];

        $order =  $user->orders()->create($order);
        $orders = Order::find($order->id);

        foreach ($user->products as $product) {
            $orders->products()->attach($product->id, ['qty' => $product->pivot->product_qty]);
            $products = Product::findOrFail($product->id);
            $currentTotalProduct = $products->qty - $product->pivot->product_qty;
            $products->update(['qty' => $currentTotalProduct]);
        }
        $user->products()->detach();

        return redirect(url('checkout'));
    }
}
