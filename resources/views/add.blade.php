@extends('layout')

@section('title')
    Add Data
@endsection

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror"
                    id="inputName3" value="{{ old('user_name') }}">
            </div>
            <span class="text-danger">
                @error('user_name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="user_email" class="form-control @error('user_email') is-invalid @enderror"
                    id="inputEmail3" value="{{ old('user_email') }}">
            </div>
            <span class="text-danger">
                @error('user_email')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="row mb-3">
            <label for="inputAge3" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="number" name="user_age" class="form-control @error('user_age') is-invalid @enderror"
                    id="inputAge3" value="{{ old('user_age') }}">
            </div>
            <span class="text-danger">
                @error('user_age')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="row mb-3">
            <label for="inputStateCode3" class="col-sm-2 col-form-label">State Code</label>
            <div class="col-sm-10">
                <input type="text" name="user_state_code"
                    class="form-control @error('user_state_code') is-invalid @enderror" id="inputStateCode3"
                    value="{{ old('user_state_code') }}">
            </div>
            <span class="text-danger">
                @error('user_state_code')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="d-grid gap-4 d-md-block">
            <button type="submit" class="btn btn-success me-4">Submit</button>
            <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
        </div>
    </form>
@endsection
