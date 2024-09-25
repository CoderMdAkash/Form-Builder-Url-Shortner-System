@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Fields</h4>
                    <div class="d-flex justify-content-end">
                        <div>
                          <a href="{{route('fields.create')}}" class="btn btn-success">+ Add New</a>
                        </div>
                    </div>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>OrderID</th>
                            <th>Template name</th>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Type</th>
                            <th>Options</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($fields as $item)
                            <tr>
                                <th>{{$item->order}}</th>
                                <th>{{$item->formTemplate->title}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->label}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    @php
                                        $options = $item->options ? json_decode($item->options) : [];
                                    @endphp
                                    @foreach ($options as $key=>$option)
                                    {{ $option }} @if ($key < count($options) - 1),@endif
                                    @endforeach
                                </td>

                                <td class="px-1 py-1 d-flex">
                                    <a class="btn btn-info"
                                        href="{{ route('fields.edit', $item->id) }}">
                                        Edit
                                    </a>&nbsp;&nbsp;
                                    <form action="{{ route('fields.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($fields->count() <= 0)
                        <tr>
                            <td colspan="7" class="text-center m-5 p-5">No Data Found!</td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>

        </div>
    </div>
</div>

@endsection



