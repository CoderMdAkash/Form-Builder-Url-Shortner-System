@extends('urlshortenersystem::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-7 col-xl-7">
            <div class="card">
                <div class="card-body p-5">
                  <h4 class="card-title">Edit Url</h4>
                  
                    <form action="{{route('urls.update', $url->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="name">Title</label>
                            <input type="text" name="title" id="name" class="form-control" placeholder=" " value="{{ $url->title }}"  />
                            @error('title')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                            @enderror
                        </div>
        
                        <div class="form-group mt-2">
                            <label for="url">Orginal Url</label>
                            <input type="text" name="original_url" id="name" class="form-control" placeholder=" " value="{{ $url->original_url }}"  />
                            @error('original_url')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                            @enderror
                        </div>
        
        
                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
