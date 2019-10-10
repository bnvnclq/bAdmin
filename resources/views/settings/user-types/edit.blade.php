@extends('layouts.app')
@section('title', 'Settings : User Types : Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" class="form">
                            <a href="{{route('settings_user_types')}}"> <i class="fa fa-angle-double-left "></i>Back</a>
                            <h5>{{$arr_user_type->name}}</h5>
                            <span class="title">Details</span>
                            <div class="row">
                                <div class="col-sm-12 col-lg-4 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$arr_user_type->name}}" required>
                                </div>
                                <div class="col-sm-12 col-lg-4 form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" id="code" class="form-control" value="{{$arr_user_type->code}}" required>
                                </div>
                                <div class="col-sm-12 col-lg-4 form-group">
                                    <label for="level">Level</label>
                                    <input type="number" name="level" id="level" class="form-control" value="{{$arr_user_type->level}}" required>
                                </div>
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" value="{{$arr_user_type->description}}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="title">Accessible Module</span>
                                    @forelse ($arr_modules as $module)
                                        <div class="form-group">
                                            <input id="module[{{$module->id}}]" name="module[{{$module->id}}]" type="checkbox" data-toggle="switch" data-size="mini" class="primary" 
                                                @if (sizeof($arr_modules_access->where('module_id', $module->id)))
                                                    checked
                                                @endif>
                                            &nbsp; &nbsp;<label><i class="{{$module->icon_class}}"></i><strong> {{$module->name}}</strong></label>
                                        </div>
                                    @empty
                                        <h5>No module?!?! What!?!? No!</h5>
                                    @endforelse
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection