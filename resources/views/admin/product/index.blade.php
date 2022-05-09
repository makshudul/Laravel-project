@extends('layouts.dashboard')

@section('content')
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                          <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.insert')}}"method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          <select name="category_id" class="form-control default-select" id="category_id">
                                            <option value=""><----- Select Category-----></option>
                                            @foreach ($categories as $categories)
                                            <option value="{{$categories->id}}">{{$categories->category_name}}</option>
                                            @endforeach

                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <select name="subcategory_id" id="subcategory" class="form-control ">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Product Name </label>
                                        <input type="text" class="form-control" name="product_name" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Product Quantity </label>
                                        <input type="text" class="form-control" name="quantity"  >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Product Price </label>
                                        <input type="text" class="form-control" name="product_price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Product Discount </label>
                                        <input type="text" class="form-control" name="product_discount" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Product Code </label>
                                        <input type="text" class="form-control" name="product_code" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="form-label">Preview Image </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-8 ">
                                <label for="" class="form-label">Thumbnails Image </label>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" name="thumbnails[]" multiple>
                                    <label class="custom-file-label">Choose file</label>
                                </div>

                              </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group">
                                        <label for="" class="form-label">Short Description </label>
                                        <input type="text" class="form-control" name="short_desp">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Long Description </label>
                                        <textarea name="long_desp" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                     <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                         </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('footer_script')
<script>
            $('#category_id').change(function(){
                var category_id=$(this).val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getSubcategory',
                data:{'category_id':category_id},
                success:function(data){
                   $('#subcategory').html(data);

                }

            });



})
</script>
@if (session('product_added'))
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: '{{session('product_added')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
@endsection
