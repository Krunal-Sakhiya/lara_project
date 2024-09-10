@extends('layout')

@section('title')
    All User Data
@endsection

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm mb-3">Add New</a>
    <table class="table table-bordered table-striped table-hover table-fixed">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>State Code</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($users as $id => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->state_code }}</td>
                <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">View</a></td>
                <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                <td>
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-5">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
@endsection
