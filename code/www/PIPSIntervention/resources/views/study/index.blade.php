@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ">
                        <h2>Study Management</h2>
                    </div>
                    <div class="row text-right">
                        <div class="col-10">&#160;</div>
                        <div class="col-2">
                            <a class="btn btn-success" href="{{ route('study.create') }}"> Create New Study </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped" id="listtable">
                            <caption>List of studies associated with the system.</caption>
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Study</th>
                                <th>Study Email</th>
                                <th>Logo</th>
                                <th>PIS</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $study)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $study->studyname }}</td>
                                    <td>{{ $study->studyemail }}</td>
                                    <td><img src="images/{{ $study->studylogo }}" class="img-fluid"
                                             width="100px" alt="{{ $study->studyname }} Logo"/></td>
                                    <td>{!!$study->getPISFilesAsHTMLList('pis') !!}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('study.show',$study->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('study.edit',$study->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE',
                                            'route' => ['study.destroy', $study->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $data->render() !!}
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
            'autoWidth': true,
        });
    </script>

@endsection
