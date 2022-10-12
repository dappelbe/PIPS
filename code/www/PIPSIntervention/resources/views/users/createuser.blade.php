@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Create New Participant</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back </a>
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
                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!!
                                        Form::text('name', $myConsentForm->name, array('placeholder' => $myConsentForm->name,
                                                    'class' => 'form-control',))
                                    !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            {!! Form::hidden('password', $myConsentForm->record_id . $myConsentForm->record_id) !!}
                            {!! Form::hidden('confirm-password', $myConsentForm->record_id . $myConsentForm->record_id) !!}
                            {!! Form::hidden('roles[]', 'User') !!}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Randomisation Number:</strong>
                                    {!! Form::text('randomisation_number', $myConsentForm->record_id, array('placeholder' => 'Randomisation Number','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study ID</strong>
                                    {!! Form::text('studyid', $myConsentForm->study_id, array('placeholder' => 'studyid','class' => 'form-control')) !!}
                                </div>
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
