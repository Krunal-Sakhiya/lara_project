<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link " aria-current="page"
                        href="{{ route('home') }}">Query Builder</a>
                    <a class="flex-sm-fill text-sm-center nav-link active" href="{{ route('users.index') }}">ORM</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 bg-success-subtle text-center py-2 mb-4">
                <h2>Eloquent ORM CRUD</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-8 bg-waring-subtle mb-3">
                <h4>@yield('title')</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
