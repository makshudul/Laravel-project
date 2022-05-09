@extends('layouts.dashboard')

@section('content')
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Subcategory</a></li>
            </ol>
        </div>

      <div class="col-lg-3 float-right">
      <div class="card">
        <div class="card-header">
             <h3>Add Subcategory</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('Subcategory.insert') }}" method="POST">
                @csrf
                <div class="mt-3">
                     <select name="category_id" class="form-control">
                         <option value="">-------- Select Category----</option>
                         @foreach ($categories as $category)
                         <option value="{{$category->id}}">{{$category->category_name}} </option>
                         @endforeach
                     </select>
                </div>
                <div class="mt-3">
                    <label for="" class="for-label"> Sub Category</label>
                    <input type="text" class="form-control" name="subcategory_name" required>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>

            </form>
        </div>
      </div>
      </div>
        <div class="col-lg-9 float-left">
            <div class="card">
                <div class="card-header">
                    <h3>Sub Category List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $index=>$subcategory)
                            <tr>
                                <td>{{$index+1}}</td>
                                {{-- <td>{{$subcategory->rel_to_category->category_name}}</td> --}}
                                <td>
                                    @php
                                    if(App\Models\Category::where('id',$subcategory->category_id)->exists()){
                                      echo $subcategory->rel_to_category->category_name;
                                    }
                                    else {
                                       echo'Unknown';
                                    }
                                @endphp
                                </td>
                                <td>{{$subcategory->subcategory_name}}</td>
                                <td>
                                    @php
                                    if(App\Models\User::where('id',$subcategory->added_by)->exists()){
                                      echo $subcategory->rel_to_user->name;
                                    }
                                    else {
                                       echo'Unknown';
                                    }
                                @endphp
                                </td>
                                <td>{{$subcategory->created_at->diffForHumans()}}</td>
                                <td>
                                  <a href="{{route('Edit',$category->id)}}" class=""></a>

                                    <a href="{{route('SubEdit.category',$subcategory->id)}}" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('SubSoftDelete',$subcategory->id) }}" class="btn btn-danger btn-xs sharp mr-1"><i class="fa fa-close "></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h3> Trashed Sub Category List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Trustsubcategories as $index=>$subcategory)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    @php
                                    if(App\Models\Category::where('id',$subcategory->category_id)->exists()){
                                      echo $subcategory->rel_to_category->category_name;
                                    }
                                    else {
                                       echo'Unknown';
                                    }
                                @endphp
                                </td>
                                <td>{{$subcategory->subcategory_name}}</td>
                                <td>
                                    @php
                                    if(App\Models\User::where('id',$subcategory->added_by)->exists()){
                                      echo $subcategory->rel_to_user->name;
                                    }
                                    else {
                                       echo'Unknown';
                                    }
                                @endphp
                                </td>
                                <td>{{$subcategory->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('SubRestore',$subcategory->id)}}" class="btn btn-success btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('Subdelete',$subcategory->id) }}" class="btn btn-danger btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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
@if (session('success'))
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: '{{session('success')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
@endsection
