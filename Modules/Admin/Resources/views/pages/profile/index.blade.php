@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Thông tin cá nhân
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Chỉnh sửa thông tin cá nhân</li>
            </ol>
        </div>
    </div>
    <form class="form-horizontal" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Thông tin cá nhân</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{get_data_user('web', 'name')}}" required name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{get_data_user('web', 'email')}}" required name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="{{get_data_user('web', 'birthday')}}" required name="birthday">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{get_data_user('web', 'address')}}" required name="address">
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Ảnh đại diện</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Ảnh</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="avatar" onchange="loadImg()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Preview</label>
                            <div class="col-sm-10">
                                <img src="{{ asset(get_data_user('web', 'avatar')) }}" alt="preview" id="frame" width="200px" style="border: 1px solid #ddd; padding: 5px" />
                                {{-- <img src="https://placehold.co/600x400" alt="preview" id="frame" width="200px" style="border: 1px solid #ddd; padding: 5px" /> --}}
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info">Lưu thông tin</button>
        </div>
        <!-- /.box-footer -->
        @csrf
    </form>
@endsection
@section('script')
    <script>
        function loadImg(){
            $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
@endsection