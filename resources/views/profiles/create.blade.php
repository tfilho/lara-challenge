@extends('layouts.app')

@section('content')

    <h2 class="text-primary">New Profile</h2>

    <form method="POST" action="/profiles">
        @csrf

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" required class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                       id="first_name"
                       value="{{ old('first_name') }}"
                       aria-describedby="emailHelp"
                       placeholder="Enter First Name">
                @if($errors->has('first_name'))
                    <small class="form-text invalid-feedback">{{ $errors->first('first_name') }}</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" required class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                       id="last_name"
                       value="{{ old('last_name') }}"
                       aria-describedby="emailHelp"
                       placeholder="Enter Last Name">
                @if($errors->has('last_name'))
                    <small class="form-text invalid-feedback">{{ $errors->first('last_name') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="birthday">Birthday</label>
                <input type="date" required class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                       id="birthday"
                       value="{{ old('birthday') }}"
                       aria-describedby="emailHelp"
                       placeholder="Enter birthday">
                @if($errors->has('birthday'))
                    <small class="form-text invalid-feedback">{{ $errors->first('birthday') }}</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="gender_id">Gender:</label><br/>
                @foreach($genders as $gender)
                    <label><input type="radio" name="gender_id" id="gender_id" required value="{{$gender->id}}" /> {{$gender->name}}</label>
                @endforeach
                @if($errors->has('gender_id'))
                    <small class="form-text invalid-feedback">{{ $errors->first('gender_id') }}</small>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <a class="btn btn-info" href="/profiles" role="button">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
