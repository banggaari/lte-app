@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple"
    icon="fas fa-bolt" size='lg' disable-animations>
    This is a purple theme modal without animations.
</x-adminlte-modal>
{{-- Example button to open modal --}}
<x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalPurple" class="bg-purple"/>
<x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-red">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
    </x-slot>
    <option>Sports</option>
    <option>News</option>
    <option>Games</option>
    <option>Science</option>
    <option>Maths</option>
</x-adminlte-select2>
{{-- Minimal --}}
<x-adminlte-select2 name="sel2Basic">
    <option>Option 1</option>
    <option disabled>Option 2</option>
    <option selected>Option 3</option>
</x-adminlte-select2>

{{-- Disabled --}}
<x-adminlte-select2 name="sel2Disabled" disabled>
    <option>Option 1</option>
    <option>Option 2</option>
</x-adminlte-select2>

{{-- With prepend slot, label and data-placeholder config --}}
<x-adminlte-select2 name="sel2Vehicle" label="Vehicle" label-class="text-lightblue"
    igroup-size="lg" data-placeholder="Select an option...">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-car-side"></i>
        </div>
    </x-slot>
    <option>Vehicle 1</option>
    <option>Vehicle 2</option>
</x-adminlte-select2>
@stop

