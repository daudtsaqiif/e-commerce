@extends('layouts.parent')

@section('title', 'Change - Password')

@section('content')
    <div class="card p-4">
        <h3 class="card-title">Change Password {{ Auth::user()->name }} <p class="badge bg-info text-dark text-left mt-2"><i class="bi bi-info-circle me-1"></i> | {{ Auth::user()->role }}</p></h3>
        <form action="{{ route('user.changePassword') }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input name="current_password" type="password" class="form-control" placeholder="Current Password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" placeholder="New Password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirmation Password</label>
                <div class="col-sm-10">
                    <input name="confrimation_password" type="password" class="form-control"
                        placeholder="Confirmation Password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Change Password</button>
        </form>
        <div class=" mt-3">
            <a href="{{ route('user.dashboard') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
@endsection
