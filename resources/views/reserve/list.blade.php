@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @can('Manage Rooms')
                    <div>
                        <a href="{{route('rooms.create')}}">
                            <button type="button" class="btn btn-primary">Add New</button>
                        </a>
                    </div>
                @endcan

                <div class="card">
                    <table id="example" class="table table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Number</th>
                            <th>Reserve</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)

                            <tr  class="{{$room->reserve ? 'reserve': ''}}">
                                <td>{{$room->id}}</td>
                                <td>{{$room->room_number}}</td>
                                <td>
                                    @if(isset($room->reserve))
                                        <form method="POST" action="{{route('reserves.destroy',$room->reserve->id)}}"
                                              style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Cancel</button>
                                        </form>
                                    @else
                                        <a href="{{route('reservePage',$room->id)}}">
                                            <button type="submit"  class="btn btn-primary">Reserve</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $rooms->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
