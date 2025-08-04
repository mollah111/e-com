@extends('backend.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                            </div>
                            <form action="{{url('/admin/product/store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Product Name*</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name*" required>
                                    </div>
                                      <div class="form-group">
                                        <label for="name">Product Code</label>
                                        <input type="text" class="form-control" name="sku_code" id="sku_code" placeholder="Enter product code">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select Category*</label>
                                        <select name="cat_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                           <div class="form-group">
                                        <label for="name">Select Sub-Category</label>
                                        <select name="sub_cat_id" class="form-control">
                                            <option selected disabled>Select Sub-Category</option>
                                            @foreach ($subCategories as $subcategory)
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Quantity*</label>
                                        <input type="number" class="form-control" name="qty" id="qty" placeholder="Enter product quantity*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product buying price*</label>
                                        <input type="number" class="form-control" name="buying_price" id="buying_price" placeholder="Enter buying price*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product regular price*</label>
                                        <input type="number" class="form-control" name="regular_price" id="regular_price" placeholder="Enter regular price*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product discount price</label>
                                        <input type="number" class="form-control" name="discount_price" id="discount_price" placeholder="Enter discount price">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Description*</label>
                                        <textarea id="summernote" name="description" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Policy*</label>
                                        <textarea id="summernote2" name="policy" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select Product Type*</label>
                                        <select name="product_type" class="form-control">
                                            <option selected disabled>Select Type*</option>
                                            <option value="hot">Hot Products</option>                                          
                                            <option value="new">New Arrival</option>                                          
                                            <option value="regular">Regular Products</option>                                          
                                            <option value="discount">Discount Products</option>                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Product Image*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*" required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
<!-- Page specific script -->
<script>
    $(function () {
     image.init();
    });
</script>

<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    $(function () {
      // Summernote
      $('#summernote2').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
@endpush