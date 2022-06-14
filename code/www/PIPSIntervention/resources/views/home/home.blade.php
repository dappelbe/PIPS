@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h3 class="text-center">WELCOME</h3>
                <div class="row">
                    <div class="col-12">
                        <p>Hello {{ Auth::user()->name }} thank you for agreeing to log into and hopefully find this mini website (portal) useful.</p>
                        <p>The last time that you logged in was: <strong>{{$lastLogin}}</strong></p>
                        <p>If you wish to send a message to the Central {{ $studyName }} study team – please click <a href="mailto:{{ $studyEmail }}">here</a></p>
                        <p>If you wish to send a message or give any feedback to the PIPS team <a href="mailto:pips@ndorms.ox.ac.uk?subject=Feedback About the PIPs Site">here</a></p>
                        <p>Click on the X in the top right-hand corner to clear this message</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>This is the personalised portal for {{ Auth::user()->name }} in the {{$studyName}} study</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <!-- Trial Number-->
                        <div class="col-3 mb-3">
                            <div class="card bg-dark h-100">
                                <div class="card-body align-middle">
                                    <em class="fa-solid fa-hashtag fa-2x text-white"></em>
                                    &#160;
                                    <span class="h3" style="color: yellow;">{{ $randoNum }}</span>
                                    <br/>
                                    <br/>
                                    <h5 class="" style="color: #F7E5A1">Your {{ $studyName }} trial number</h5>
                                </div>
                            </div>
                        </div>
                        <!-- Recruiting Center-->
                        <div class="col-3 mb-3">
                            <div class="card h-100" style="background: darkolivegreen">
                                <div class="card-body align-middle">
                                    <div class="row">
                                        <div class="col-3">
                                            <em class="fa-solid fa-arrows-to-circle fa-2x text-white"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="" style="color: #F7E5A1">You were recruited at the {{$siteName}}.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Allocation-->
                        <div class="col-3 mb-3">
                            <div class="card h-100" style="background: #3d4852">
                                <div class="card-body align-middle">
                                    <div class="row">
                                        <div class="col-3">
                                            <em class="fa-solid fa-syringe fa-2x text-white"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="" style="color: #F7E5A1">You were allocated to the {{$allocation}} arm.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Number-->
                        <div class="col-3 mb-3">
                            <div class="card h-100" style="background: #523e02">
                                <div class="card-body align-middle">
                                    <div class="row">
                                        <div class="col-3">
                                            <em class="fa-solid fa-people-group text-white fa-3x"></em>
                                        </div>
                                        <div class="col-9">
                                            <h4 class="" style="color: #F7E5A1">
                                                You are the {!! $recruitNumber !!}
                                                participant who has agreed to take part in the {{$studyName}} trial.
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        &#160;
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>What would you like to know more about?</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('where')}}">
                                <button type="button" class="btn btn-primary mb-2 h-100"><span style="font-size: 1.35rem">Where am I in my study journey?</span></button>
                            </a>
                        </div>
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('progress')}}">
                                <button type="button" class="btn btn-secondary mb-2 h-100"><span style="font-size: 1.35rem">The progress of the {{ $studyName }} study</span></button>
                            </a>
                        </div>
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('due')}}">
                                <button type="button" class="btn btn-success mb-2 h-100"><span style="font-size: 1.35rem">What is due for me next?</span></button>
                            </a>
                        </div>
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('contact')}}">
                                <button type="button" class="btn btn-info mb-2 h-100"><span style="font-size: 1.35rem">How do I contact the {{ $studyName }} study team?</span></button>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Download</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-6 mb-3">
                            <div class="card bg-dark h-100 text-white">
                                <div class="card-header">
                                    PIPS
                                </div>
                                <div class="card-body align-middle">
                                    <ul>
                                        <!--<li>
                                            <a href="" class="text-decoration-none">Consent form</a>
                                        </li>-->
                                        <li>
                                            <a href="https://pips.octru.ox.ac.uk/patients.html" class="text-decoration-none" target="_blank">Patient Information Sheet</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card h-100 text-black bg-light">
                                <div class="card-header">
                                    {{ $studyName }}
                                </div>
                                <div class="card-body align-middle">
                                    <ul>
                                        <!--<li>
                                            <a href="" class="text-decoration-none">Consent form</a>
                                        </li>-->
                                        <li>
                                            <a href="https://crafft-info.digitrial.com/" class="text-decoration-none" target="_blank">Patient Information Sheet</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
