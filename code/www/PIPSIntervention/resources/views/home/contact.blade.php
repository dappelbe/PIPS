@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>This is the personalised portal for {{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <p class="h4">
                                The contact details for the central {{ $studyName }} trial team are
                            </p>
                        </div>
                    </div>
                    <div class="row flex-grow-1">
                        <div class="col-4 mb-3">
                            <div class="card h-100" style="background: #1c7430">
                                <div class="card-body align-middle">
                                    <div class="row">
                                        <div class="col-3">
                                            <em class="fa-solid fa-envelope-open-text fa-3x"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="text-decoration-none" style="color: #F7E5A1">
                                                E-Mail:
                                            </h4>
                                            <a href="mailto:{{ $email }}" class="text-decoration-none" style="color: #F7E5A1">{{$email}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="card h-100" style="background: #28a745">
                                <div class="card-body align-middle">
                                    <div class="row">
                                        <div class="col-3">
                                            <em class="fa-light fa-phone fa-3x"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="text-decoration-none" style="color: #F7E5A1">
                                                Phone:
                                            </h4>
                                            {{$phone}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="card h-100" >
                                <div class="card-body align-middle">
                                    <div class="row">
                                        <div class="col-3">
                                            <em class="fa-light fa-envelope fa-3x"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="text-decoration-none" style="color: #4f805d">
                                                Address:
                                            </h4>
                                            {!! $address !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('home')}}">
                                <button class="btn button-primary">
                                    <em class="fa-solid fa-arrow-left"></em> Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        &#160;
    </div>
</div>
@endsection
