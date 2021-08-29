@extends('adminlte::page')

@section('title', 'Add Pilot')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Pilot</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pilots">Pilot</a></li>
                        <li class="breadcrumb-item active">Add Pilot</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <form action="{{ route('pilots.store') }}" method="POST">
            @csrf
            @method('POST')
            <label>User *</label>
            <x-adminlte-input name="username" class="form-control" id=username placeholder="User" readonly="readonly">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
                <x-slot name="appendSlot">
                    <x-adminlte-button data-toggle="modal" data-target="#modalUser" icon="fas fa-search text-lightblue">
                    </x-adminlte-button>
                </x-slot>
            </x-adminlte-input>
            <label>Satuan Kerja *</label>
            <x-adminlte-input name="satuankerja" class="form-control" id=satuankerja placeholder="Satuan Kerja" readonly="readonly">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-landmark text-lightblue"></i>
                    </div>
                </x-slot>
                <x-slot name="appendSlot">
                    <x-adminlte-button data-toggle="modal" data-target="#modalSatuanKerja"
                        icon="fas fa-search text-lightblue">
                    </x-adminlte-button>
                </x-slot>
            </x-adminlte-input>
            <div class="row">
                <x-adminlte-input fgroup-class="col-md-6" label="No License *" name="no_license" class="form-control" id=no_license placeholder="No License">
                </x-adminlte-input>
                <x-adminlte-input-date class="form-control" label="Masa Berlaku *" fgroup-class="col-md-6" name="masa_berlaku" id=masa_berlaku :config="$configDate" placeholder="Choose a date...">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-gradient-danger">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <label>No Kontak</label>
            <x-adminlte-input name="no_kontak" class="form-control" id=no_kontak placeholder="No Kontak">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i>+62</i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <label>Riwayat Training</label>
            <x-adminlte-textarea name="riwayat_training" class="form-control" id=riwayat_training
                placeholder="Riwayat Training">
            </x-adminlte-textarea>
            <a class="btn btn-danger btn-sm float-sm-right ml-1" href="{{ route('pilots.index') }}">Cancel</a>
            <x-adminlte-button class="btn-sm float-sm-right " type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save">
            </x-adminlte-button>
            <x-adminlte-input name="idusername" class="form-control" id=idusername type="hidden" />
            <x-adminlte-input name="idSatuanKerja" class="form-control" id=idSatuanKerja type="hidden" />
    </x-adminlte-card>
    </form>
    {{-- Modal User --}}
    <x-adminlte-modal id="modalUser" title="User" size="lg" theme="teal" icon="fas fa-user" v-centered static-backdrop
        scrollable>
        <x-adminlte-datatable id="tableUser" :heads="$heads">
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <x-adminlte-button label="Select" id="selectuser" theme="info" data-nama="{{ $user->name }}"
                            data-id="{{ $user->id }}" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No User found.</td>
                </tr>
            @endforelse
        </x-adminlte-datatable>
    </x-adminlte-modal>

    {{-- Modal Satuan Kerja --}}
    <x-adminlte-modal id="modalSatuanKerja" title="Satuan Kerja" size="lg" theme="teal" icon="fas fa-landmark" v-centered
        static-backdrop scrollable>
        <x-adminlte-datatable id="tableSatuanKerja" :heads="$heads1">
            @forelse ($satuanKerjas as $satuanKerja)
                <tr>
                    <td>{{ $satuanKerja->name }}</td>
                    <td>{{ $satuanKerja->description }}</td>
                    <td>
                        <x-adminlte-button label="Select" id="selectsatuankerja" theme="info"
                            data-nama="{{ $satuanKerja->name }}" data-id="{{ $satuanKerja->id }}" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Satuan Kerja found.</td>
                </tr>
            @endforelse
        </x-adminlte-datatable>
    </x-adminlte-modal>
@stop
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#selectuser', function() {
                var username = $(this).data('nama');
                var idUser = $(this).data('id');
                $('#username').val(username);
                $('#idusername').val(idUser);
                $('#modalUser').modal('hide');
            })
        })
        $(document).ready(function() {
            $(document).on('click', '#selectsatuankerja', function() {
                var namaSatuanKerja = $(this).data('nama');
                var idSatuanKerja = $(this).data('id');
                $('#satuankerja').val(namaSatuanKerja);
                $('#idSatuanKerja').val(idSatuanKerja);
                $('#modalSatuanKerja').modal('hide');
            })
        })
    </script>
@endpush
@section('plugins.TempusDominusBs4', true)
