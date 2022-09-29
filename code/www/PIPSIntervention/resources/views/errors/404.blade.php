@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="text-center align-content-center">
                    <img src="{{ asset('images/404.png') }}"
                         alt="Sorry page not found"
                         class="img-fluid"/>
                    <h1 class="">Sorry we could not find the page that you requested</h1>
                    <h2>Please click on the back button to return to the home page</h2>
                    <div>
                        <a href="{{route('home')}}"><button class="button btn-block btn-lg">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
