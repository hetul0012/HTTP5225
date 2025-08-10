@extends('admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Course Details</h1>

    <div class="card p-4 shadow-sm">
        <h4>{{ $course->name }}</h4>
        <p class="text-muted">{{ $course->description }}</p>
        <p><small>Created: {{ $course->created_at->format('d M Y') }}</small></p>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to Courses</a>
</div>
@endsection
