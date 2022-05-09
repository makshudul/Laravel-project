@extends('layouts.dashboard')

@section('content')


<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card border">
            <div class="card-header">
                <h3>Add User</h3>
            </div>
            <div class="card-body">
                <form action="{{route('users_insert')}}" method="POST">
                    @csrf
                    <div class="form-group input-warning-o">
                        <input type="text" class="form-control input-warning-o" name="name"  placeholder="Enter Name">
                        @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    </div>
                    <div class="form-group mt-2 input-warning-o">
                        <input type="email" class="form-control" name="email"  placeholder="Enter Email">
                        @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    </div>
                    <div class="form-group mt-2 input-warning-o">
                        <input type="password" class="form-control" name="password"  placeholder="Enter password">
                        @error('password')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    </div>
                    <div class="form-group mt-2 input-warning-o">
                        <input type="password" class="form-control" name="confrom_password"  placeholder="Enter confrom Password">
                        @error('confrom_password')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    </div>
                    <div class="form-group input-danger-o">
                        <select name="role" class="form-control default-select" id="category_id">
                          <option value=""><----- Select Role-----></option>
                          <option value="1">Super Admin</option>
                          <option value="2">Admin</option>
                          <option value="3">User</option>
                        </select>
                        @error('role')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
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
@endsection
