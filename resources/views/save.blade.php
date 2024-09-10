<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student @php echo isset($data->id) && $data->id ? 'Update User' : 'Add User'; @endphp Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">@php echo isset($data->id) && $data->id ? 'Update User' : 'Add User'; @endphp </h2>
                    <a href="{{ route('home')}}" class="btn btn-secondary m-3">Cancel</a>
                </div>
                {{-- @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
                <form action="{{route('save.user', $data->id ?? null)}}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="floatingInput" value="{{ $data->name ?? old('student_name') }}" name="student_name" placeholder=" Your Full Name Here">
                        <label for="floatingInput">Name</label>
                        <span class="text-danger">
                            @error('student_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('student_email') is-invalid @enderror" id="floatingInput" value="{{ $data->email ?? old('student_email') }}" name="student_email" placeholder="Your Email">
                        <label for="floatingInput">Email</label>
                        <span class="text-danger">
                            @error('student_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('student_age') is-invalid @enderror" id="floatingInput" value="{{ $data->age ?? old('student_age') }}" name="student_age" placeholder="Your Age">
                        <label for="floatingInput">Age</label>
                        <span class="text-danger">
                            @error('student_age')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('student_city') is-invalid @enderror" id="floatingInput" value="{{ $data->city ?? old('student_city')}}" name="student_city" placeholder="Your City">
                        <label for="floatingInput">City</label>
                        <span class="text-danger">
                            @error('student_city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>