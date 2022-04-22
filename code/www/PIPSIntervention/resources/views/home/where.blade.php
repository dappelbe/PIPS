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
                        <div class="alert alert-secondary">
                            <div class="row">
                                <div class="col-12">
                                    <strong>Table Key</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <span class="badge badge-success" style="background-color: green;">Form name</span> : Form completed
                                </div>
                                <div class="col-3">
                                    <span class="badge badge-danger" style="background-color: red;">Form name</span> : Form NOT completed
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <table id="logData" class="table table-striped w-auto table-responsive">
                                <thead>
                                    <tr>
                                        <th>Visit</th>
                                        <th>Forms</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Baseline</td>
                                    <td>
                                        <span class="badge badge-success" style="background-color: green;">screening_log</span>&#160; <span class="badge badge-success" style="background-color: green;">contact_details</span>&#160; <span class="badge badge-success" style="background-color: green;">contact_details_check</span>&#160; <span class="badge badge-success" style="background-color: green;">consent_form</span>&#160; <span class="badge badge-success" style="background-color: green;">baseline_injury_details</span>&#160; <span class="badge badge-success" style="background-color: green;">promis_parent_proxy_bank_v20_upper_extremity</span>&#160; <span class="badge badge-success" style="background-color: green;">wongbaker_pain_rating_scale</span>&#160; <span class="badge badge-success" style="background-color: green;">eq5dy_proxy</span>&#160; <span class="badge badge-success" style="background-color: green;">randomisation_form</span>&#160; <span class="badge badge-success" style="background-color: green;">randomisation_result</span>&#160;
                                    </td>
                                    <td>
                                        These forms were completed when you were recruited into the study
                                    </td>
                                </tr>
                                <tr>
                                    <td>6 Weeks</td>
                                    <td>
                                        <span class="badge badge-success" style="background-color: green;">followup_check</span>&#160; <span class="badge badge-success" style="background-color: green;">promis_parent_proxy_bank_v20_upper_extremity</span>&#160; <span class="badge badge-success" style="background-color: green;">wongbaker_pain_rating_scale</span>&#160; <span class="badge badge-success" style="background-color: green;">eq5dy_proxy</span>&#160; <span class="badge badge-success" style="background-color: green;">vas_cosmesis</span>&#160; <span class="badge badge-success" style="background-color: green;">school_attendance</span>&#160; <span class="badge badge-success" style="background-color: green;">resource_use</span>&#160; </td>
                                    <td>
                                        Completed Online
                                    </td>
                                </tr>
                                <tr>
                                    <td>8 Weeks</td>
                                    <td><span class="badge badge-success" style="background-color: green;">week_followup</span>&#160; </td>
                                    <td>
                                        This was completed by the research team at your hospital
                                    </td>
                                </tr>
                                <tr>
                                    <td>3 Months</td>
                                    <td><span class="badge badge-danger" style="background-color: red;">followup_check</span>&#160; <span class="badge badge-danger" style="background-color: red;">proxy</span>&#160; <span class="badge badge-danger" style="background-color: red;">promis_parent_proxy_bank_v20_upper_extremity</span>&#160; <span class="badge badge-danger" style="background-color: red;">wongbaker_pain_rating_scale</span>&#160; <span class="badge badge-danger" style="background-color: red;">eq5dy_proxy</span>&#160; <span class="badge badge-danger" style="background-color: red;">vas_cosmesis</span>&#160; <span class="badge badge-danger" style="background-color: red;">additional_care</span>&#160; <span class="badge badge-danger" style="background-color: red;">school_attendance</span>&#160; <span class="badge badge-danger" style="background-color: red;">resource_use</span>&#160; </td>
                                    <td>
                                        Completed online (looks as though you had a problem)
                                        <br/>
                                        You still have time to complete them - <a href="{{route('contact')}}">contact the {{$studyName}} team</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6 Months</td>
                                    <td>

                                    </td>
                                    <td>
                                        You will get a reminder about these in two months
                                    </td>
                                </tr>
                                <tr>
                                    <td>12 Months</td>
                                    <td>

                                    </td>
                                    <td>
                                        Don't worry, not yet due
                                    </td>
                                </tr>
                                <tr>
                                    <td>2 Year</td>
                                    <td>

                                    </td>
                                    <td>
                                        Don't worry, not yet due
                                    </td>
                                </tr>
                                <tr>
                                    <td>3 Year</td>
                                    <td>

                                    </td>
                                    <td>
                                        Don't worry, not yet due
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
