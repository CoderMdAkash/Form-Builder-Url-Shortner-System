@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-7 col-xl-7">

            <div class="card">
                <div class="card-body p-5">
                  <h4 class="card-title">Form List</h4>


                    <div class="">
                        <div class="form-group mt-2">
                            <form action="{{ route('forms.index') }}" method="GET">
                                @php
                                    $category_id  = $_GET['category_id'] ?? '';
                                    $form_template  = $_GET['form_template_id'] ?? '';
                                @endphp
                                <label for="category_id" class="mr-2">Select Category:</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option {{$category_id==$category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success mt-2 mb-2">Filter</button>
                            </form>
                        </div>

                        @if ($all_templates->count() <= 0)
                            <div class="mb-16 bg-white border border-gray-100 rounded-xl">
                                <div class="flex flex-col justify-center items-center">
                                    <h3 class="p-6 text-center text-xl">
                                        No data found
                                    </h3>
                                </div>
                            </div>
                        @else

                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category name</th>
                                <th>Description</th>
                                <th>Submission</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_templates as $item)
                                    <tr>
                                        <th>{{$item->title}}</th>
                                        <th>{{$item->category->name ?? ''}}</th>
                                        <td>{{$item->description}}</td>

                                        <td>
                                            <div>
                                                <a href="{{ route('form.create', $item->id) }}" class="btn btn-primary" >
                                                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/form.png" alt="form"/> Form
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
