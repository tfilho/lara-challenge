@extends('layouts.app')

@section('content')


    <form method="POST" action="/reports/{{ $report->id }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="form-group col-md-4">
                <label for="profile">Profile</label>
                <select name="profile_id" class="form-control">
                    @foreach($profiles as $profile)
                        <option {{ $profile->id == $report->profile->id ? 'selected' : '' }} value="{{ $profile->id }}">{{ $profile->first_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('profile_id'))
                    <small class="form-text">{{ $errors->first('profile_id') }}</small>
                @endif
            </div>
            <div class="form-group col-md-8">
                <label for="topic">Topic</label>
                <input type="text" class="form-control @error('topic') is-invalid @enderror" name="topic"
                       id="topic"
                       value="{{ $report->topic }}"
                       aria-describedby="emailHelp"
                       placeholder="Enter Topic">
                @if($errors->has('topic'))
                    <small class="form-text invalid-feedback">{{ $errors->first('topic') }}</small>
                @endif
            </div>
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                name="description"
                id="description"
                placeholder="Enter Description"
            >{{ $report->description }}</textarea>
            @if($errors->has('description'))
                <small class="form-text invalid-feedback">{{ $errors->first('description') }}</small>
            @endif
        </div>
        <div class="form-row">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <a class="btn btn-info" href="/reports" role="button">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
