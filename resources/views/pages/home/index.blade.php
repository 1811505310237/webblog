@extends('layouts.master')

@section('content')
    <style>
        .pagination {
            justify-content: center;
        }
        .pagination li {
            margin-right: 5px;
            border-radius: 0 !important;
        }
        .pagination li.active .page-link{
            background-color: #f26651 !important;
            border-color: #f26651 !important;
            color: #fff !important;
        }
        .pagination li .page-link{
            color: #000 !important;
        }
        .pagination li:hover .page-link{
            background-color: #f26651 !important;
        }
    </style>
    <section class="blog pt-3 pb-3">
        <div class="container">
            <h4 >Tất cả bài viết</h4>
            <div class="row">
                <div class="col-md-9">
                    <div class="wp-left">
                        <div class="row">

                            @if ($all->count() > 0)
                                @foreach ($all as $item)
                                    <div class="col-md-4 col-6">
                                        <div class="item">
                                            <img src="{{ asset($item->bv_avatar) }}" alt="thumb" width="100%">
                                            <a class="item-title" href="{{ route('fe.baiviet.detail', [$item->id, $item->bv_slug]) }}">
                                                {{ $item->bv_tieuDe }}
                                            </a>
                                            <p class="item-desc">
                                                {{ $item->bv_moTaNgan }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End 1 item -->
                                @endforeach  
                            @else
                                <div class="col-md-12">
                                    <div class="alert alert-warning" role="alert">
                                        <span>Chưa có dữ liệu.</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{$all->links()}}
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