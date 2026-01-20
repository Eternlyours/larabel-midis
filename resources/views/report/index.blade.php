<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a href="{{ route('reports.create') }}">Create report</a>
    <h1>Reports</h1>
    <div>
        <span>Sort by date</span>
        <a href="{{ route('report.index', ['sort'=>'desc', 'status' => $status])}}">New</a>
        <a href="{{ route('report.index', ['sort'=>'asc', 'status' => $status])}}">Old</a>
        <a href="{{ route('report.index') }}">Reset filter and sort</a>
    </div>
    <div>
        <span>
            Filter by status
        </span>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('report.index', ['sort'=>$sort, 'status'=>$status->id]) }}">
                        {{ $status->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @foreach ($reports as $report )
        <div>
            <a href="{{ route('reports.show', $report->id) }}">Show report</a>
            <h2>{{$report->number}}</h2>    
            <p>
                {{ $report->description }}
            </p>
            <strong>{{ $report->status->name }}</strong>
            <br>
            <strong>{{ $report->user->name }}</strong>
            <form action="{{ route('reports.delete', $report->id) }}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
        <div>
        </div>
        <hr>
    @endforeach
    {{ $reports->links() }}
</body>
</html>