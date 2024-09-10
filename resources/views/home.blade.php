<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Data</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">All User List</h2>
                    <a href="{{ route('saveUser') }}" class="btn btn-success m-3">Add User</a>
                </div>
                <table class="table table-bordered table-striped table-hover table-fixed">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>City</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($data as $id => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->city }}</td>
                            <td><a href="{{ route('saveUser', $user->id)}}" class="btn btn-primary btn-sm">Update</a></td>
                            <td><a href="{{ route('delete.user', $user->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
                <div class="mt-5">
                    {{ $data->links('pagination::bootstrap-5') }}
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>