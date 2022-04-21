@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Create New Study</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('study.index') }}"> Back </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>Something went wrong.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                        {!! Form::open(array('route' => 'study.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Name:</strong>
                                    {!! Form::text('studyname', null, array('placeholder' => 'Study Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Email:</strong>
                                    {!! Form::email('studyemail', null, array('placeholder' => 'Study Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Phone number:</strong>
                                    {!! Form::text('studyphone', null, array('placeholder' => 'Study Phone number','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Logo:</strong>
                                    {!! Form::file('studylogo', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study PIS:</strong>
                                    {!! Form::file('uploadedpis', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>API URL:</strong>
                                    {!! Form::text('apiurl', null, array('placeholder' => 'https://redcap.octru.ox.ac.uk/api','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>API Key:</strong>
                                    {!! Form::text('apikey', null, array('placeholder' => 'API Key','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Randomisation report ID:</strong>
                                    {!! Form::text('studyrandomisationreportid', null, array('placeholder' => 'Report ID','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Variable holding Randomisation Number:</strong>
                                    {!! Form::text('randonumfield', null, array('placeholder' => 'Randomisation Number field in report','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Variable holding Randomised Allocation:</strong>
                                    {!! Form::text('allocationfield', null, array('placeholder' => 'Randomisation Allocation field in report','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study status report ID:</strong>
                                    {!! Form::text('studystatusreportid', null, array('placeholder' => 'Report ID','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &#160;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
