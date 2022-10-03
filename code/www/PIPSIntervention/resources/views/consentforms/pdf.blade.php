@extends('layouts.pdf')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-white text-center">
                        <div class="row">
                            <div class="col-2 text-left">
                                <img class="img-fluid" src="{{asset('images/UoOLogo_sm.png')}}" alt="University of Oxford Logo" data-cy="logo-oxford"/>
                            </div>
                            <div class="col-8 text-center align-self-center">
                                <h3>PARTICIPANT CONSENT FORM</h3>
                            </div>
                            <div class="col-2 text-right">
                                <img class="img-fluid" src="{{asset('images/pips-logo.png')}}" alt="PIPS Logo" data-cy="logo-pips"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 align-self-center text-center">
                                <strong>
                                    Is a participant information portal (a mini website) helpful to participants that have agreed to take part in a clinical study or trial?
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        @if(session('status'))
                            <div class="row">
                                <div class="col-12">
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q1">
                                        1.   I confirm that I have read the information sheet dated 15Dec2021 (version 0.1)
                                        for this study. I have had the opportunity to consider the information,
                                        ask questions and have had these answered satisfactorily.
                                    </label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            @if ( $row['pis'] == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q2">2.   I understand that my participation is voluntary and that I am free to withdraw at any time without giving any reason, without my medical care or legal rights being affected.</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            @if ( $row['voluntary'] == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q3">
                                        3.   I understand that data collected during the study may be looked at by
                                        individuals from University of Oxford where it is relevant to my taking part in
                                        this research. I give permission for these individuals to have access to my records.
                                    </label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            @if ( $row['data'] == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q4">4.   I agree to take part in the PIPS study.</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            @if ( $row['agree'] == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <hr/>
                                    <label for="name" class="col-sm-2 col-form-label text-right"  data-cy="participant-name-label">Name of participant</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="name" id="name"  data-cy="participant-name" value="{{$row['name']}}" readonly>
                                    </div>
                                    <label for="consentdate" class="col-sm-2 col-form-label" data-cy="consentdate-label">Date</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" name="consentdate" id="consentdate"
                                               value="{{$row['consentdate']}}"  data-cy="consentdate" readonly>
                                    </div>
                                </div>
                            <div class="form-group row ">
                                &#160;
                            </div>
                            <div class="form-group row ">
                                &#160;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

