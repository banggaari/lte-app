@extends('adminlte::page')

@section('title', 'User Approve')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users List to Approve</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/users">Users</a></li>
                        <li class="breadcrumb-item active">Users List to Approve</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        @if (session('message'))
            <x-adminlte-alert dismissable class="float-right" theme="info" title="{{ session('message') }}">
            </x-adminlte-alert>
        @endif
        <x-adminlte-datatable id="table1" :heads="$heads">
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ url('userapprove/approve/' . $user->id) }}" class="btn btn-primary btn-sm">Approve</a>
                        <a href="{{ url('userapprove/notapprove/' . $user->id) }}" class="btn btn-danger btn-sm">Not
                            Approve</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            @endforelse
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
