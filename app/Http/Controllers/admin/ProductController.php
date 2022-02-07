<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;

    public function __construct(Product $model)
    {
        $this->model    = $model;
        $this->redirect = 'products.index';
    }

    public function index()
    {
        return view('admin.products.index', [
            'products'   => $this->model->paginate(10),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'             => 'required',
            'slug'             => 'required',
            'original_price'   => 'required',
            'selling_price'    => 'required',
            'qty'              => 'required',
            'tex'              => 'required',
            'meta_keyword'     => 'required',
            'meta_description' => 'required',
            'description'      => 'required',
            'meta_title'       => 'required',
            'image'            => 'mimes:jpg,png|image|max:1024',
        ]);

        $created = $this->model->create($request->except('image'));

        if ($request->hasFile('image')) {
            $path = $request->image->store('product', 'public');

            $created->image = $path;
            $created->save();
        }

        return redirect(route($this->redirect))->with('success', 'done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product'    => $product,
            'categories' => Category::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


        $request->validate([
            'name'             => 'required',
            'slug'             => 'required',
            'original_price'   => 'required',
            'selling_price'    => 'required',
            'qty'              => 'required',
            'tex'              => 'required',
            'meta_keyword'     => 'required',
            'meta_description' => 'required',
            'description'      => 'required',
            'meta_title'       => 'required',
            'image'            => 'mimes:jpg,png|image|max:1024',
        ]);

        $product->update($request->except('image'));

        if ($request->hasFile('image')) {
            $path = 'storage/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $path           = $request->image->store('product', 'public');
            $product->image = $path;
            $product->save();

        }

        return redirect(route($this->redirect))->with('success', 'done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $path = 'storage/' . $product->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        return redirect(route($this->redirect))->with('success', 'Deleted');
    }
}
