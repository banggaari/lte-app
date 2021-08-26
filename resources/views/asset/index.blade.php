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
                        <li class="breadcrumb-item"><a href="/assets">Satuan Kerja</a></li>
                        <li class="breadcrumb-item active">Satuan Kerja</li>
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
        <x-adminlte-datatable id="table1" :heads="$heads" with-buttons>
            @foreach ($satuanKerjas as $satuanKerja)
                <tr>
                    <td>{{ $satuanKerja->name }}</td>
                    <td>{{ $satuanKerja->description }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('assets.edit', $satuanKerja->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
