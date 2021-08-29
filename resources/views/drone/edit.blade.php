@extends('adminlte::page')

@section('title', 'Edit Drone')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Drone</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/drones">Drone</a></li>
                        <li class="breadcrumb-item active">Edit Drone</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <form action="{{ route('drones.update',$drone->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-adminlte-select label="Jenis Pesawat" name="jenis_pesawat" id="jenis_pesawat" class="form-control">
                @if ($drone->jenis_pesawat == 'Multi Rotor')
                    <option selected>Multi Rotor</option>
                    <option >Fixed Wing</option>
                @else
                    <option>Multi Rotor</option>
                    <option selected>Fixed Wing</option>
                @endif
            </x-adminlte-select>
            <label>Merk *</label>
            <x-adminlte-input name="merk" value="{{$drone->merk}}" class="form-control" id="merk" placeholder="Merk / Tipe Drone">
            </x-adminlte-input>
            <label>Tanda Pengenal</label>
            <x-adminlte-input name="tanda_pengenal" value="{{$drone->tanda_pengenal}}" class="form-control" id="tanda_pengenal" placeholder="Tanda Pengenal">
            </x-adminlte-input>
            <label>Keterangan</label>
            <x-adminlte-textarea name="keterangan" value="{{$drone->keterangan}}" class="form-control" id="keterangan" placeholder="Keterangan">
            </x-adminlte-textarea>
            <a class="btn btn-danger btn-sm float-sm-right ml-1" href="{{ route('drones.index') }}">Cancel</a>
            <x-adminlte-button class="btn-sm float-sm-right " type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save">
            </x-adminlte-button>
    </x-adminlte-card>
    </form>
@stop
