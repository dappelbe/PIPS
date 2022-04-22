@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>This is the personalised portal for {{ Auth::user()->name }} in the {{$studyName}} study</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="alert alert-success">
                            <h4>What is due next?</h4>
                        </div>
                    </div>
                    <div class="row flex-grow-1">
                        <div class="col-4">
                            <div class="alert alert-primary h-100 mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-solid fa-calendar-days fa-3x"></i>
                                    </div>
                                    <div class="col-8">
                                        <h5>Your next visit is the <strong>6 Month Visit</strong></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="alert alert-info h-100 mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-solid fa-clock fa-3x"></i>
                                    </div>
                                    <div class="col-8">
                                        <h5>We will send you a reminder in <strong>Two Months</strong></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="alert alert-secondary h-100 mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-solid fa-thumbs-up fa-3x"></i>
                                    </div>
                                    <div class="col-8">
                                        <h5>By supporting this study you are helping to make future patients better</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        &#160;
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
