<header>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="address">
                        <i class="fas fa-map-marker-alt text-yellow"></i> &nbsp; {{ $address }}
                    </span>
                </div>
                <div class="col-md-6 text-right none-in-mobile">
                    <a href="{{ route('fe.home') }}">Trang chủ</a>
                    <a href="">Hướng dẫn thanh toán</a>
                    <a href="">Giới thiệu</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End top header -->
    <div class="main-header">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-md-3">
                    <a href="{{ route('fe.home') }}" class="logo">
                        <span class="free"> <i class="fas fa-code"></i> CODERS</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <form id="form-search" action="{{ route('fe.search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="Tìm kiếm..." value="{{ request()->keyword }}" required>
                        <button type="submit" class="btn-search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End main header -->

    <div class="menu-icon" style="height: 43px; background: #f26651;">
        <button class="icon-bars d-block" id="icon-bars">
            <i class="fas fa-bars"></i>
        </button> 
    </div>
    <!--End Menu-icon -->

    <div class="nav-header" id="nav-header">
        <div class="container">
            <ul class="list-menu">
                <li class="list-item">
                    <a href="{{ route('fe.home') }}">Trang chủ</a>
                </li>

                <li class="list-item">
                    <a href="{{ route('fe.contact') }}">Liên hệ</a>
                </li>

                <li class="list-item">
                    <a href="{{ route('fe.about') }}">Giới thiệu</a>
                </li>
               
                
            </ul>
        </div>
    </div>
    <!-- End nav header -->

</header>