@extends('layout')

@section('title')
    View Data
@endsection

@section('content')
    <div class="row mb-3">
        <label for="inputText3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputText3" value="{{ $user->name }}" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputText3" value="{{ $user->email }}" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText3" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputText3" value="{{ $user->age }}" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText3" class="col-sm-2 col-form-label">State Code</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputText3" value="{{ $user->state_code }}" disabled>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
@endsection
