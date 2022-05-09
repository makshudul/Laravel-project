@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="card m-auto">
        <div class="text-center mt-3 ">
            @php
                $product=App\Models\Order::sum('total');
            @endphp
            <h1 class="text-info">Total sold: <span class="text-danger">{{$product}}</span> </h1>
        </div>
        <div class="card-header">
            <h3> Order List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Discount</th>
                        <th>Delivery Charge</th>
                        <th>Total</th>
                        <th>Payment Method</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_info as $index=>$order_info)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$order_info->discount}}</td>
                        <td>
                            @php
                            if($order_info->delivery_charge==100){
                                echo'Out of City';
                            }
                            else if($order_info->delivery_charge==60){
                                echo'In city';
                            }
                        @endphp
                        <td>{{$order_info->total}}</td>
                        <td>
                            @php
                                if($order_info->payment_method==1){
                                    echo'Cash On Delivery';
                                }
                                else if($order_info->payment_method==2){
                                    echo'SSL';
                                }
                            @endphp
                        </td>
                        <td>{{$order_info->created_at->diffForHumans()}}</td>
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
