@extends('layouts.dashboard')

@section('content')
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
            </ol>
        </div>

       <div class="col-lg-4 float-right">
        <div class="card">
        <div class="card-header">
            <h3>Add Category</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/category/insert')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="mt-3">
                  <label for="" class="form-label">Category Name</label>
                  <input type="text" class="form-control"name="category_name" >
              </div>
              @error('category_name')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
              <div class="mt-3">
                <label for="" class="form-label">Category Image</label>
                <input type="file" class="form-control"name="category_image" >
            </div>
            @error('category_image')
            <strong class="text-danger">{{$message}}</strong>
            @enderror

              <div class="mt-3">
                <button type="submit" class="btn btn-primary"> Add Category</button>
            </div>
            </form>
        </div>
    </div>
    </div>
        <div class="col-lg-8 float-left">
          <div class="card">
              <div class="card-header">
                  <h3> Category List</h3>
              </div>
              <div class="card-body">
                  <form action="{{route('Alldelete')}}" method="POST">
                    @csrf
                  <table class="table table-bordered" id="myTable">
                      <thead>
                          <tr>
                              <th><input type="checkbox" id="checkAll"> Mark All</th>
                              <th>SL</th>
                              <th>Category Name</th>
                              <th>Added By</th>
                              <th>Image</th>
                              <th>Created At</th>
                              <th> Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $index=>$category)
                            <tr>
                              <td><input type="checkbox" name="mark[]" value="{{$category->id}}"></td>
                              <td>{{$index+1}}</td>
                              <td>{{$category->category_name}}</td>
                              <td>
                              @php
                                  if(App\Models\User::where('id',$category->added_by)->exists()){
                                    echo $category->rel_to_user->name ;
                                  }
                                  else {
                                     echo'Unknown';
                                  }
                              @endphp
                            </td>
                            <td>
                                <img width="60" src="{{asset('/uploads/category')}}/{{$category->category_image}}" alt="">
                            </td>
                              <td>{{$category->created_at->diffForHumans()}}</td>
                              <td>
                                  <a href="{{route('Edit',$category->id)}}" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('SoftDelete',$category->id) }}" class="btn btn-danger btn-xs sharp mr-1"><i class="fa fa-close "></i></a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <button class="btn btn-danger">Mark All Delete</button>
                </form>

              </div>
          </div>
          <div class="card mt-5">
            <div class="card-header">
                <h3> Trashed Category List</h3>
            </div>
            <div class="card-body">
                <form action="{{route('AllRestore')}}" method="POST">
                    @csrf
                <table class="table table-bordered" id="TrashmyTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="rescheckAll"> Mark All</th>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Added By</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trash_categories as $index=>$category)
                        <tr>
                            <td><input type="checkbox" name="RestoreMark[]" value="{{$category->id}}"></td>
                            <td>{{$index+1}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                 @php
                                if(App\Models\User::where('id',$category->added_by)->exists()){
                                  echo $category->rel_to_user->name ;
                                }
                                else {
                                   echo'Unknown';
                                }
                            @endphp</td>
                              <td>
                                <img width="60" src="{{asset('/uploads/category')}}/{{$category->category_image}}" alt="">
                            </td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('Restore',$category->id)}}" class="btn btn-success btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('delete',$category->id) }}" class="btn btn-danger btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success"> All Restore</button>
            </form>
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
                {{-- all mark delete  --}}
<script>
    $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
                {{-- all mark restore  --}}
<script>
    $("#rescheckAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
                  {{-- data table show category table  --}}
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
                 {{-- data table show trashcategory table  --}}
<script>
    $(document).ready( function () {
    $('#TrashmyTable').DataTable();
} );
</script>

@endsection
