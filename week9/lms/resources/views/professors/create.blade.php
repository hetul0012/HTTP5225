@extends('layouts.admin')
@section('title','Add Professor')

@section('content')
  <h1>Add Professor</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('professors.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input id="name"
             type="text"
             name="name"
             value="{{ old('name') }}"
             class="form-control @error('name') is-invalid @enderror"
             required maxlength="150">
      @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
