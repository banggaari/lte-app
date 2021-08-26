@extends('adminlte::page')

@section('title', 'Satuan Kerja')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Satuan Kerja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/satuankerja">Satuan Kerja</a></li>
                        <li class="breadcrumb-item active">Satuan Kerja</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <div class="float-sm-left mb-2">
            <a class="btn btn-success btn-sm" href="{{ route('satuankerja.create') }}"> Create Satuan Kerja</a>
        </div>
        @if (session('message'))
            <x-adminlte-alert dismissable class="float-right" theme="info" title="{{ session('message') }}">
            </x-adminlte-alert>
        @endif
        <x-adminlte-datatable id="table1" :heads="$heads" with-buttons>
            @foreach ($satuanKerjas as $satuanKerja)
                <tr>
                    <td>{{ $satuanKerja->name }}</td>
                    <td>{{ $satuanKerja->description }}</td>
                    <td>
                        <form action="{{ route('satuankerja.destroy', $satuanKerja->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('satuankerja.edit', $satuanKerja->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('are you sure you want to delete this satuan kerja ?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
    <x-adminlte-card>
        <form action="{{ route('importSatuanKerja') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-adminlte-input-file name="file" class="form-control" label="Upload files"
                placeholder="Choose multiple files..." igroup-size="sm" legend="Choose">
                <x-slot name="appendSlot">
                    <button class="btn btn-success mr-2">Import User Data</button>
                    <a class="btn btn-warning" href="{{ route('exportSatuanKerja') }}">Export Satuan Kerja Data</a>
                </x-slot>
                <x-slot name="prependSlot">
                    <div class="input-group-text text-primary">
                        <i class="fas fa-file-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
        </form>
    </x-adminlte-card>
@stop
