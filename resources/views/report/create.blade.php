<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('report.index') }}">Index</a>
    <h1>Create Reports</h1>
    <form action="{{ route('reports.store') }}" method="post">
        @csrf
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
        <input type="text" name="number" id="number" required>
        <br>
        <label for="descriotion">Desc</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>