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
                            <h4>The progress of the {{$studyName}} study</h4>
                        </div>
                    </div>
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <p class="h4">
                                The {{ $studyName }} trial needs to recruit {{ $expected }} participants, you were the {!! $recruitNumber !!} participant.
                            </p>
                            <iframe loading="lazy" src="{{ $recruitlink }}" width="100%" height="500px" ></iframe>
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
