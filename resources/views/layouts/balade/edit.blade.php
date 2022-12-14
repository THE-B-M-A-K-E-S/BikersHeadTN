@extends('layouts.app')

@section('content')

    <h1> Edit a Balade</h1>

    <form action="{{ route('balade.update', $balade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $balade->name }}">
        <br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $balade->description }}">
        <br>

        <label for="date">Date</label>
        <input type="date" name="date" id="date" value="{{ $balade->date }}">
        <br>

        <label for="place">place</label>
        <input type="text" name="place" id="place" value="{{ $balade->place }}">
        <br>

        <label for="distance">distance</label>
        <input type="number" name="distance" id="distance" value="{{ $balade->distance }}">
        <br>

        <label for="duration">duration</label>
        <input type="number" name="duration" id="duration" value="{{ $balade->duration }}">
        <br>

        <label for="max_participants">max participants</label>
        <input type="number" name="max_participants" id="max_participants" value="{{ $balade->max_participants }}">
        <br>

        <label for="difficulty">difficulty</label>
        <select id="difficulty" name="difficulty" class="form-control form-control-lg">
            <option value="HARD" selected>HARD</option>
            <option value="MEDIUM">MEDIUM</option>
            <option value="EASY">EASY</option>
        </select>
        <br>

        <label for="image[]">Choose Images</label>
        <input type="file" name="image[]" multiple class="form-control">
        <br>



        <button type="submit" class="btn btn-primary mt-4">Update</button>

    </form>

    @if(count($errors) > 0)
        <div class="p-1">
            @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button type="button" class="close"
                                                                                                        data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
            @endforeach
        </div>
    @endif



@endsection
