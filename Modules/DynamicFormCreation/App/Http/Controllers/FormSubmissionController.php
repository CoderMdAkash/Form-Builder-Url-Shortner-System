<?php

namespace Modules\DynamicFormCreation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DynamicFormCreation\App\Models\Category;
use Modules\DynamicFormCreation\App\Models\FormTemplate;
use Illuminate\Http\Request;
use Modules\DynamicFormCreation\App\Models\FormSubmission;
use Illuminate\Support\Facades\Auth;

class FormSubmissionController extends Controller
{
    public function showForm($formTemplateId) {
        $formTemplate = FormTemplate::findOrFail($formTemplateId);
        return view('dynamicformcreation::submissions.create', compact('formTemplate'));
    }



    public function submitForm(Request $request, $formTemplateId)
    {

        $formTemplate = FormTemplate::findOrFail($formTemplateId);

        $formData = $request->input('formData');
        $submission = new FormSubmission();
        $submission->form_template_id = $formTemplate->id;
        $submission->user_id = Auth::user()->id;
        $submission->submitted_data = json_encode($formData);
        $submission->save();

        return redirect(route('all.submitted.data'))->with('success', 'Form submitted successfully.');
    }





    public function AllSubmittedData(Request $request)
    {
        $categories = Category::all();
        $formTemplates = FormTemplate::all();
        $query = FormSubmission::query();

        if ($request->category_id) {
            $query->whereHas('formTemplate', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        if ($request->form_template_id) {
            $query->where('form_template_id', $request->form_template_id);
        }

        if (Auth::user()->role == 'user') {
            $query->where('user_id', Auth::user()->id);
        }
        $submissions = $query->with('user', 'formTemplate')->paginate(5)->withQueryString();

        return view('dynamicformcreation::submissions.view', compact('submissions','categories','formTemplates'));

    }



}
