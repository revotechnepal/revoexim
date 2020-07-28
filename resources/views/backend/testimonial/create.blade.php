@extends('backend.layouts.app')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Create Testimonial <a href="{{route('admin.testimonial.index')}}" class="btn btn-primary ml-4"><i class="fas fa-eye"></i> View All Testimonials</a></li>
</ol>
    <div class="container">
        <div class="row justify-content-md-left py-5">
            @csrf
            <div class="col-md-6">
                <form action="{{route('admin.testimonial.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="company_name">company_Name</label>
                        <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                        <small class="text-danger">{{ $errors->first('company_name') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="post">Post</label>
                        <input type="text" class="form-control" name="post" placeholder="Postiton in Company">
                        <small class="text-danger">{{ $errors->first('post') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="summernote" name="message"></textarea>
                        <small class="text-danger">{{ $errors->first('message') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" name="image" id="image">
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>
                    <div class="from-group py-2">
                        <label for="status">Status</label><br>
                        <input class="ml-1" type="radio" name="status" value="1"> Yes
                        <input type="radio" name="status" value="0"> No
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
