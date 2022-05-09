@extends('layouts.dashboard')

@section('content')
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Show Product</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                          <h3>Show Product</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">SL No</th>
                                        <th>Category Name </th>
                                        <th>Product Name </th>
                                        <th>Image </th>
                                        <th>Quantity</th>
                                        <th>Short Description</th>
                                        <th>Product Price</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product as $product )
                                    <tr>
                                        <td><strong>{{$product->id}} </strong></td>
                                        <td>{{$product->rel_to_category->category_name}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>
                                            <img width="80" src="{{asset('uploads/products/preview/'.$product->preview)}}" alt="{{$product->product_name}}">
                                        </td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{ Str::limit($product->short_desp,20,'.....') }}</td>
                                        <td> {{$product->product_price}} </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="" class="btn btn-success btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a href="" class="btn btn-danger btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

