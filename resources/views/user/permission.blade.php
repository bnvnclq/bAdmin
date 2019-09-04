@extends('layouts.app')

@section('title', 'Users : Manage Permission')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            @csrf
            <div class="card">
                <div class="card-block">
                    <form action="" method="POST" class="form">
                        @forelse ($modules as $key => $module)
                        @empty
                            
                        @endforelse
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection