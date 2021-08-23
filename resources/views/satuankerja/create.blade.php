@extends('adminlte::page')

@section('title', 'Create Satuan Kerja')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Satuan Kerja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/satuankerja">Satuan Kerja</a></li>
                        <li class="breadcrumb-item active">Create Satuan Kerja</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <form action="{{ route('satuankerja.store') }}" method="POST">
            @csrf
            @method('POST')
            <label>Nama</label>
            <span style="color: red">*</span>
            <x-adminlte-input name="name" class="form-control" id=name placeholder="Nama Satuan Kerja">
            </x-adminlte-input>
            <label>Description</label>
            <span style="color: red">*</span>
            <x-adminlte-textarea name="description" class="form-control" id=description placeholder="Description">
            </x-adminlte-textarea>
            <a class="btn btn-danger btn-sm float-sm-right ml-1" href="{{ route('satuankerja.index') }}">Cancel</a>
            <x-adminlte-button class="btn-sm float-sm-right " type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save">
            </x-adminlte-button>
    </x-adminlte-card>
    </form>
@stop
