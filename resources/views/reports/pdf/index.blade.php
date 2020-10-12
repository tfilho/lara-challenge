<style type="text/css">
    .zui-table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        font: normal 13px Arial, sans-serif;
    }
    .zui-table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
    }
    .zui-table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
    }
    p {text-align: center;}
    h2 {text-align: center;}
</style>

<div class="container zui-table">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h2>Reports</h2>

            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>FirstName</th>
                        <th>Topic</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <th>{{ $report->id }}</th>
                            <td>{{$report->profile->first_name }}</td>
                            <td>{{$report->topic}}</td>
                            <td>{{$report->description}}</td>
                            <td>{{$report->created_at}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <p> Date: {{ \Carbon\Carbon::now()->format('m-d-Y H:i:s')}}</p>
        </div>
    </div>
</div>
