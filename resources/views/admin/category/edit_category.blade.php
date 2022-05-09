 @extends('layouts.dashboard')

@section('content')
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"> Edit Category</a></li>
            </ol>
        </div>
<div class="col-lg-6 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/category/update')}}" method="POST">
                @csrf
              <div class="mt-3">
                  <label for="" class="form-label">Category Name</label>
                  <input type="hidden" class="form-control"name="id" value="{{$category_info->id}}" >
                  <input type="text" class="form-control"name="category_name" value="{{$category_info->category_name}}" >
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-primary"> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
