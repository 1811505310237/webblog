@extends('layouts.master')

@section('content')
<style>
    img {
        width: 100%;
    }
</style>
    <section class="blog pt-3 pb-3">
        <div class="container">
            
            <div class="row">
                <div class="col-md-9">
                    <h4> {{ $detail->bv_tieuDe }}</h4>
                    <span>Ngày tạo: {{ date('d/m/Y, H:i:s', strtotime($detail->created_at)) }} bởi <b>Admin</b></span>
                    <span>|</span>
                    <span>Lượt xem: {{ $detail->bv_view }}</span>
                    <hr>
                    <div class="wp-left">
                        {!! $detail->bv_noiDung !!}
                    </div>
                    <hr>
                    <div id="wp-comment">
                        <h5 style="font-weight: 600;">Trả lời</h5>
                        <p>Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu *</p>
                        <form action="{{ route('fe.comment.save') }}" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b for="email">Bình luận <span style="color: red;">*</span></b>
                                        <textarea class="form-control" name="cmt_noiDung" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b for="email">Tên <span style="color: red;">*</span></b>
                                        <input type="text" class="form-control" name="cmt_name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b for="email">Email <span style="color: red;">*</span></b>
                                        <input type="email" class="form-control" name="cmt_email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="cmt_baivietID" value="{{ $detail->id }}">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="background-color: #f26651; border-color: #f26651; font-weight: 600; border-radius: 0;">GỬI BÌNH LUẬN</button>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wp-right">
                        <h5 style="color: #f26651;">Bài viết liên quan</h5>

                        @if ($lienquan->count() >0)
                            @foreach ($lienquan as $item)
                                <div class="post-item">
                                    <div class="thumb">
                                        <img src="{{ asset($item->bv_avatar) }}" alt="" width="100%">
                                    </div>
                                    <div class="info">
                                        <a class="" href="{{ route('fe.baiviet.detail', [$item->id, $item->bv_slug]) }}">{{ $item->bv_tieuDe }}</a>
                                        <span><i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($item->created_at)) }}</span>
                                    </div>
                                </div>
                                <!-- End 1 postItem -->
                            @endforeach
                        @else  
                            <div class="alert alert-warning" role="alert">
                                <span>Chưa có dữ liệu</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection