@extends('layouts.master')

@section('main')

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Form Builder & Shortner Url System Management</h1><br>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('form_builder.dashboard') }}">Form Builder</a>
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('url_shortner.dashboard') }}">Url Shortner</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        
@endsection
