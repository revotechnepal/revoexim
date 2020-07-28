@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Product <a href="{{route('admin.product.index')}}" class="btn btn-primary ml-4"><i class="fas fa-eye"></i> View All Products</a> <a href="{{route('admin.product.create')}}" class="btn btn-success ml-4"><i class="fas fa-plus"></i> Add New Product</a></li>
</ol>
    <div class="container">
        <div class="row justify-content-md-left py-5">
            @csrf
            <div class="col-md-6">
                <form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$product->title}}" placeholder="Product Title">
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="summernote" name="details">{{$product->details}}</textarea>
                        <small class="text-danger">{{ $errors->first('details') }}</small>
                    </div>
                    <div class="form-group">
                        <img src="{{Storage::disk('uploads')->url($product->image)}}" alt="" style="height:100px; width:100px;">
                        <label for="image">Select Image</label>
                        <input type="file" name="image" id="image">
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>
                    <div class="from-group py-2">
                        <label for="status">Status</label><br>
                        <input class="ml-1" {{$product->status == 1 ? 'checked' : ''}} type="radio" name="status" value="1"> Yes
                        <input type="radio" {{$product->status == 0 ? 'checked' : ''}} name="status" value="0"> No
                        <br>
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection
