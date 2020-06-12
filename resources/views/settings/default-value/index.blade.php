@extends('layouts.app')
@section('title', 'Settings : Default Value')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="" method="POST">
                        @csrf
                        <div class="card-header">
                            <a href="{{route('settings')}}"> <i class="fa fa-angle-double-left "></i>Back</a>
                            <h5 class="card-title">  <i class="fa fa-tasks"></i> Default Values</h5>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <span><i>Empty values will be changed to "null" after saving.</i></span>
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Key</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($arr_configs as $config)
                                            <tr>
                                                <td>{{$config->key}}</td>
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