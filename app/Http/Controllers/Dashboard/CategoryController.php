<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();

        echo view('dashboard.category.create', compact('category'));
    }


    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return to_route("category.index")->with('status', 'Register Create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        echo view('dashboard.category.show', compact('category'));
    }

    public function edit(Category $category)
    {

        echo view('dashboard.category.edit', compact('category'));
    }

    public function update(PutRequest $request, Category $category)
    {

        $category->update($request->validated());
        return to_route("category.index")->with('status', 'Register Updade.');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route("category.index")->with('status', 'Register Delete');

    }
}
