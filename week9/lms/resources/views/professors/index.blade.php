@extends('layouts.admin')

@section('content')
<h1>Professors</h1>
<a href="{{ route('professors.create') }}">Add Professor</a>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach($professors as $professor)
        <tr>
            <td>{{ $professor->id }}</td>
            <td>{{ $professor->name }}</td>
            <td>
                <a href="{{ route('professors.show', $professor) }}">View</a>
                <a href="{{ route('professors.edit', $professor) }}">Edit</a>
                <form action="{{ route('professors.destroy', $professor) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this professor?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
