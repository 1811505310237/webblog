@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>
                Quản lý địa chỉ IP
            </h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Tất cả địa chỉ IP</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!--Search-->
                <form action="" method="GET">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="ip" class="form-control pull-right" placeholder="Từ khóa..." value="{{ request()->ip }}">
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
                                <th>Địa chỉ IP thiết bị</th>
                                <th>Ngày truy cập</th>
                                <th>Thao tác</th>
                            </tr>
                                @if ($ip->count() > 0)
                                    @foreach ($ip as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->ip_address }}</td>
                                            <td>{{ $item->date_visitor }}</td>
                                            {{-- <td>
                                                @if ($item->cmt_status)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Inactive</span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                
                                                <button data-id="{{$item->id}}" type="button" class="btn btn-danger btn-sm ">
                                                    <i class="fa fa-lock"></i>
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
                    {{$ip->links()}}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            //delete
            $(".deleteCmt").click(function (e) { 
                e.preventDefault();
                let url = "{{route('admin.comment.delete')}}";
                let id = $(this).attr('data-id');

                $.confirm({
                    title: 'Xóa?',
                    content: 'Xác nhận xóa bình luận',
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

            //changestatus
            $(".changeStatus").click(function (e) { 
                e.preventDefault();
                let url = "{{route('admin.comment.change')}}";
                let id = $(this).attr('data-id');

                $.confirm({
                    title: 'Đổi trạng thái?',
                    content: 'Đổi trạng thái từ Active sang Inactive và ngược lại',
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
        });
    </script>
@endsection