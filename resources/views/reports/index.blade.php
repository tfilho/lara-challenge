@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h2>Reports

                    <a href="/reports/create" class="btn btn-success btn-xs">
                        New
                    </a>

                </h2>

                <div class="table-responsive">
                    <table class="table table-sm table-hover zui-table">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">#</th>
                        <th>FirstName</th>
                        <th>Topic</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr class="text-center">
                            <th>{{ $report->id }}</th>
                            <td>{{$report->profile->first_name }}</td>
                            <td>{{$report->topic}}</td>
                            <td>{{$report->description}}</td>
                            <td>
                                <a class='btn btn-info btn-sm' href="/reports/{{$report->id}}/edit">
                                    Edit
                                </a>
                                <form action="/reports/{{$report->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Del</button>
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
