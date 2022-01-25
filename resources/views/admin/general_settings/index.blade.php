@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
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
                            <h3 class="card-title">Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ route('setting.store') }}"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="card-body">
                                <!-- /.card-header -->
                                <!-- form start -->
                                @foreach ($all_columns as $column)
                                    @if ($column['type'] == 'file')
                                        <div class="form-group">
                                            <label for="name">{{ $column['label'] }}</label>
                                            <?php
                                            if (isset($settings[$column['name']])) {
                                                $settings[$column['name']] = $settings[$column['name']];
                                            } else {
                                                $settings[$column['name']] = 'abc.png';
                                            }
                                            ?>
                                            <input type="file" name="{{ $column['name'] }}" class="{{ $column['class'] }}"
                                                id="{{ $column['id'] }}">
                                            @if (File::exists('uploads/' . $settings[$column['name']]))
                                                <img src="{{ asset('uploads/' . $settings[$column['name']]) }}"
                                                    style="{{ $column['style'] }}"
                                                    alt="{{ $column['name'] }} is not found" />
                                            @else
                                                <img src="{{ asset('uploads/img.png') }}" style="{{ $column['style'] }}"
                                                    alt="{{ $column['name'] }} is not found" />
                                            @endif
                                        </div>
                                    @endif

                                    @if ($column['type'] == 'text')
                                        <div class="form-group">
                                            <label for="{{ $column['id'] }}">{{ $column['label'] }}</label>
                                            <input type="text" name="{{ $column['name'] }}"
                                                placeholder="{{ $column['place_holder'] }}"
                                                value="{{ isset($settings[$column['name']]) ? $settings[$column['name']] : '' }}"
                                                class="{{ $column['class'] }}" id="{{ $column['id'] }}">
                                        </div>
                                    @endif
                                    @if ($column['type'] == 'hidden')

                                        <input type="hidden" name="{{ $column['name'] }}"
                                            value="{{ isset($settings[$column['name']]) ? $settings[$column['name']] : '' }}">
                                    @endif
                                    @if ($column['type'] == 'textarea')
                                        <div class="form-group">
                                            <label for="{{ $column['id'] }}">{{ $column['label'] }}</label>
                                            <textarea name="{{ $column['name'] }}" class="{{ $column['class'] }}"
                                                rows="{{ isset($column['rows']) ? $column['rows'] : '2' }}"
                                                placeholder="{{ $column['place_holder'] }}"
                                                id="{{ $column['id'] }}">{{ isset($settings[$column['name']]) ? $settings[$column['name']] : '' }}</textarea>
                                        </div>
                                    @endif
                                    @if ($column['type'] == 'checkbox')
                                        <div class="form-group">
                                            <label class="control-label">{{ $column['label'] }}</label>
                                            <label>
                                                <input type="checkbox" name="{{ $column['name'] }}"
                                                    class="{{ $column['class'] }}" <?php if (isset($settings[$column['name']]) and $settings[$column['name']] == '1') {
    echo 'checked';
} ?>
                                                    id="{{ $column['id'] }}" data-color="#13dafe" data-size="small" />

                                                <span class="lbl"></span>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="form-group m-b-0">
                                    <div class="text-center">
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="btn btn-info waves-effect waves-light
                                 m-t-10"><i
                                                class="fa fa-backward"></i> Back</a>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                            <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
