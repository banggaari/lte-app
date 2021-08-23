@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Waiting for Approval</div>

                    <div class="card-body">
                        Your account is waiting for our administrator approval.
                        <br />
                        Please check back later.
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop