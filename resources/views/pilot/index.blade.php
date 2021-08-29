@extends('adminlte::page')

@section('title', 'Pilot')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pilot</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pilots">Pilot</a></li>
                        <li class="breadcrumb-item active">Pilot</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <div class="float-sm-left mb-2">
            <a class="btn btn-success btn-sm" href="{{ route('pilots.create') }}"> Add Pilot</a>
        </div>
        @if (session('message'))
            <x-adminlte-alert dismissable class="float-right" theme="info" title="{{ session('message') }}">
            </x-adminlte-alert>
        @endif
        <x-adminlte-datatable id="table1" :heads="$heads" with-buttons>
            @foreach ($pilots as $pilot)
                <tr>
                    <td>{{ $pilot->name_user }}</td>
                    <td>{{ $pilot->name_satuan_kerja }}</td>
                    <td>{{ $pilot->no_kontak }}</td>
                    <td>{{ $pilot->no_license }}</td>
                    <td>{{ $pilot->masa_berlaku }}</td>
                    <td>
                        <form action="{{ route('pilots.destroy', $pilot->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('pilots.edit', $pilot->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('are you sure you want to delete this Pilot ?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
