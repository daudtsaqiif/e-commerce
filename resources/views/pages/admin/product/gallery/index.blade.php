@extends('layouts.parent')

@section('title', 'Product - Gallery')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery --> {{ $product->name }}</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Data Product Gallery</li>
                </ol>
            </nav>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                <i class="bi bi-plus"></i> Product gallery          
            </button>
        @include('pages.admin.product.gallery.modal-create')

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
