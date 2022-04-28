<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\CreateRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Api\Category\DefaultResource;
use App\Http\Resources\Api\Category\SelectResource;
use App\Models\Category;
use App\Services\UploadFileService;
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

        $data = $request->validated();

        if (array_key_exists('photo', $data)) {
            $photo = $data['photo'];
            unset($data['photo']);
        }

        $category = Category::create($data);

        if (!empty($photo)) {
            UploadFileService::save_photo($photo, $category);
        }
        return new DefaultResource($category);
    }

    public function show(Category $category)
    {
        $this->authorize('Category_show');

        $category->loadCount(['product_types', 'sell_products']);
        $category->load('media');

        return new DefaultResource($category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $this->authorize('Category_edit');

        $data = $request->validated();

        if (array_key_exists('photo', $data)) {
            if (!empty($data['photo'])) {
                UploadFileService::save_photo($data['photo'], $category);
            }
            unset($data['photo']);
        }

        $category->update($data);

        $category->loadCount(['product_types', 'sell_products']);

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
