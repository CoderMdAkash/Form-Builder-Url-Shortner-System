@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-8 col-xl-8">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{$formTemplate->title}}</h4>

                    <form class="" method="POST" action="{{ route('form.store', $formTemplate->id) }}" >
                        @csrf
            
                        @foreach($formTemplate->fields as $field)
                            @if($field->type === 'checkbox')
                                <div class="form-group mt-2">
                                    <label for="{{ $field->id }}">{{ $field->label }}</label>
                                    <input type="checkbox" id="{{ $field->id }}" name="formData[{{ $field->id }}]" {{ old($field->id) ? 'checked' : '' }} class="mr-2 form-control">
                                </div>
            
                            @elseif($field->type === 'radio')
                                <div class="form-group mt-2">
                                    <label for="{{ $field->id }}" class="">{{ $field->label }}</label>
                                    <input id="{{ $field->id }}" type="radio"  name="formData[{{ $field->id }}]" value="{{ $field->id }}" class="form-control">
                                </div>
            
                            @elseif($field->type === 'select')
                                <div class="form-group mt-2">
                                    <label for="{{ $field->id }}">{{ $field->label }}</label>
                                    <select id="{{ $field->id }}" name="formData[{{ $field->id }}]" class="form-select" >
                                        @php
                                            $options = $field->options ? json_decode($field->options) : [];
                                        @endphp
                                        @foreach($options as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                            @elseif($field->type === 'textarea')
                                <div class="form-group mt-2">
                                    <label for="{{ $field->id }}">{{ $field->label }}</label>
                                    <textarea id="{{ $field->id }}" name="formData[{{ $field->id }}]" class="form-textarea form-control">{{ old($field->id) }}</textarea>
                                </div>
            
                            @else
                                <div class="form-group mt-2">
                                    <label for="{{ $field->id }}">{{ $field->label }}</label>
                                    <input type="{{$field->type}}" id="{{ $field->id }}" name="formData[{{ $field->id }}]" class="form-control" value="{{ old($field->id) }}">
                                </div>
            
                            @endif
                        @endforeach
            
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
