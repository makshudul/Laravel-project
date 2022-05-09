@extends('layouts.dashboard')

@section('content')
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                </ol>
            </div>
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">Welcome  -> {{$logged_user}}<span class="float-end"> Total ( {{$total_user}} )</span></div>

                   <div class="card-body">
                       <table class="table table-bordered">
                         <tr>
                             <th> SL</th>
                             <th> Name</th>
                             <th> Email</th>
                             <th> Create Date </th>
                             <th>Action</th>
                         </tr>
                         @foreach ($user_all_data as $key=>$user)
                         <tr>
                             <td>{{$key+1}}</td>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->created_at-> diffForHumans()}}</td>
                             <td>
                                <a href="{{url('/user/edit')}}/{{$user->id}}" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                 <button class="btn btn-danger btn-xs sharp mr-1 delete" name="{{'/user/delete'}}/{{$user->id}}"><i class="fa fa-trash"></i></button>

                             </td>
                         </tr>
                        @endforeach

                       </table>
                   </div>
                </div>
            </div>
        </div>
@endsection

@section('footer_script')
 <script>
  $('.delete').click(function(){
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
      var link = $(this).attr('name');
      window.location.href =link;
  }
  })
  })
 </script>
 @if(session('success'))
 <script>
 Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
 )
 </script>
 @endif
 @endsection
