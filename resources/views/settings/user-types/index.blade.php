@extends('layouts.app')
@section('title', 'Settings : User Roles')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('settings')}}"> <i class="fa fa-angle-double-left "></i>Back</a>
                        <h5 class="card-header"><i class="fa fa-users"></i> User Roles</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Code</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($arr_user_types as $user_type)
                                        <tr>
                                            <td>{{$user_type->name}}</td>
                                            <td>{{$user_type->description}}</td>
                                            <td>{{$user_type->code}}</td>
                                            <td>{{$user_type->level}}</td>
                                            <td>
                                                <a href="{{route('settings_user_types_edit', ['id' => $user_type->id])}}" data-toggle="tooltip" data-placement="top" title="Edit {{$user_type->name}}"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr> 
                                    @empty
                                        <tr>
                                            <td colspan="5">No User Role, that&#39;s impossible :( </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection