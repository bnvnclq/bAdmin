{{--  
/*
 * File: change_password.php
 * Project: bAdmin
 * File Created: Monday, 27th January 2020 11:22:31 am
 * Author: Bien Laqui (bienlaqui@couplesforchristglobal.org)
 * -----
 * Last Modified: Monday, 27th January 2020 1:38:35 pm
 * Modified By: Bien Laqui (bienlaqui@couplesforchristglobal.org>)
 * -----
 * Copyright 2018 - 2020 Couples For Christ Global Mission Foundation Inc.
 * -----
 * Description: 
 */  
--}}

@extends('layouts.app')
@section('title', 'Change Password')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('home') }}"></a>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right">Old Password</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" name="old_password" id="old_passwrod" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-4">
                                    <input class="btn btn-primary" type="submit" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection