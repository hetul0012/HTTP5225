@extends('layouts.app') {{-- or whatever your base layout is --}}

@section('title', 'Professor Details')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <h3 class="mb-3">{{ $professor->name }}</h3>

            <dl class="row mb-4">
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $professor->email }}</dd>

                <dt class="col-sm-3">Department</dt>
                <dd class="col-sm-9">{{ $professor->department ?? '—' }}</dd>

                <dt class="col-sm-3">Created</dt>
                <dd class="col-sm-9">{{ $professor->created_at?->format('Y-m-d H:i') }}</dd>

                <dt class="col-sm-3">Updated</dt>
                <dd class="col-sm-9">{{ $professor->updated_at?->format('Y-m-d H:i') }}</dd>
            </dl>

            @if($professor->courses?->count())
                <h5 class="mb-3">Courses</h5>
                <ul class="list-group mb-4">
                    @foreach($professor->courses as $course)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $course->name }}</span>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('courses.show', $course) }}">View</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="d-flex gap-2">
                <a href="{{ route('professors.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('professors.edit', $professor) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('professors.destroy', $professor) }}" method="POST" onsubmit="return confirm('Delete this professor?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
