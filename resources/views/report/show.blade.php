<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('report.index') }}">Index</a>
    <h1>Show report</h1>
    <h2>
        {{ $report->number }}
    </h2>
    <p>
        {{ $report->description }}
    </p>
    <strong>{{ $report->status->name }}</strong>
    <br>
    <strong>{{ $report->user->name }}</strong>
    <hr>
    <form action="{{ route('reports.update', $report->id) }}" method="post">
        @csrf
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="number">Number</label>
        <input type="text" name="number" id="number" value="{{ $report->number }}" required>
        <br>
        <label for="descriotion">Desc</label>
        <textarea name="description" id="description" required>{{ $report->description }}</textarea>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>