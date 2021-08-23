@extends('adminlte::page')

@section('title', 'Role List')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/roles">Roles</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <div class="float-sm-left mb-2">
            @can('create-role')
                <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
        @if (session('message'))
            <x-adminlte-alert dismissable class="float-right" theme="info" title="{{ session('message') }}">
            </x-adminlte-alert>
        @endif
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permissions)
                            <span class="badge badge-primary">
                                {{ $permissions->name }}

                            </span>
                        @endforeach
                    </td>
                    <td>{{ $role->guard_name }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('are you sure you want to delete this role ?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
