@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Submitted List</h4>
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                                <th>Form Title</th>
                                <th>Submitted By</th>
                                <th>Submission Date</th>
                                <th>Data</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($submissions as $submission)
                                <tr>
                                    <td>{{ $submission->formTemplate->title }}</td>
                                    <td>{{ $submission->user->name }}</td>
                                    <td>{{ $submission->created_at }}</td>
                                    <td>
                                        <ul>
                                            @if($submission->submitted_data != 'null')
                                            @foreach(json_decode($submission->submitted_data??[], true) as $key => $value)
                                                @php
                                                    $field = Modules\DynamicFormCreation\App\Models\Field::find($key) ?? [];
                                                @endphp
                                                <li><b>{{ $field->name }}:</b> {{ $value }}</li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($submissions->count() <= 0)
                            <tr>
                                <td colspan="4" class="text-center m-5 p-5">No Data Found!</td>
                            </tr>
                            @endif
                          </tbody>
                        </table>
                      </div>

                    {{$submissions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
