@extends('layouts.dashboard')

@section('content')
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Total </a></li>
                </ol>
            </div>
            <div class="row justify-content-center">
            <div class="col-lg-10 ">
            <div class="card">
                <div class="card-header">Welcome  -> {{$logged_user}}</div>
                </div>
            </div>
            <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                <h1 class="text-white">Total Product</h1>
                </div>
                <div class="card-body">
                   <h1 class="text-center text-success"> {{App\Models\Product::count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                <h1 class="text-white">Total Category</h1>
                </div>
                <div class="card-body">
                   <h1 class="text-center text-success"> {{App\Models\Category::count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                <h2 class="text-white">Total SubCategory</h2>
                </div>
                <div class="card-body">
                   <h1 class="text-center text-success"> {{App\Models\Subcategory::count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                <h1 class="text-white">Total Coupon</h1>
                </div>
                <div class="card-body">
                   <h1 class="text-center text-success"> {{App\Models\Coupon::count()}}</h1>
                </div>
            </div>
        </div>
         <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                <h1 class="text-white">Total Order</h1>
                </div>
                <div class="card-body">
                   <h1 class="text-center text-success"> {{App\Models\Order::count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                <h1 class="text-white">Total User</h1>
                </div>
                <div class="card-body">
                   <h1 class="text-center text-success"> {{App\Models\CustomerLogin::count()}}</h1>
                </div>
            </div>
        </div>
        </div>
@endsection

