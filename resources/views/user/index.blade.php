@extends('layouts.app')
@section('title', 'Users')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" >
                        <div class="row">
                            <div class="col-xs-12 col-lg-3 pr-1">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search..." value="{{app('request')->input('search')}}">
                            </div>
                            <div class="col-xs-12 col-lg-3 pr-1">
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">[All Roles]</option>
                                    @foreach ($user_roles as $role)
                                        <option value="{{$role->id}}" @if(app('request')->input('role_id') == $role->id) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-3 pr-1">
                                <button type="submit" class="btn btn-primary m-0">Search</button>
                            </div>
                            <div class="col-lg-1 pr-1">
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-xs-12 col-lg-2 pr-1">
                                <select name="is_enable" id="is_enable" class="form-control" onchange="this.form.submit()">
                                    <option value="">All Status</option>
                                    <option value="1" @if(app('request')->input('is_enable') === "1") selected @endif>Enabled</option>
                                    <option value="0" @if(app('request')->input('is_enable') === "0") selected @endif>Disabled</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th class="hidden-xs hidden-sm">First Name</th>
                                            <th class="hidden-xs hidden-sm">Last Name</th>
                                            <th class="hidden-xs hidden-sm">Email Address</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->username}}</td>
                                                <td class="hidden-xs hidden-sm">{{$user->first_name}}</td>
                                                <td class="hidden-xs hidden-sm">{{$user->last_name}}</td>
                                                <td class="hidden-xs hidden-sm">{{$user->email}}</td>
                                                <td>{{$user->role_name}}</td>
                                                <td>
                                                    <a href="{{route('users_edit_view', ['id' => $user->id])}}" data-toggle="tooltip" title="Edit {{$user->username}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    @if ($user->is_enabled)
                                                        <a href="{{route('users_disable', ['id' => $user->id])}}" data-toggle="tooltip" title="Diable {{$user->username}}" onclick="return confirm('Disable {{$user->username}}')">
                                                            <i class="fa fa-ban"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{route('users_enable', ['id' => $user->id])}}" data-toggle="tooltip" title="Enable {{$user->username}}" onclick="return confirm('Enable {{$user->username}}')">
                                                            <i class="fa fa-check-circle"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('users_add_view')}}" class="float btn-primary" data-toggle="tooltip" data-placement="left" title="Add User">
                                    <i class="fa fa-plus my-float"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });
</script>
@endsection