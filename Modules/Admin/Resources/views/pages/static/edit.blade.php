@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý trang tĩnh
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Sửa trang tĩnh</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.static.update') }}" role="form" id="staticPageForm" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" name="tieuDe" value="{{ $static->tieuDe }}">
                                </div>
                            </div>
                            
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea class="form-control" name="noiDung" id="noiDung" rows="20" required>{{ $static->noiDung }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('admin.static.index') }}" class="btn btn-danger">Trở lại</a>
                    </div>
                    @csrf
                    <input type="hidden" name="id" value="{{ $static->id }}">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            // validate signup form on keyup and submit
            $("#staticPageForm").validate({
                rules: {
                    tieuDe: {
                        required: true,
                        normalizer: function( value ) {
                            return $.trim( value );
                        }
                    },
                    noiDung: {
                        required: true,
                        normalizer: function( value ) {
                            return $.trim( value );
                        }
                    },
                },

                messages: {
                    tieuDe: "Trường này không được trống.",
                    noiDung: "Trường này không được trống.",
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection