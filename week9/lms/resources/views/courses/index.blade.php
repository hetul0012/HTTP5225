@extends('layouts.admin')
@section('title','Courses')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Courses</h1>
  <a href="{{ route('courses.create') }}" class="btn btn-primary">+ New Course</a>
</div>

<div class="card">
  <div class="card-body">
    @if($courses->count())
      <div class="table-responsive">
        <table class="table align-middle">
          <thead><tr>
            <th>#</th><th>Name</th><th>Description</th><th class="text-end">Actions</th>
          </tr></thead>
          <tbody>
            @foreach($courses as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td class="fw-medium">{{ $course->name }}</td>
                <td class="text-muted">{{ \Illuminate\Support\Str::limit($course->description, 80) }}</td>
                <td class="text-end">
                  <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Delete this course?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="mb-0 text-muted">No courses yet. Create the first one!</p>
    @endif
  </div>
</div>
@endsection
