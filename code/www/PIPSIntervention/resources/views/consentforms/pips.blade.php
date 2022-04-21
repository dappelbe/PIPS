@extends('layouts.app')

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
                            <form id="consent_form" data-cy="consent-form" action="{{route('consentforms.pips.store')}}" method="post" class="needs-validation" novalidate>
                                {{ csrf_field() }}
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q1">
                                        1.   I confirm that I have read the information sheet dated 15Dec2021 (version 0.1)
                                        for this study. I have had the opportunity to consider the information,
                                        ask questions and have had these answered satisfactorily.
                                    </label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pis" id="pis" value="1" data-cy="pis-yes"  required/>
                                            <label class="form-check-label" for="pis_yes" data-cy="pis-yes-label">yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pis" id="pis" value="0"  data-cy="pis-no"  required/>
                                            <label class="form-check-label" for="pis_no"  data-cy="pis-no-label">no</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q2">2.   I understand that my participation is voluntary and that I am free to withdraw at any time without giving any reason, without my medical care or legal rights being affected.</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="voluntary" id="voluntary_yes" value="1" data-cy="voluntary-yes"  required/>
                                            <label class="form-check-label" for="voluntary_yes" data-cy="voluntary-yes-label">yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="voluntary" id="voluntary_no" value="0"  data-cy="voluntary-no"  required/>
                                            <label class="form-check-label" for="voluntary_no"  data-cy="voluntary-no-label">no</label>
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
                                            <input class="form-check-input" type="radio" name="data"
                                                   id="data_yes" value="1" data-cy="data-yes" required />
                                            <label class="form-check-label"
                                                   for="data_yes"
                                                   data-cy="data-yes-label">yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="data" id="data_no" value="0"  data-cy="data-no" required>
                                            <label class="form-check-label" for="data_no" data-cy="data-no-label">no</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-9 col-form-label" data-cy="q4">4.   I agree to take part in the PIPS study.</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agree" id="agree_yes" value="1"  data-cy="agree-yes" required>
                                            <label class="form-check-label" for="agree_yes" data-cy="agree-yes-label">yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agree" id="agree_no" value="0" data-cy="agree-no" required>
                                            <label class="form-check-label" for="agree_no" data-cy="agree-no-label">no</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <hr/>
                                    <label for="name" class="col-sm-2 col-form-label text-right"  data-cy="participant-name-label">Name of participant</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required data-cy="participant-name">
                                    </div>
                                    <label for="consentdate" class="col-sm-2 col-form-label" data-cy="consentdate-label">Date</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" name="consentdate" id="consentdate" placeholder="placeholder" required data-cy="consentdate">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    &#160;
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12">
                                        <div class="alert alert-primary text-center">
                                            <div class="h5">Submitting this form is the same as signing a consent form</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12">
                                        <input type="submit" class="form-control bg-success text-bold text-white"
                                               name="submit"
                                               id="submit"
                                               data-cy="submit"
                                               value="Submit consent form for review" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>


@endsection

