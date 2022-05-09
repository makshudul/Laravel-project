@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)"> Add Coupon</a></li>
    </ol>
</div>
<div class="row">
<div class="col-lg-4">
<div class="card">
<div class="card-header">
    <h3>Add Coupon</h3>
</div>
<div class="card-body">
    <form action="{{route('backend.coupon_insert')}}" method="POST">
        @csrf
      <div class="mt-3">
          <label for="" class="form-label">Coupon Code</label>
          <input type="text" class="form-control"name="coupon_code" >
      </div>
      <div class="mt-3">
        <label for="" class="form-label">Coupon Discount % </label>
        <input type="text" class="form-control"name="discount" >
    </div>
    <div class="mt-3">
        <label for="" class="form-label">Coupon Validity</label>
        <input type="date" class="form-control"name="validity" >
    </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
    </form>
</div>
</div>
</div>
<div class="col-lg-8">
    <div class="card">
    <div class="card-header">
        <h3>Coupon List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Coupon Code</th>
                <th>Discount % </th>
                <th>Validity</th>
            </tr>
            @foreach ($coupon as $key=>$coupon )

            <tr>
                <td>{{$key+1}}</td>
                <td>{{$coupon->coupon_code}}</td>
                <td>{{$coupon->discount}}</td>
                <td>{{$coupon->validity}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
    </div>
</div>

@endsection

@section('footer_script')
{{-- // this is sweet aleart --}}
@if (session('coupon_add'))
<script>
 const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '{{session('coupon_add')}}'
})
</script>
@endif
@endsection
