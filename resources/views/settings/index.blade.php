@extends('layouts.app')
@section('title', 'Settings')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fa fa-tasks"></i> Default Values</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{route('settings_default_value')}}">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fa fa-window-restore"></i> Modules</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{route('settings_module')}}">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fa fa-users"></i> User Roles</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{route('settings_user_types')}}">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection