@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert" data-cy="welcome-alert">
                <h3 class="text-center" data-cy="welcome-hdr">WELCOME</h3>
                <div class="row">
                    <div class="col-12">
                        <p data-cy="w-p1">Hello {{ Auth::user()->name }} thank you for agreeing to log into and hopefully find this mini website (portal) useful.</p>
                        <p data-cy="w-p2">The last time that you logged in was: <strong>{{$vm->lastLogin}}</strong></p>
                        <p data-cy="w-p3">If you wish to send a message to the Central {{ $vm->studyName }} study team – please click <a href="mailto:{{ $vm->studyEmail }}">here</a></p>
                        <p data-cy="w-p4">If you wish to send a message or give any feedback to the PIPS team <a href="mailto:pips@ndorms.ox.ac.uk?subject=Feedback About the PIPs Site">here</a></p>
                        <p data-cy="w-p5">Click on the X in the top right-hand corner to clear this message</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="col-12">
            <div class="card" data-cy="c1">
                <div class="card-header">
                    <h3 data-cy="c1-hdr">This is the personalised portal for {{ Auth::user()->name }} in the {{$vm->studyName}} study</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <!-- Trial Number-->
                        <div class="col-3 mb-3">
                            <div class="card bg-dark h-100">
                                <div class="card-body align-middle">
                                    <em class="fa-solid fa-hashtag fa-2x text-white"></em>
                                    &#160;
                                    <span class="h3" style="color: yellow;" data-cy="c1-b1">{{ $vm->randoNum }}</span>
                                    <br/>
                                    <br/>
                                    <h5 class="" style="color: #F7E5A1" data-cy="c1-b1-h3">Your {{ $vm->studyName }} trial number</h5>
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
                                            <h4 class="" style="color: #F7E5A1" data-cy="c1-b2-hdr">You were recruited at the {{$vm->siteName}}.</h4>
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
                                            <h4 class="" style="color: #F7E5A1" data-cy="c1-b3-hdr">You were allocated to the {{$vm->allocation}} arm.</h4>
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
                                            <h4 class="" style="color: #F7E5A1" data-cy="c1-b4-hdr">
                                                You are the {!! $vm->recruitNumber !!} participant who has agreed to take part in the {{$vm->studyName}} trial.
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
            <div class="card" data-cy="c2">
                <div class="card-header">
                    <h3>What would you like to know more about?</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('where')}}">
                                <button type="button" class="btn btn-primary mb-2 h-100" data-cy="where">
                                    <span style="font-size: 1.35rem" data-cy="c2-btn1">Where am I in my study journey?</span></button>
                            </a>
                        </div>
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('progress')}}">
                                <button type="button" class="btn btn-secondary mb-2 h-100" data-cy="progress">
                                    <span style="font-size: 1.35rem" data-cy="c2-btn2">The progress of the {{ $vm->studyName }} study</span></button>
                            </a>
                        </div>
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('due')}}">
                                <button type="button" class="btn btn-success mb-2 h-100"  data-cy="due">
                                    <span style="font-size: 1.35rem" data-cy="c2-btn3">What is due for me next?</span></button>
                            </a>
                        </div>
                        <div class="col-3 mb-3 h-100">
                            <a href="{{route('contact')}}">
                                <button type="button" class="btn btn-info mb-2 h-100"  data-cy="contact">
                                    <span style="font-size: 1.35rem" data-cy="c2-btn4">How do I contact the {{ $vm->studyName }} study team?</span></button>
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
            <div class="card" data-cy="c3">
                <div class="card-header">
                    <h3 data-cy="c3-hdr">Download</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-6 mb-3">
                            <div class="card bg-dark h-100 text-white">
                                <div class="card-header" data-cy="c3-pips-hdr">
                                    PIPS
                                </div>
                                <div class="card-body align-middle">
                                    <ul>
                                        <li>
                                            <a href="https://pips.octru.ox.ac.uk/patients.html" class="text-decoration-none" target="_blank">Patient Information Sheet</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card h-100 text-black bg-light">
                                <div class="card-header" data-cy="c3-study-hdr">
                                    {{ $vm->studyName }}
                                </div>
                                <div class="card-body align-middle">
                                    <ul>
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
