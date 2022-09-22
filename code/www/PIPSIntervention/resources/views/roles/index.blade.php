@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card" data-cy="roles-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2 data-cy="roles-title">Role Management</h2>
                            </div>
                            <div class="pull-right">
                                @can('role-create')
                                    <a class="btn btn-success" href="{{ route('roles.create') }}" data-cy="roles-create-btn"> Create New Role </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row flex-grow-1">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" data-cy="roles-alert">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered"
                                   id="listtable"
                                   data-cy="roles-list">
                                <caption>List of roles in the system.</caption>
                                <thead>
                                    <tr>
                                        <th data-cy="roles-col-1">No</th>
                                        <th data-cy="roles-col-2">Name</th>
                                        <th data-cy="roles-col-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                    <tr>
                                        <td data-cy="roles-role-{{$i+1}}-1">{{ ++$i }}</td>
                                        <td data-cy="roles-role-{{$i}}-2">{{ $role->name }}</td>
                                        <td data-cy="roles-role-{{$i}}-3">
                                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}" data-cy="roles-{{$i}}-show">Show</a>
                                            @can('role-edit')
                                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" data-cy="roles-{{$i}}-edit">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $roles->render() !!}
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
            'autoWidth': true,
        });
    </script>
@endsection
