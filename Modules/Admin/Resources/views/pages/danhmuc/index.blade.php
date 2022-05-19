@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý danh mục
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách danh mục</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('admin.danhmuc.create') }}" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Thêm mới
            </a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <!--Search-->
                <form action="" method="GET">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="danhmuc" class="form-control pull-right" placeholder="Từ khóa..." value="{{ request()->danhmuc }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                                @if ($danhmuc->count() > 0)
                                    @foreach ($danhmuc as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->dm_tenDanhMuc }}</td>
                                            <td>
                                                @if ($item->dm_status)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.danhmuc.edit', $item->id) }}" type="button" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button data-id="{{$item->id}}" type="button" class="btn btn-danger btn-sm deleteDanhMuc">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                            </tr>
                                    @endforeach
                                @else
                                    <td colspan="4">
                                        <span class="text-danger">Không có bản ghi.</span>
                                    </td>
                                @endif
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <!--Paginate-->
                    {{$danhmuc->links()}}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".deleteDanhMuc").click(function (e) { 
            e.preventDefault();
            let url = "{{route('admin.danhmuc.delete')}}";
            let id = $(this).attr('data-id');

            $.confirm({
                title: 'Xóa?',
                content: 'Xóa danh mục',
                buttons: {   
                    ok: {
                        text: "ok",
                        btnClass: 'btn-primary',
                        action: function(){
                            $.post(url, {id: id}, (data) => {
                                if (data == 1) {
                                    window.location.reload();
                                }
                            })
                        }
                    },
                    cancel: function(){}
                }
            });
        });
    </script>
@endsection