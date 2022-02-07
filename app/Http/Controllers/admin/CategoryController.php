<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model    = $model;
        $this->redirect = 'categories.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
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
        return view('admin.category.create');
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
            'name'          => 'required',
            'slug'          => 'required',
            'meta_keywords' => 'required',
            'meta_describe' => 'required',
            'description'   => 'required',
            'meta_title'    => 'required',
            'image'         => 'mimes:jpg,png|image|max:1024',
        ]);

        $created = $this->model->create($request->except('image'));

        if ($request->hasFile('image')) {
            $path = $request->image->store('category', 'public');

            $created->image = $path;
            $created->save();
        }

        return redirect(route($this->redirect))->with('success', 'done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name'          => 'required',
            'slug'          => 'required',
            'meta_keywords' => 'required',
            'meta_describe' => 'required',
            'description'   => 'required',
            'meta_title'    => 'required',
            'image'         => 'mimes:jpg,png|image|max:1024',
        ]);

        $category->update($request->except('image'));

        if ($request->hasFile('image')) {
            $path = 'storage/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $path            = $request->image->store('category', 'public');
            $category->image = $path;
            $category->save();

        }

        return redirect(route($this->redirect))->with('success', 'Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $path = 'storage/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        return redirect(route($this->redirect))->with('success', 'Deleted');
    }
}
