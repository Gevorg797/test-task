@extends('layouts.app')

@section('content')
    <div style="display: flex;justify-content: center">
        <form method="POST" action="{{route('addReserve',$roomId)}}"
              style="display:inline">
            @csrf
            <input type="text" id="datePick" name="date" class="@error('date') is-invalid @enderror" placeholder="Day"/>
            @error('date')<span class="invalid-feedback">{{ $message }}</span>@enderror
            <button type="submit"  class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Save</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#datePick').multiDatesPicker();
        });
    </script>
@endsection
