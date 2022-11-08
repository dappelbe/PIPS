@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 data-cy="main_hdr">This is the personalised portal for {{ Auth::user()->name }} in the {{$studyName}} study</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="alert alert-success">
                            <h4 data-cy="central-study-team">The contact details for the central {{ $studyName }} trial team are</h4>
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
                                            <h4 class="text-decoration-none" style="color: #F7E5A1" data-cy="email-label">
                                                E-Mail:
                                            </h4>
                                            <a href="mailto:{{ $email }}" class="text-decoration-none" style="color: #F7E5A1" data-cy="email-address">{{$email}}</a>
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
                                            <em class="fa-solid fa-phone fa-3x"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="text-decoration-none" style="color: #F7E5A1" data-cy="phone-label">
                                                Phone:
                                            </h4>
                                            <span data-cy="phone-number">{{$phone}}</span>
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
                                            <em class="fa-regular fa-envelope fa-3x"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="text-decoration-none" style="color: #4f805d" data-cy="address-label">
                                                Address:
                                            </h4>
                                            <span data-cy="address-text">{!! $address !!}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('home')}}" data-cy="home-btn">
                                <button class="btn button-primary">
                                    <em class="fa-solid fa-arrow-left"></em> <span data-cy="back-button">Back</span>
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
