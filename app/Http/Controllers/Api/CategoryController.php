<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\CreateRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Api\Category\DefaultResource;
use App\Http\Resources\Api\Category\SelectResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('Category_access');

        $categories = Category::withCount('sell_products')->withCount('product_types')->get();
        return DefaultResource::collection($categories);
    }

    public function store(CreateRequest $request)
    {
        $this->authorize('Category_create');

        $category = Category::create($request->validated());
        return new DefaultResource($category);
    }

    public function show(Category $category)
    {
        $this->authorize('Category_show');

        $category->loadCount(['product_types', 'sell_products']);

        return new DefaultResource($category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $this->authorize('Category_edit');

        $category->loadCount(['product_types', 'sell_products']);

        $category->update($request->validated());
        return new DefaultResource($category);
    }

    public function destroy(Category $category)
    {
        $this->authorize('Category_delete');

        $category->delete();
        return response()->noContent();
    }

    public function get_for_select()
    {
        $categories = Category::all();
        return SelectResource::collection($categories);
    }
}
