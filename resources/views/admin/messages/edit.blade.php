@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('messages.index') }}">Messages</a></li>
                    <li class="active">Edit Message</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('admin.partials._msg')
                    <h3 class="box-title m-b-0">Edit Message -> {{ $message->subject}}</h3>
                    {{ Form::model($message, ['method' => 'PATCH','route' => ['messages.update', $message->id],
                    'class'=>'form-horizontal'])}}
                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-4">
                            {{ Form::text('subject', null, ['class' => 'form-control','id'=>'subject',
                            'placeholder'=>'Enter subject']) }}
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-4">
                            {{ Form::textarea('description', null, ['class' => 'form-control','id'=>'description',
                            'placeholder'=>'Enter messages']) }}
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('messages.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Save</button>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@stop

