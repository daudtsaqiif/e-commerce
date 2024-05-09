@extends('layouts.parent')

@section('title', 'User - List')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">User List</h5>
        <table class="table ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <form action="{{ route('admin.resetPassword', $u->id)  }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-pencil"></i>
                                    Reset Password</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"> Data is Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>
@endsection