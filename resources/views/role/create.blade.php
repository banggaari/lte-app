@extends('adminlte::page')

@section('title', 'Create Role')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/roles">Roles</a></li>
                        <li class="breadcrumb-item active">Create Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            @method('POST')
            <label>Name</label>
            <span style="color: red">*</span>
            <x-adminlte-input name="name" class="form-control" id=name placeholder="Role Name">
            </x-adminlte-input>
            <label>Guard Name</label>
            <span style="color: red">*</span>
            <x-adminlte-input name="guard_name" disabled value="Web" class="form-control" id=guard_name
                placeholder="guard_name">
            </x-adminlte-input>
    </x-adminlte-card>

    <x-adminlte-card>
        <label>Permission</label>
        <div class="form-group">
            <div class="row">
                @foreach ($permission as $key => $value)
                    <div class="col-3">
                        <label
                            class="checkbox-inline">{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="btn btn-danger btn-sm float-sm-right ml-1" href="{{ route('roles.index') }}">Cancel</a>
        <x-adminlte-button class="btn-sm float-sm-right " type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save">
        </x-adminlte-button>
        </form>
    </x-adminlte-card>
@stop
