@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Testimonial <a href="{{route('admin.testimonial.index')}}" class="btn btn-primary ml-4"><i class="fas fa-eye"></i> View All Testimonials</a> <a href="{{route('admin.testimonial.create')}}" class="btn btn-success ml-4"><i class="fas fa-plus"></i> Add New Testimonial</a></li>
</ol>
    <div class="container">
        <div class="row justify-content-md-center py-5">
            @csrf
            <div class="col-md-6">
                <form action="{{route('admin.testimonial.update', $testimonial->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$testimonial->name}}" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" value="{{$testimonial->company_name}}" name="company_name" placeholder="Company Name">
                    </div>
                    <div class="form-group">
                        <label for="post">Post</label>
                        <input type="text" class="form-control" value="{{$testimonial->post}}" name="post" placeholder="Position in Company">
                    </div>
                    <div class="form-group">
                        <label for="message">message</label>
                        <textarea class="form-control" id="summernote" name="message">{{$testimonial->message}}</textarea>
                    </div>
                    <div class="form-group">
                        <img src="{{Storage::disk('uploads')->url($testimonial->image)}}" alt="" style="height:100px; width:100px;">
                        <label for="image">Select Image</label>
                        <input type="file" name="image" id="image">

                    </div>
                    <div class="from-group py-2">
                        <label for="status">Status</label><br>
                        <input class="ml-1" {{$testimonial->status == 1 ? 'checked' : ''}} type="radio" name="status" value="1"> Yes
                        <input type="radio" {{$testimonial->status == 0 ? 'checked' : ''}} name="status" value="0"> No
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
