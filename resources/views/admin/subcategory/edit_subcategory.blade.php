@extends('layouts.dashboard')

@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
             <h3>Add Subcategory</h3>
        </div>
        <div class="card-body">

            <form action="" method="POST">
                @csrf
                <div class="mt-3">
                     <select name="category_id" class="form-control">
                         <option value="">-------- Select Category----</option>
                         @foreach ($categories as $category)
                         <option value="{{$categories->id}}">{{$categories->category_name}} </option>
                         @endforeach
                     </select>
                </div>
                <div class="mt-3">
                    <label for="" class="for-label"> Sub Category</label>
                    <input type="text" class="form-control" name="subcategory_name" required value="{{$subcategory_info->subcategory_name}}">
                </div>
                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
