@extends('layouts.parent')

@section('title', 'User')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="text-end">
            <p class="badge bg-info text-dark mt-2"><i class="bi bi-info-circle me-1"></i> | {{ Auth::user()->role }}</p>
        </div>
        <h5 class="text-center fs-4 fw-bold">Hallo {{ Auth::user()->name }}</h5> 
        <h4 class="text-center fs-5 fw-semibold"> {{ Auth::user()->email }}</h4>
        <p class="text-center fs-6 fw-medium">{{ Auth::user()->created_at }}</p>
    </div>
</div>

@endsection