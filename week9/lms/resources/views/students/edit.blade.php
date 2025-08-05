@extends('admin')

@section('content')
    <h1>Update Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        {{ csrf_field() }}
        @method('PUT')

        <input type="text" name="fname" placeholder="First Name" value="{{ $student->fname }}">
        <input type="text" name="lname" placeholder="Last Name" value="{{ $student->lname }}">
        <input type="email" name="email" placeholder="Email" value="{{ $student->email }}">
        <input type="submit" value="Update">
    </form>
@endsection
