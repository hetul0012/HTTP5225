@extends('layouts.admin')
@section('title','Edit Professor')

@section('content')
  <h1>Edit Professor</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('professors.update', $professor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input id="name"
             type="text"
             name="name"
             value="{{ old('name', $professor->name) }}"
             class="form-control @error('name') is-invalid @enderror"
             required maxlength="150">
      @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
