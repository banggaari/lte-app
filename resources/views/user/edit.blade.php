@extends('adminlte::page')

@section('title', 'Edit User')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/users">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        @if (session('message'))
            <x-adminlte-alert theme="success" title="{{ session('message') }}">
            </x-adminlte-alert>
        @endif
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Name *</label>
            <x-adminlte-input name="name" value="{{ $user->name }}" class="form-control" id=name placeholder="User Name">
            </x-adminlte-input>
            <label>Email *</label>
            <x-adminlte-input name="email" value="{{ $user->email }}" class="form-control" id=email placeholder="Email">
            </x-adminlte-input>
            <label>Password</label>
            <x-adminlte-input type="password" name="password" class="form-control" id=password placeholder="Password">
            </x-adminlte-input>
            <label>Confirm Password</label>
            <x-adminlte-input type="password" name="confirm-password" class="form-control" id=confirm-password
                placeholder="Confirm Password">
            </x-adminlte-input>
            <x-adminlte-select2 id="roles" name="roles[]" label="Roles" igroup-size="sm" :config="$config" multiple>
                @foreach ($roles as $ur)
                    <option {{ collect($userRole)->contains($ur) ? 'selected' : '' }}>{{ $ur }}</option>
                @endforeach
            </x-adminlte-select2>
            <x-adminlte-button class="float-sm-right ml-1" theme="danger" label="Cancel" data-dismiss="modal" />
            <x-adminlte-button class="float-sm-right " type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save"></x-adminlte-button>
        </form>
    </x-adminlte-card>
@stop
