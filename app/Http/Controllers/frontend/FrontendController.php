<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index', [
            'featureProducts'    => Product::where('trending', 1)->take(15)->get(),
            'trendingCategories' => Category::where('popular', 1)->take(15)->get(),
        ]);
    }
    public function category()
    {
        return view('frontend.pages.category', [
            'Categories' => Category::where('status', 0)->get(),
        ]);
    }

    public function viewCategory($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id', $id)->first();

            return view('frontend.pages.products.index', [
                'category'         => Category::where('id', $id)->first(),
                'CategoryProducts' => $category->products()->where('status', 0)->get(),
            ]);

        } else {
            return redirect('/')->with('status', 'slug does not exists');
        }

        return;
    }

    public function viewProduct($id)
    {

        if (Product::where('id', $id)->exists()) {

            return view('frontend.pages.products.view', [
                'product' => Product::where('id', $id)->first(),
            ]);

        } else {
            return redirect('/')->with('status', 'product does not exists');
        }

        return;

    }
}
