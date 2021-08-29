@extends('adminlte::page')

@section('title', 'Edit Asset')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Asset</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/assets">Asset</a></li>
                        <li class="breadcrumb-item active">Edit Asset</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <label>Nama *</label>
        <x-adminlte-input name="name" disabled value="{{ $satuanKerja->name }}" class="form-control" id=name
            placeholder="Nama Satuan Kerja">
        </x-adminlte-input>
        <label>Description *</label>
        <x-adminlte-textarea disabled name="description" class="form-control" id=description placeholder="Description">
            {{ $satuanKerja->description }}
        </x-adminlte-textarea>

        <x-adminlte-card>
            @if (session('message'))
                <x-adminlte-alert dismissable class="float-right" theme="info" title="{{ session('message') }}">
                </x-adminlte-alert>
            @endif
            <div class="float-sm-left mb-2">
                <x-adminlte-button class="btn btn-sm" label="Add Asset" data-toggle="modal" data-target="#modalCustom" theme="success"/>
            </div>
            <x-adminlte-datatable id="table1" :heads="$heads" with-buttons>
                @foreach ($drones as $drone)
                    <tr>
                        <td>{{ $drone->jenis_pesawat }}</td>
                        <td>{{ $drone->merk }}</td>
                        <td>{{ $drone->tanda_pengenal }}</td>
                        <td>{{ $drone->keterangan }}</td>
                        <td>
                            <form action="{{ route('assets.destroy', $drone->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('are you sure you want to delete this Drone From Asset?')">
                                    Delete
                                </button>
    
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </x-adminlte-card>
    </x-adminlte-card>

    <x-adminlte-modal id="modalCustom" title="Add Asset" size="lg" theme="teal" v-centered
        static-backdrop scrollable>
        <x-adminlte-datatable id="table2" :heads="$heads" with-buttons>
            @foreach ($dronesModal as $droneModal)
                <tr>
                    <td>{{ $droneModal->jenis_pesawat }}</td>
                    <td>{{ $droneModal->merk }}</td>
                    <td>{{ $droneModal->tanda_pengenal }}</td>
                    <td>{{ $droneModal->keterangan }}</td>
                    <td>
                        <a href="{{ url('assets/'.$satuanKerja->id.'/drone/' . $droneModal->id) }}" class="btn btn-primary btn-sm">Add</a>

                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-modal>
@stop
