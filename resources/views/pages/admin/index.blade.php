@extends('layouts.parent')

@section('title', 'Dashboard - Admin')

@section('content')

    <div class="section dashboard">
        <!-- Customers Card -->
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Dashboard <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> | {{ Auth::user()->role }}</span></h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Customers Card -->
    </div>

    <div class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                {{-- category card --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end catagory card --}}
            </div>

            <div class="col-md-4">
                {{-- Product card --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-check-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $product }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end product card --}}
            </div>

            <div class="col-md-4">
                {{-- User card --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-person-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $user }}</h6>
                            </div>
                        </div>
                        <div class="">
                            <a href="{{ route('admin.userList') }}" class="btn btn-primary">See All User</a>
                        </div>  
                    </div>
                </div>
                {{-- end User card --}}
            </div>

        </div>
    </div>


@endsection
