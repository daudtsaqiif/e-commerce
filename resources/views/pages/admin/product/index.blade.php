@extends('layouts.parent')

@section('title', 'Product')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product</h5>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
                <li class="breadcrumb-item active">Data Product</li>
            </ol>
        </nav>

        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createModalProduct">
            Add Product
            <i class="bi bi-plus"></i>
        </button>

        <table class="table datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>
                            <img src="{{ url('storage/category/', $row->image) }}" alt="{{ $row->name }}" class="img-thumbnail" width="250">
                        </td>
                        <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#editModalCategory{{ $row->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            @include('pages.admin.category.modal-edit')
                            <form action="{{ route('admin.category.destroy', $row->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center"> Data is Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection