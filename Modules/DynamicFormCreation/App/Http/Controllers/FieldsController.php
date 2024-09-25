<?php

namespace Modules\DynamicFormCreation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DynamicFormCreation\App\Models\Field;
use Modules\DynamicFormCreation\App\Models\FormTemplate;
use Illuminate\Http\Request;
use Modules\DynamicFormCreation\App\Services\FieldServices;
use Modules\DynamicFormCreation\App\Http\Requests\StoreFieldRequest;

class FieldsController extends Controller
{

    CONST SELECT_OPTION = [
        'text'=>    'Text',
        'select'=>  'Dropdown',
        'checkbox'=>'Checkbox',
        'radio'=>   'Radio',
        'date'=>    'Date',
        'email'=>   'Email',
        'number'=>  'Number',
        'password'=>'Password',
        'textarea'=>'Textarea',
    ];
    
    public function index()
    {
        $fields = Field::orderBy('order','ASC')->get();
        return view('dynamicformcreation::fields.index', ['fields' => $fields]);
    }

    public function create()
    {
        $SELECT_OPTION = $this::SELECT_OPTION;
        $formTemplate = FormTemplate::get();
        return view('dynamicformcreation::fields.create',['formTemplate'=>$formTemplate, 'SELECT_OPTION' => $SELECT_OPTION]);
    }

    public function store(StoreFieldRequest $request,FieldServices $fieldServices)
    {
        $data = $request->validated();
        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }
        $fieldServices->store($data);
        return redirect()->route('fields.index')->with(['success' => 'Field created']);
    }

    public function edit(Field $field)
    {
        $SELECT_OPTION = $this::SELECT_OPTION;
        $formTemplate = FormTemplate::get();
        return view('dynamicformcreation::fields.edit', ['field' => $field,'formTemplate'=>$formTemplate, 'SELECT_OPTION' => $SELECT_OPTION]);
    }

    public function update(StoreFieldRequest $request, Field $field,FieldServices $fieldServices)
    {

        $data = $request->validated();
        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }
        $fieldServices->update($field , $data);
        return redirect()->route('fields.index')->with(['success' => 'Field updated']);
    }

    public function destroy(Field $field,FieldServices $fieldServices)
    {
        $fieldServices->destroy($field);
        return redirect()->route('fields.index')->with(['success' => 'Field Deleted']);
    }
}
