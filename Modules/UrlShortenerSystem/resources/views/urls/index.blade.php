@extends('urlshortenersystem::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Url List</h4>

                    <div class="d-flex justify-content-end">
                        <div>
                          <a href="{{route('urls.create')}}" class="btn btn-success">+ Add New</a>
                        </div>
                    </div>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Title</th>
                            <th>Orginal Url</th>
                            <th>Shortener Url</th>
                            <th>Click</th>
                            <th>Visitors</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($urls as $item)
                            <tr>
                                <th>{{ $item->title }}</th>
                                <td>{{ $item->original_url }}</td>
                                <td>
                                    <a href="{{ route('shortener-url', $item->shortened_url??'-') }}" target="_blank">{{ $item->shortened_url??'-' }}</a>
                                </td>
                                <td>{{ $item->click_count }}</td>
                                <th>
                                    <a href="{{ route('urls.show', $item->id) }}" target="_blank">Visitors</a>
                                </th>

                                <td class="px-1 py-1 d-flex">
                                    <a class="btn btn-info"
                                        href="{{ route('urls.edit', $item->id) }}">
                                        Edit
                                    </a>&nbsp;&nbsp;
                                    <form action="{{ route('urls.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($urls->count() <= 0)
                        <tr>
                            <td colspan="4" class="text-center m-5 p-5">No Data Found!</td>
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

