@extends('admin.layouts.master')
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
                        <form action="{{ route('admin.general.smtp.settings') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="site_smtp_mail_host">SMTP Mail Host</label>
                                    <input type="text" name="site_smtp_mail_host"
                                        class="form-control  {{ $errors->has('site_smtp_mail_host') ? 'is-invalid' : '' }}"
                                        id="site_smtp_mail_host" value="{{ get_static_option('site_smtp_mail_host') }}"
                                        placeholder="Enter SMTP Mail Host">
                                    @error('site_smtp_mail_host')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_smtp_mail_port">SMTP Mail Port</label>
                                    <input type="text" name="site_smtp_mail_port"
                                        class="form-control  {{ $errors->has('site_smtp_mail_port') ? 'is-invalid' : '' }}"
                                        id="site_smtp_mail_port" value="{{ get_static_option('site_smtp_mail_port') }}"
                                        placeholder="Enter SMTP Mail Port">
                                    @error('site_smtp_mail_port')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_smtp_mail_username">SMTP Mail Username</label>
                                    <input type="text" name="site_smtp_mail_username"
                                        class="form-control  {{ $errors->has('site_smtp_mail_username') ? 'is-invalid' : '' }}"
                                        id="site_smtp_mail_username"
                                        value="{{ get_static_option('site_smtp_mail_username') }}"
                                        placeholder="Enter SMTP Mail Username">
                                    @error('site_smtp_mail_username')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_smtp_mail_password">SMTP Mail Password</label>
                                    <input type="password" name="site_smtp_mail_password"
                                        class="form-control  {{ $errors->has('site_smtp_mail_password') ? 'is-invalid' : '' }}"
                                        id="site_smtp_mail_password"
                                        value="{{ get_static_option('site_smtp_mail_password') }}"
                                        placeholder="Enter Mail Password">
                                    @error('site_smtp_mail_password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_smtp_mail_encryption">SMTP Mail Encryption</label>
                                    <input type="text" name="site_smtp_mail_encryption"
                                        class="form-control  {{ $errors->has('site_smtp_mail_encryption') ? 'is-invalid' : '' }}"
                                        id="site_smtp_mail_encryption"
                                        value="{{ get_static_option('site_smtp_mail_encryption') }}"
                                        placeholder="Enter SMTP Mail Encryption">
                                    @error('site_smtp_mail_encryption')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_smtp_mail_address">SMTP Mail Address</label>
                                    <input type="text" name="site_smtp_mail_address"
                                        class="form-control  {{ $errors->has('site_smtp_mail_address') ? 'is-invalid' : '' }}"
                                        id="site_smtp_mail_encryption"
                                        value="{{ get_static_option('site_smtp_mail_address') }}"
                                        placeholder="Enter SMTP Mail Address">
                                    @error('site_smtp_mail_address')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update SMTP Settings</button>
                            </div>
                            {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
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
