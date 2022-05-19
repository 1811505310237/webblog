@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý bài viết
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Thêm mới bài viết</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.baiviet.update') }}" role="form" id="baiVietForm" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" name="bv_tieuDe" value="{{ $baiviet->bv_tieuDe }}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" name="bv_avatar" onchange="previewFile(this)" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea class="form-control" name="bv_moTaNgan" rows="4" required>{{ $baiviet->bv_moTaNgan }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh xem trước</label>
                                    <img id="previewImg" src="{{ asset( $baiviet->bv_avatar) }}" alt="" width="120px" height="auto" style="border: 1px solid #ddd; padding: 3px">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="bv_categoryID" id="">
                                        @foreach ($danhmuc as $item)
                                            <option {{($baiviet->bv_categoryID == $item->id)?'selected':false}} value="{{ $item->id }}">{{ $item->dm_tenDanhMuc }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung bài viết</label>
                                    <textarea class="form-control" name="bv_noiDung" id="bv_noiDung" rows="30" required>{{ $baiviet->bv_noiDung }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung bài viết</label>
                                    <select name="bv_status" class="form-control">
                                        <option {{$baiviet->bv_status == 1?'selected': false}} value="1">Active</option>
                                        <option {{$baiviet->bv_status == 0?'selected': false}} value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('admin.baiviet.index') }}" class="btn btn-danger">Trở lại</a>
                    </div>
                    @csrf
                    <input type="hidden" name="id" value="{{ $baiviet->id }}">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            // validate signup form on keyup and submit
            $("#baiVietForm").validate({
                rules: {
                    bv_tieuDe: {
                        required: true,
                        normalizer: function( value ) {
                            return $.trim( value );
                        }
                    },
                    bv_moTaNgan: {
                        required: true,
                        normalizer: function( value ) {
                            return $.trim( value );
                        }
                    },
                },

                messages: {
                    bv_tieuDe: "Trường này không được trống.",
                    bv_moTaNgan: "Trường này không được trống.",
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];
     
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }
     
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection