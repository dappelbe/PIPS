@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>This is the personalised portal for {{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <table id="mytable" class="table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>When</th>
                                        <th>What</th>
                                        <th>Details</th>
                                        <th>Has this happened/been completed?</th>
                                    </tr>
                                </thead>
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
