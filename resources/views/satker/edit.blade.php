@extends('adminlte::page')

@section('title', 'Edit Satuan Kerja')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Satuan Kerja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/satkers">Satuan Kerja</a></li>
                        <li class="breadcrumb-item active">Edit Satuan Kerja</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <form action="{{ route('satkers.update', $satuanKerja->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Nama *</label>
            <x-adminlte-input name="name" value="{{ $satuanKerja->name }}" class="form-control" id=name placeholder="Nama Satuan Kerja">
            </x-adminlte-input>
            <label>Description *</label>
            <x-adminlte-textarea name="description" class="form-control" id=description placeholder="Description">
                {{ $satuanKerja->description }}
            </x-adminlte-textarea>
    <a class="btn btn-danger btn-sm float-sm-right ml-1" href="{{ route('satkers.index') }}">Cancel</a>
    <x-adminlte-button class="btn-sm float-sm-right " type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save">
    </x-adminlte-button>
    </x-adminlte-card>
    </form>
@stop
