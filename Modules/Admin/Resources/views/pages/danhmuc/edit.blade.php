@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý danh mục
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Sửa danh mục</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.danhmuc.update') }}" role="form" id="danhmucForm" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="dm_tenDanhMuc" value="{{ $danhmuc->dm_tenDanhMuc }}">
                        </div>
                        <div class="form-group">
                            <label>Kích hoạt</label>
                            <select name="dm_status" class="form-control">
                                <option {{($danhmuc->dm_status == 1)? 'selected':false}} value="1">Active</option>
                                <option {{($danhmuc->dm_status == 0)? 'selected':false}} value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                        <a href="{{ route('admin.danhmuc.index') }}" class="btn btn-danger">Trở lại</a>
                    </div>
                    <input type="hidden" name="id" value="{{ $danhmuc->id }}">
                    
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            // validate signup form on keyup and submit
            $("#danhmucForm").validate({
                rules: {
                    dm_tenDanhMuc: {
                        required: true,
                        normalizer: function( value ) {
                            return $.trim( value );
                        }
                    },
                },

                messages: {
                    dm_tenDanhMuc: "Trường này không được trống.",
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection