@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-7 col-xl-7">

            <div class="card">
                <div class="card-body p-5">
                  <h4 class="card-title">Add New Form Template</h4>
                  
                  <form action="{{route('form-templates.store')}}" method="POST" >
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Title</label>
                        <input type="text" name="title" id="name" class="form-control" placeholder=" " value="{{ old('title') }}"  />
                        @error('title')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="form-control">
                          <option>Choose a category</option>
                          @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>
    
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea id="description"  name="description" rows="4" class="form-control" placeholder="Leave a comment..."  >{{ old('description') }}</textarea>
                        @error('description')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>
    
    
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                </form>

                </div>
              </div>

        </div>
    </div>
</div>

@endsection
