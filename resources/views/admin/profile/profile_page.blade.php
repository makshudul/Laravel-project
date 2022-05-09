@extends('layouts.dashboard')

@section('content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-4">
              <div class="card border">
                  <div class="card-header">
                      <h3>Change Name</h3>
                  </div>
                  <div class="card-body">
                      <form action="{{route('profile_name_update')}}" method="POST">
                          @csrf
                          <div class="form-group">
                              <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">update</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="card border">
                <div class="card-header">
                    <h3>Change Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('profile_password_update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="password" class="form-control" name="old_password" placeholder="Enter Old Password">
                            @error('old_password')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                            @error('password')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirmation Password">
                            @error('password_confirmation')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border">
                <div class="card-header">
                    <h3>Change Photo</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('profile_photo_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="profile_photo">
                            @error('profile_photo')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
@section('footer_script')
@if (session('success'))
<script>
 const Toast = Swal.mixin({
  toast: true,
  position: 'top-center',
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
  title: '{{session('success')}}'
})
</script>
@endif
@if (session('wrong_password'))
<script>
 const Toast = Swal.mixin({
  toast: true,
  position: 'top-center',
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
  title: '{{session('wrong_password')}}'
})
</script>
@endif

@endsection
