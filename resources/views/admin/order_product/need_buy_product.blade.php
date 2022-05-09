@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="card m-auto">
        <div class="card-header">
            <h3> Order List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Cagetory </th>
                        <th>Sub Category</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Product Price</th>
                        <th>Product code</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($need_product as $index=>$need_product)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            @php
                            if(App\Models\Category::where('id',$need_product->category_id)->exists()){
                              echo $need_product->rel_to_need_category_product->category_name;
                            }
                            else {
                               echo'Unknown';
                            }
                            @endphp
                            </td>
                        <td>
                            @php
                            if(App\Models\SubCategory::where('id',$need_product->subcategory_id)->exists()){
                              echo $need_product->rel_to_need_product->subcategory_name;
                            }
                            else {
                               echo'Unknown';
                            }
                            @endphp
                        </td>
                        <td>{{$need_product->product_name}}</td>
                        <td>{{$need_product->quantity}}</td>
                        <td>{{$need_product->product_price}}</td>
                        <td>{{$need_product->product_code}}</td>
                        <td>
                            <img width="80" src="{{asset('uploads/products/preview/'.$need_product->preview)}}" alt="{{$need_product->product_name}}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
@section('footer_script')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection
