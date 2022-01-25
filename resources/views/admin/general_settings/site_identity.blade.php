@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('backend/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/media-uploader.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SMTP Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">SMTP Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('admin.partials._msg')

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">SMTP Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.general.site.identity') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="site_logo"><strong>{{ __('Site Logo') }}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $blog_img = get_attachment_image_by_id(get_static_option('site_logo'), null, true);
                                                $blog_image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($blog_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                src="{{ $blog_img['img_url'] }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $blog_image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="site_logo" name="site_logo"
                                            value="{{ get_static_option('site_logo') }}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                            data-btntitle="Select Site Logo Image" data-modaltitle="Upload Site Logo Image"
                                            data-toggle="modal" data-target="#media_upload_modal">
                                            {{ __($blog_image_btn_label) }}
                                        </button>
                                    </div>
                                    <small
                                        class="form-text text-muted">{{ __('allowed image format: jpg,jpeg,png. Recommended image size 160x50') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="site_white_logo"><strong>{{__('White Site Logo')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $site_white_logo = get_attachment_image_by_id(get_static_option('site_white_logo'),null,true);
                                                $site_white_logo_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($site_white_logo))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$site_white_logo['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $site_white_logo_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="site_white_logo" name="site_white_logo" value="{{get_static_option('site_white_logo')}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Site Logo Image" data-modaltitle="Upload Site Logo Image" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($site_white_logo_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="site_favicon">{{__('Favicon')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'),null,true);
                                                $site_favicon_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($site_favicon))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$site_favicon['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $site_favicon_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="site_favicon" name="site_favicon" value="{{get_static_option('site_favicon')}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Site Favicon Image" data-modaltitle="Upload Site Favicon Image" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($site_favicon_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 40x40')}}</small>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit"
                                    class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Changes') }}</button>
                            </div>
                            {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @include('admin.partials.media-upload.media-upload-markup')
@endsection
@section('scripts')
    <!-- dropzonejs -->
    @include('admin.partials.media-upload.media-js')
    <script>
        $(function() {
            bsCustomFileInput.init();

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // DropzoneJS Demo Code End
    </script>
@endsection
