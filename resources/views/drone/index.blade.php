@extends('adminlte::page')

@section('title', 'Drone')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Drone</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/drones">Drone</a></li>
                        <li class="breadcrumb-item active">Drone</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <div class="float-sm-left mb-2">
            <a class="btn btn-success btn-sm" href="{{ route('drones.create') }}"> Add Drone</a>
        </div>
        @if (session('message'))
            <x-adminlte-alert dismissable class="float-right" theme="info" title="{{ session('message') }}">
            </x-adminlte-alert>
        @endif
        <x-adminlte-datatable id="table1" :heads="$heads">
            @forelse ($drones as $drone)
                <tr>
                    <td>{{ $drone->jenis_pesawat }}</td>
                    <td>{{ $drone->merk }}</td>
                    <td>{{ $drone->tanda_pengenal }}</td>
                    <td>{{ $drone->keterangan }}</td>
                    <td>
                        <form action="{{ route('drones.destroy', $drone->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('drones.edit', $drone->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('are you sure you want to delete this Drone ?')">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Drone found.</td>
                </tr>
            @endforelse
        </x-adminlte-datatable>
    </x-adminlte-card>
    <x-adminlte-card>
        <form action="{{ route('importDrone') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-adminlte-input-file name="file" class="form-control" label="Upload files"
                placeholder="Choose multiple files..." igroup-size="sm" legend="Choose">
                <x-slot name="appendSlot">
                    <button class="btn btn-success mr-2">Import Drone</button>
                    <a class="btn btn-warning" href="{{ route('exportDrone') }}">Export Drone</a>
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
@section('plugins.BsCustomFileInput', true)
