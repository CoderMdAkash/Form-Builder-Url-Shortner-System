<?php
namespace Modules\DynamicFormCreation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DynamicFormCreation\App\Models\Category;
use Modules\DynamicFormCreation\App\Models\Organization;
use Illuminate\Http\Request;
use Modules\DynamicFormCreation\App\Services\CategoryServices;
use Modules\DynamicFormCreation\App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dynamicformcreation::categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $organization = Organization::all();
        return view('dynamicformcreation::categories.create',['organization'=>$organization]);
    }

    public function store(StoreCategoryRequest $request,CategoryServices $categoryServices)
    {
        $categoryServices->store(
            $request->validated()
        );
        return redirect()->route('categories.index')->with(['success' => 'Category created']);
    }

    public function edit(Category $category)
    {
        $organization = Organization::all();
        return view('dynamicformcreation::categories.edit', ['category' => $category,'organization'=>$organization]);
    }

    public function update(StoreCategoryRequest $request, Category $category,CategoryServices $categoryServices)
    {
        $categoryServices->update(
            $category,
            $request->validated()
        );
        return redirect()->route('categories.index')->with(['success' => 'Category updated']);
    }

    public function destroy(Category $category,CategoryServices $categoryServices)
    {
        $categoryServices->destroy($category);
        return redirect()->route('categories.index')->with(['success' => 'Category Deleted']);
    }
}
