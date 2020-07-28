@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Create Team <a href="{{route('admin.team.index')}}" class="btn btn-primary ml-4"><i class="fas fa-eye"></i> View All Teams</a></li>
</ol>
    <div class="container">
        <div class="row justify-content-md-left py-5">
            @csrf
            <div class="col-md-6">
                <form action="{{route('admin.team.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="post">Post</label>
                        <input type="text" class="form-control" name="post" placeholder="Postiton in Company">
                        <small class="text-danger">{{ $errors->first('post') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="summernote" name="details"></textarea>
                        <small class="text-danger">{{ $errors->first('details') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" placeholder="facebook Link">
                        <small class="text-danger">{{ $errors->first('facebook') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name="twitter" placeholder="Twitter Link">
                        <small class="text-danger">{{ $errors->first('twitter') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" placeholder="Instagram Link">
                        <small class="text-danger">{{ $errors->first('instagram') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linked In</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Linked In Link">
                        <small class="text-danger">{{ $errors->first('linkedin') }}</small>
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
