@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>@if( $readonly == '' ) Edit @else View @endif Study :: {{ $data->studyname }}</h2>
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
                        @if( $readonly == 'readonly' )
                        {!! Form::open(array('route' => 'study.store',
                                             'method'=>'POST',
                                             'enctype' => 'multipart/form-data')) !!}
                        @endif
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Name:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('studyname', $data->studyname, array('class' => 'form-control')) !!}
                                    @else
                                    {{$data->studyname}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Email:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::email('studyemail', $data->studyemail,
                                        array('class' => 'form-control')) !!}
                                    @else
                                        {{$data->studyemail}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Phone number:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('studyphone', $data->studyphone,
                                        array('class' => 'form-control')) !!}
                                    @else
                                        {{$data->studyphone}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Address:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::textarea('studyaddress', $data->studyaddress,
                                            array('class' => 'form-control')) !!}
                                    @else
                                        {{$data->studyaddress}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Logo:
                                        <img src="{{asset('images/' . $data->studylogo)}}"
                                             class="img-fluid"
                                             width="100px"
                                             alt="{{ $data->studyname }} Logo"/></strong>
                                    @if( $readonly == '' )
                                    {!! Form::file('studylogo', array('class' => 'form-control')) !!}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study PIS:</strong>
                                    @if( $readonly == '' )
                                        {!!$data->getPISFilesAsHTMLList('pis') !!}
                                    {!! Form::file('uploadedpis[]', array('class' => 'form-control')) !!}
                                    @else
                                        {!!$data->getPISFilesAsHTMLList('pis') !!}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study Accrual URL:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('studyaccruallink', $data->studyaccruallink,
                                        array('class' => 'form-control')) !!}
                                    @else
                                        {{$data->studyaccruallink}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Total Expected Study Accrual:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('expectedrecruits', $data->expectedrecruits,
                                        array('placeholder' => '1024','class' => 'form-control')) !!}
                                    @else
                                        {{$data->expectedrecruits}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>API URL:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('apiurl', $data->apiurl,
                                        array('class' => 'form-control')) !!}
                                    @else
                                        {{$data->apiurl}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>API Key:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('apikey', $data->apikey,
                                        array('placeholder' => 'API Key','class' => 'form-control')) !!}
                                    @else
                                        {{$data->apikey}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Randomisation report ID:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('studyrandomisationreportid', $data->studyrandomisationreportid,
                                            array('placeholder' => 'Report ID','class' => 'form-control')) !!}
                                    @else
                                        {{$data->studyrandomisationreportid}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Variable holding Randomisation Number:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('randonumfield', $data->randonumfield,
                                        array('placeholder' => 'Randomisation Number field in report',
                                        'class' => 'form-control')) !!}
                                    @else
                                        {{$data->randonumfield}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Variable holding Randomised Allocation:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('allocationfield', $data->allocationfield,
                                            array('placeholder' => 'Randomisation Allocation field in report',
                                            'class' => 'form-control')) !!}
                                    @else
                                        {{$data->allocationfield}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Variable holding Site name:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('sitenamefield',
                                            $data->sitenamefield,
                                            array('placeholder' => 'Randomisation Allocation field in report',
                                            'class' => 'form-control')) !!}
                                    @else
                                        {{$data->sitenamefield}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>
                                        Variable holding randomisation date, or the base date from which all visits
                                        are calculated:
                                    </strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('randodatefield', $data->randodatefield,
                                            array('placeholder' => 'Randomisation date field in report',
                                            'class' => 'form-control')) !!}
                                    @else
                                        {{$data->randodatefield}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Study status report ID:</strong>
                                    @if( $readonly == '' )
                                    {!! Form::text('studystatusreportid',
                                                $data->studystatusreportid,
                                                array('placeholder' => 'Report ID','class' => 'form-control')) !!}
                                    @else
                                        {{$data->studystatusreportid}}
                                    @endif
                                </div>
                            </div>
                            @if( $readonly != 'readonly' )
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &#160;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            @endif
                        </div>
                        @if( $readonly != 'readonly' )
                        {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
