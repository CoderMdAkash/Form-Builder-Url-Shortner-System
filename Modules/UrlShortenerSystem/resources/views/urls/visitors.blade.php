@extends('urlshortenersystem::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $url->title }}</h4>

                    <div class="d-flex justify-content-end">
                        
                    </div>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Visitor IP</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($url->visitors as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center">{{ $item->ip }}</td>
                            </tr>
                        @endforeach
                        @if ($url->visitors->count() <= 0)
                        <tr>
                            <td colspan="2" class="text-center m-5 p-5">No Data Found!</td>
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

