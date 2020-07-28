@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Service <a href="{{route('admin.service.index')}}" class="btn btn-primary ml-4"><i class="fas fa-eye"></i> View All Services</a> <a href="{{route('admin.service.create')}}" class="btn btn-success ml-4"><i class="fas fa-plus"></i> Add New Service</a></li>
</ol>
    <div class="container">
        <div class="row justify-content-md-left py-5">
            @csrf
            <div class="col-md-6">
                <form action="{{route('admin.service.update', $service->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$service->title}}" placeholder="Service Title">
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="summernote" name="details">{{$service->details}}</textarea>
                        <small class="text-danger">{{ $errors->first('details') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" value="{{$service->icon}}" name="icon" placeholder="Service Icon">
                        <small class="text-danger">{{ $errors->first('icon') }}</small>
                    </div>
                    <div class="from-group py-2">
                        <label for="status">Status</label><br>
                        <input class="ml-1" {{$service->status == 1 ? 'checked' : ''}} type="radio" name="status" value="1"> Yes
                        <input type="radio" {{$service->status == 0 ? 'checked' : ''}} name="status" value="0"> No
                        <br>
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                    <div class="from-group py-2">
                        <label for="featured">Featured</label><br>
                        <input class="ml-1" type="radio" {{$service->featured == 1 ? 'checked' : ''}} name="featured" value="1"> Yes
                        <input type="radio" name="featured" {{$service->featured == 0 ? 'checked' : ''}} value="0"> No
                        <br>
                        <small class="text-danger">{{ $errors->first('featured') }}</small>
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
