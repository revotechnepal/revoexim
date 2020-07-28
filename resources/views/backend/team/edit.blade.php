@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Team <a href="{{route('admin.team.index')}}" class="btn btn-primary ml-4"><i class="fas fa-eye"></i> View All Teams</a> <a href="{{route('admin.team.create')}}" class="btn btn-success ml-4"><i class="fas fa-plus"></i> Add New Team</a></li>
</ol>
    <div class="container">
        <div class="row justify-content-md-left py-5">
            @csrf
            <div class="col-md-6">
                <form action="{{route('admin.team.update', $team->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$team->name}}" placeholder="Full Name">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="post">Post</label>
                        <input type="text" class="form-control" value="{{$team->post}}" name="post" placeholder="Position in Company">
                        <small class="text-danger">{{ $errors->first('post') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="summernote" name="details">{{$team->details}}</textarea>
                        <small class="text-danger">{{ $errors->first('details') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" value="{{$team->facebook}}" name="facebook" placeholder="Facebook Link">
                        <small class="text-danger">{{ $errors->first('facebook') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" value="{{$team->twitter}}" name="twitter" placeholder="Twitter Link">
                        <small class="text-danger">{{ $errors->first('twitter') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" value="{{$team->instagram}}" name="instagram" placeholder="Instagram Link">
                        <small class="text-danger">{{ $errors->first('instagram') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linked In</label>
                        <input type="text" class="form-control" value="{{$team->linkedin}}" name="linkedin" placeholder="Linked In Link">
                        <small class="text-danger">{{ $errors->first('linkedin') }}</small>
                    </div>
                    <div class="form-group">
                        <img src="{{Storage::disk('uploads')->url($team->image)}}" alt="" style="height:100px; width:100px;">
                        <label for="image">Select Image</label>
                        <input type="file" name="image" id="image">
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>
                    <div class="from-group py-2">
                        <label for="status">Status</label><br>
                        <input class="ml-1" {{$team->status == 1 ? 'checked' : ''}} type="radio" name="status" value="1"> Yes
                        <input type="radio" {{$team->status == 0 ? 'checked' : ''}} name="status" value="0"> No
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
