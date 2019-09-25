@extends('layouts.app')
@section('title', 'Settings : Modules')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="" method="POST">
                        @csrf
                        <div class="card-header">
                            <a href="{{route('settings')}}"> <i class="fa fa-angle-double-left "></i>Back</a>
                            <h5 class="card-title"><i class="fa fa-window-restore"></i> Modules</h5>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Icon Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($arr_modules as $module)
                                            <tr>
                                                <td>{{$module->name}}</td>
                                                <td>{{$module->code}}</td>
                                                <td><input type="text" name="key[{{$config->key}}]" id="key[{{$config->key}}]" value="{{$config->value}}" class="form-control"></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">No configuirations</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection