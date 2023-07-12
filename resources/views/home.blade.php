@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div style="display: flex;justify-content: space-around">
                   @can('Manage Rooms')
                       <a href="{{route('rooms.index')}}"><button type="button" class="btn btn-info">See Rooms</button></a>
                   @endcan
                   @can('Manage Reserves')
                       <a href="{{route('reserves.index')}}"><button type="button" class="btn btn-danger">See un reserve</button></a>
                   @endcan
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
