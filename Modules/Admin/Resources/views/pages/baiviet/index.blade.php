@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý bài viết
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách bài viết</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('admin.baiviet.create') }}" class="btn btn-info btn-sm">
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
                                <input type="text" name="baiviet" class="form-control pull-right" placeholder="Từ khóa..." value="{{ request()->baiviet }}">
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
                                <th>Ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả ngắn</th>
                                <th>Danh mục</th>
                                <th>Lượt xem</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            @if ($baiviet->count() > 0)
                                @foreach ($baiviet as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->bv_avatar) }}" alt="avt" width="50px">
                                        </td>
                                        <td style="width: 200px;">{{ $item->bv_tieuDe }}</td>
                                        <td style="width: 300px;">{{ $item->bv_moTaNgan }}</td>
                                        <td >{{ $item->dm_tenDanhMuc }}</td>
                                        <td >{{ $item->bv_view }}</td>
                                        <td>
                                            @if ($item->bv_status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.baiviet.edit', $item->id) }}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-id="{{$item->id}}" type="button" class="btn btn-danger btn-sm deleteBaiViet">
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
                    {{$baiviet->links()}}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".deleteBaiViet").click(function (e) { 
            e.preventDefault();
            let url = "{{route('admin.baiviet.delete')}}";
            let id = $(this).attr('data-id');

            $.confirm({
                title: 'Xóa?',
                content: 'Xóa bài viết',
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