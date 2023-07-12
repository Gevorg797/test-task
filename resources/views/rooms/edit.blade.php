@extends('layouts.app')

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul style="display: flex;justify-content: center">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div style="display: flex;justify-content: center">
        <form style="width: 50%;" method="post" action="{{route('rooms.update',$room->id)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputNumber">Room Number</label>
                <input type="text" name="room_number" class="form-control @error('room_number') is-invalid @enderror" id="exampleInputNumber" value="{{$room->room_number}}"  placeholder="Enter Number">
                @error('room_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Submit</button>
        </form>
    </div>

@endsection
