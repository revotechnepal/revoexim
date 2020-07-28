@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Settings</li>
</ol>
<section class="content">
    <div class="row">
        <div class="col-xs-12 px-5">
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#tab_1" data-toggle="tab">Generel Setting</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Social Media</a></li>
                    <li><a href="#tab_3" data-toggle="tab">About Us</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Service</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Address</a></li>
                </ul>
                <form action="{{ route('admin.settings.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sitename" class="col-sm-2 control-label">Site Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="site_name" class="form-control" id="sitename" value="{{ @$setting->site_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sitelogo" class="col-sm-2 control-label">Site Logo:</label>
                                    <div class="col-sm-10 col-md-6">
                                        <input type="file" name="site_logo" class="form-control" id="sitelogo" value="{{ @$setting->site_logo }}">
                                    </div>
                                    <div class="col-sm-10 col-md-4">
                                        @if(@$setting->site_logo)
                                            <img src="{{Storage::disk('uploads')->url(@$setting->site_logo) }}" style="height:50px; width:150px;" alt="">
                                        @else
                                        <img src="{{asset('frontend/images/logo.png')}}" alt="" style="height:50px; width:150px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sitefavicon" class="col-sm-2 control-label">Site Favicon:</label>
                                    <div class="col-sm-10 col-md-6">
                                        <input type="file" name="site_favicon" class="form-control" id="sitefavicon">
                                    </div>
                                    <div class="col-sm-10 col-md-4">
                                        @if(@$setting->site_favicon)
                                            <img src="{{Storage::disk('uploads')->url(@$setting->site_favicon) }}" style="height: 75px; width:75px;" alt="Site Favicon" class="img-responsive">
                                        @else
                                            <img src="{{ asset('frontend/images/favicon.ico') }}" style="height: 75px; width:75px;" alt="Site Logo" class="img-responsive" width="36">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="siteemail" class="col-sm-2 control-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="siteemail" value="{{ @$setting->email }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sitephone" class="col-sm-2 control-label">Phone:</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="phone" class="form-control" id="sitephone" value="{{ @$setting->phone }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_2">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sfacebook" class="col-sm-2 control-label">Facebook:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="facebook" class="form-control" id="sfacebook" value="{{ @$setting->facebook }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stwitter" class="col-sm-2 control-label">Twitter:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="twitter" class="form-control" id="stwitter" value="{{ @$setting->twitter }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slinkedin" class="col-sm-2 control-label">LinkedIn:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="linkedin" class="form-control" id="slinkedin" value="{{ @$setting->linkedin }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="instagram" class="col-sm-2 control-label">instagram:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="instagram" class="form-control" id="instagram" value="{{ @$setting->instagram }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="syoutube" class="col-sm-2 control-label">Youtube:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="youtube" class="form-control" id="syoutube" value="{{ @$setting->youtube }}">
                                    </div>
                                </div>

                                <small class="pull-right"><em>If you don't want to show a social media on front-end, just leave the input field blank.</em></small>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_3">
                            <div class="box-body">
                                <div class="aboutus">
                                    <label>About Us</label>
                                    <textarea class="textarea summernote" name="about" paceholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ @$setting->about }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_5">
                            <div class="box-body">
                                <div class="service">
                                    <label>Service</label>
                                    <textarea class="textarea summernote" name="service" paceholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ @$setting->service }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_4">
                            <div class="box-body">
                                <div class="address">
                                    <label>Address</label>
                                    <textarea class="textarea" name="address" value="Place some text here" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ @$setting->address }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" name="genarel" class="btn btn-info btn-flat">SAVE</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
