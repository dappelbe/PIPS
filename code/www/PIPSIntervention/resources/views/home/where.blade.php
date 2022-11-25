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
                            <h4 data-cy="where-am-i-hdr">Where am I in my study journey?</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-secondary">
                            <div class="row">
                                <div class="col-12">
                                    <strong data-cy="table-key">Table Key</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3" data-cy="success-badge">
                                    <span data-cy="success-element" class="badge badge-success" style="background-color: green;">Form name</span> : Form completed
                                </div>
                                <div class="col-3" data-cy="error-badge">
                                    <span data-cy="error-element" class="badge badge-danger" style="background-color: red;">Form name</span> : Form NOT completed
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <table id="logData" class="table table-striped w-auto table-responsive">
                                <thead data-cy="logData-table">
                                    <tr>
                                        <th>Visit</th>
                                        <th>Forms</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $mappingData as $row )
                                        <tr>
                                            <td>{{$row['display_name']}}</td>
                                            <td>{!! $row['formstatus']!!}</td>
                                            <td>{{$row['comments']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('home')}}" data-cy="home-btn">
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
