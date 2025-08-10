<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','LMS Admin')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{background:#f5f7fb}
    .navbar{box-shadow:0 2px 12px rgba(0,0,0,.06)}
    .card{border:0;box-shadow:0 8px 24px rgba(0,0,0,.06);border-radius:16px}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">LMS Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav me-auto">
        {{-- If you don't have a named "home" route, change to url("/") --}}
        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Students</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('students.create') }}">Add Student</a></li>
      </ul>
      <div class="d-flex">
        <a href="{{ route('courses.create') }}" class="btn btn-primary">+ New Course</a>
      </div>
    </div>
  </div>
</nav>

<div class="container py-4">
  {{-- Flash messages --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('success') }}
      <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
      {{ session('error') }}
      <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- Page content --}}
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
