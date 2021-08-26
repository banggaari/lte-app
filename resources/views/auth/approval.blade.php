@extends('adminlte::page')

@section('title', 'Approval')

@section('content_header')
@stop

@section('content')

    <x-adminlte-card theme="lime" theme-mode="outline" class="mt-3">
        <center>
        <label> Waiting for Approval </label>
        <br />
        <label>  Your account is waiting for our administrator approval.</label>
        <br />
        <label> Please check back later.</label>
    </center>
    </x-adminlte-card>
@stop
