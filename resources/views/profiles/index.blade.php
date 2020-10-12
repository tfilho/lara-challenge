@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h2>Profiles

                    <a href="/profiles/create" class="btn btn-success btn-xs">
                        New
                    </a>

                </h2>

                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <th>{{ $profile->id }}</th>
                            <td>{{$profile->first_name }}</td>
                            <td>{{$profile->last_name}}</td>
                            <td>{{$profile->birthday}}</td>
                            <td>{{$profile->gender->name}}</td>
                            <td>
                                <a class='btn btn-info btn-sm' href="/profiles/{{$profile->id}}/edit">
                                    Edit
                                </a>
                                <form action="/profiles/{{$profile->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>



@endsection
