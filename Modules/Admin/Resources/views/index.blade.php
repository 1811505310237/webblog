@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Tổng quan
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Tổng quan</li>
            </ol>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-fw fa-newspaper-o"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Bài viết</span>
                    <span class="info-box-number">{{ $tongBaiViet }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red">
                    <i class="fa fa-search" ></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Lượt xem</span>
                    <span class="info-box-number">{{ $tongLuotXem }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <i class="fa fa-user"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt truy cập</span>
                    <span class="info-box-number">{{ $total_visitor }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Mạng xã hội</span>
                    <span class="info-box-number">3</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
