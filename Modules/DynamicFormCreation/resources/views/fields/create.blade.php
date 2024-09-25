@extends('dynamicformcreation::layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 d-flex justify-content-center">
        <div class="col-sm-7 col-xl-7">

            <div class="card">
                <div class="card-body p-5">
                  <h4 class="card-title">Add New Field</h4>
                  
                  <form action="{{route('fields.store')}}" method="POST" >
                    @csrf
                    <div class="form-group mt-2">
                        <label for="form_template_id">Form template</label>
                        <select id="form_template_id" name="form_template_id" class="form-select">
                          <option value="">Choose a Form template</option>
                          @foreach ($formTemplate as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                          @endforeach
                        </select>
                        @error('form_template_id')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder=" " value="{{ old('name') }}"  />
                        @error('name')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>
        
        
                    <div class="form-group mt-2">
                        <label for="label">label</label>
                        <input type="text" name="label" id="label" class="form-control" placeholder=" " value="{{ old('label') }}"  />
                        @error('label')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>
        
        
                    <div class="form-group mt-2">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control">
                          <option selected value="" >Choose a type</option>
                          @foreach ($SELECT_OPTION as $key=>$item)
                          <option value="{{$key}}">{{$item}}</option>
                          @endforeach
                        </select>
                        @error('type')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>
        
        
                    <div class="form-group mt-2 dropdown_field">
                        <label for="options">Options</label>
                        <select id="options" name="options[]"  multiple="multiple" class="tags form-select"></select>
                        @error('options')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                        @enderror
                    </div>
        
        
                    <div class="form-group mt-2">
                        <label for="order" class="">Order Id</label>
                        <input type="number" name="order" id="order" class="form-control" placeholder=" " value="{{ old('order') }}"  />
                        @error('order')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script>
    $(document).ready(function(){
        $(".tags").select2({tags: true});
        $('#type').on('change', function(e) {
            let val = $(this).val();
            if (val=='select') {
                $('.dropdown_field').removeClass('hidden');
            }else{
                $('.dropdown_field').addClass('hidden');
            }
        })
        $('.dropdown_field').addClass('hidden');
    })

</script>

<style>
    .hidden{
        display: none
    }
</style>
