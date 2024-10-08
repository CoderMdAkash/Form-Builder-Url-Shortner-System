@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Organization</h4>
                    <div class="d-flex justify-content-end">
                        <div>
                          <a href="{{route('organization.create')}}" class="btn btn-success">+ Add New</a>
                        </div>
                    </div>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Organization name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($organization as $item)
                            <tr>
                                <th>{{$item->name}}</th>
                                <td>{{$item->description}}</td>

                                <td class="px-1 py-1 d-flex">
                                    <a class="btn btn-info"
                                        href="{{ route('organization.edit', $item->id) }}">
                                        Edit
                                    </a>&nbsp;&nbsp;
                                    <form action="{{ route('organization.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($organization->count() <= 0)
                        <tr>
                            <td colspan="3" class="text-center m-5 p-5">No Data Found!</td>
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
