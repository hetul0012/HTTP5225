<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div>
        <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('students.index') }}">Students</a></li>
            <li><a href="{{ route('students.create') }}">Add Student</a></li>
        </ul>
    </div>
    <hr>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>