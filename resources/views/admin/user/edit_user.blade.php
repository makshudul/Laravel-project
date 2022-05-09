@extends('layouts.dashboard')

@section('content')
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
                </ol>
            </div>

<section>
      <div class="row">
         <div class="col-lg-8 m-auto">
             <div class="card">
                 <div class="card-header">
                     <h1> Edit User</h1>
                 </div>
                 <div class="card-body">
                     <form action="{{('/user/update')}}" method="POST">
                        @csrf
                         <div class="mt-3">
                             <label for="" class="form-label">Name</label>
                             <input type="hidden" value="{{$user_info->id}}" name="id" class="form-control">  {{-- this input use for id (it use update user) --}}
                             <input type="text" value="{{$user_info->name}}" name="name" class="form-control">
                         </div>
                         <div class="mt-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" value="{{$user_info->email}}" name="email" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                     </form>
                 </div>
             </div>
         </div>
    </div>
</section>
@endsection

@section('footer_script')
@if(session('update'))
 <script>
 Swal.fire(
      'Update!',
      '{{session('update')}}',
      'success'
 )
 </script>
 @endif
@endsection
