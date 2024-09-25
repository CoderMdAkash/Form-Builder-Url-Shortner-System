<?php
namespace Modules\DynamicFormCreation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DynamicFormCreation\App\Models\Category;
use Modules\DynamicFormCreation\App\Models\FormTemplate;
use Illuminate\Http\Request;
use Modules\DynamicFormCreation\App\Services\FormTemplateServices;
use Modules\DynamicFormCreation\App\Http\Requests\StoreFormTemplateRequest;

class FormTemplateController extends Controller
{
    public function index()
    {
        $formTemplate = FormTemplate::get();
        return view('dynamicformcreation::form-templates.index', ['formTemplate'=>$formTemplate]);
    }

    public function forms(Request $request)
    {
        $categories = Category::all();
        $query = FormTemplate::query();
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        $all_templates = $query->get();
        return view('dynamicformcreation::form-templates.forms', ['all_templates'=>$all_templates,'categories'=>$categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dynamicformcreation::form-templates.create', ['categories' => $categories]);
    }

    public function store(StoreFormTemplateRequest $request,FormTemplateServices $FormTemplateServices)
    {
        $FormTemplateServices->store(
            $request->validated()
        );
        return redirect()->route('form-templates.index')->with(['success' => 'Form Template created']);
    }


    public function edit(FormTemplate $FormTemplate)
    {
        $categories = Category::all();
        return view('dynamicformcreation::form-templates.edit', ['FormTemplate' => $FormTemplate,'categories'=>$categories]);
    }

    public function update(StoreFormTemplateRequest $request, FormTemplate $FormTemplate,FormTemplateServices $FormTemplateServices)
    {
        $FormTemplateServices->update(
            $FormTemplate,
            $request->validated()
        );
        return redirect()->route('form-templates.index')->with(['success' => 'Form Template updated']);
    }

    public function destroy(FormTemplate $FormTemplate, FormTemplateServices $FormTemplateServices)
    {
        $FormTemplateServices->destroy($FormTemplate);
        return redirect()->route('form-templates.index')->with(['success' => 'Form Template Deleted']);
    }
}
