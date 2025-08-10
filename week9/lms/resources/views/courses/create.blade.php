@extends('layouts.admin')
@section('title','Add Course')
@section('content')
<a href="{{ route('courses.index') }}" class="btn btn-link mb-3">&larr; Back</a>

<div class="card">
  <div class="card-body">
    <h2 class="h4 mb-3">Create Course</h2>

    @if($errors->any())
      <div class="alert alert-danger">
        <strong>Please fix the following:</strong>
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST" novalidate>
      @csrf
      <div class="mb-3">
        <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}" required maxlength="150">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <button class="btn btn-success">Save</button>
      <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
