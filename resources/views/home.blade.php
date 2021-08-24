@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom" />
    <input type="text" name="name" id="name">
    <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal" icon="fas fa-bell" v-centered
        static-backdrop scrollable>
        <x-adminlte-datatable id="table1" :heads="$heads">
            @forelse ($satuanKerjas as $satuanKerja)
                <tr>
                    <td>{{ $satuanKerja->name }}</td>
                    <td>{{ $satuanKerja->description }}</td>
                    <td>
                    <x-adminlte-button label="Select" id="select" data-nama="{{$satuanKerja->name }}"/>
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
    $(document).ready(function(){
        $(document).on('click','#select',function(){
            var nama = $(this).data('nama');
            $('#name').val(nama);
            $('#modalCustom').modal('hide');
        })
    })
</script>
@endpush
