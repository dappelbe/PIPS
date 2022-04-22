@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-white text-center">
                        <div class="row">
                            <div class="col-12 text-center align-self-center">
                                <h1>Consent forms</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-12">
                                The URL to give to participants is {{ url('/consent/PIPS') }}
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="col-12">
                                <table id="listtable" class="table table-striped col-12">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Last Updated</th>
                                            <th>Date of Consent</th>
                                            <th>Name</th>
                                            <th>PIS</th>
                                            <th>Voluntary</th>
                                            <th>Data</th>
                                            <th>Agree</th>
                                            <th>Consent Taken By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $row)
                                            <tr>
                                                <td>
                                                    @if( $row->takenby == '')
                                                        <a class="btn btn-primary" href="{{ route('consentforms.pips.edit',$row->id) }}">Edit</a>
                                                        {!! Form::open(['method' => 'DELETE','route' => ['consentforms.destroy', $row->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @else
                                                    @endif
                                                </td>
                                                <td>{{$row->updated_at}}</td>
                                                <td>{{$row->created_at}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    @if( $row->pis == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $row->voluntary == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif</td>
                                                <td>
                                                    @if( $row->data == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $row->agree == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{$row->takenby}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#listtable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            fixedHeader: true,
            'info': true,
            'autoWidth': false,
            'dom': 'Bfrtip',
        });
    </script>


@endsection

