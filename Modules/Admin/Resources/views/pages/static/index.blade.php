@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý trang tĩnh
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách trang tĩnh</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('admin.static.create') }}" class="btn btn-info btn-sm">
                <i class="fa fa-plus"></i> Thêm mới
            </a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <!--Search-->
                
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Tên trang</th>
                                <th>Thao tác</th>
                            </tr>
                            @if ($static->count() > 0)
                                @foreach ($static as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td style="width: 200px;">{{ $item->tieuDe }}</td>
                                        
                                        <td>
                                            <a href="{{ route('admin.static.edit', $item->id) }}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button data-id="{{$item->id}}" type="button" class="btn btn-danger btn-sm deleteStatic">
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
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".deleteStatic").click(function (e) { 
            e.preventDefault();
            let url = "{{route('admin.static.delete')}}";
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