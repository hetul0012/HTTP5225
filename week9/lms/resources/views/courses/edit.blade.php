@extends('layouts.admin')
@section('title','Edit Course')
@section('content')
<a href="{{ route('courses.index') }}" class="btn btn-link mb-3">&larr; Back</a>

<div class="card">
  <div class="card-body">
    <h2 class="h4 mb-3">Edit Course</h2>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST" novalidate>
      @csrf @method('PUT')

      <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $course->name) }}" required maxlength="150">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <button class="btn btn-primary">Update</button>
      <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
