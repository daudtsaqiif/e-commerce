@extends('layouts.parent')

@section('title', 'My Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">MyTransaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction </div>

            <table class="table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
