<?php

namespace Modules\DynamicFormCreation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DynamicFormCreation\App\Models\Organization;
use Illuminate\Http\Request;
use Modules\DynamicFormCreation\App\Services\OrganizationServices;
use Modules\DynamicFormCreation\App\Http\Requests\StoreOrganizationRequest;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::all();
        return view('dynamicformcreation::organization.index', ['organization' => $organization]);
    }

    public function create()
    {
        return view('dynamicformcreation::organization.create');
    }

    public function store(StoreOrganizationRequest $request,OrganizationServices $organizationServices)
    {
        $organizationServices->store(
            $request->validated()
        );
        return redirect()->route('organization.index')->with(['success' => 'Organization created']);
    }

    public function edit(Organization $organization)
    {
        return view('dynamicformcreation::organization.edit', ['organization' => $organization]);
    }

    public function update(StoreOrganizationRequest $request, Organization $organization,OrganizationServices $organizationServices)
    {
        $organizationServices->update(
            $organization,
            $request->validated()
        );
        return redirect()->route('organization.index')->with(['success' => 'Organization updated']);
    }

    public function destroy(Organization $organization,OrganizationServices $organizationServices)
    {
        $organizationServices->destroy($organization);
        return redirect()->route('organization.index')->with(['success' => 'Organization Deleted']);
    }
}
