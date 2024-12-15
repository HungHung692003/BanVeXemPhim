<!-- slider-area -->
<section class="slider-area slider-bg" data-background="https://themebeyond.com/html/movflx/img/banner/s_slider_bg.jpg">
    <div class="slider-active">
        @foreach ($phimDangChieu as $key => $value)
        <div class="slider-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <div class="slider-img text-center text-lg-right" data-animation="fadeInRight" data-delay="1s">
                            <img style="height: 909px; width: 609px" src="{{ $value->hinh_anh }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $value->ten_phim }}</h2>
                            <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                <ul>
                                    <li class="quality">
                                        <span>{{ $value->ngon_ngu }}</span>
                                        <span>hd</span>
                                    </li>
                                    <li class="category">
                                        <a href="#">{{ $value->the_loai }}</a>
                                    </li>
                                    <li class="release-time">
                                        <span><i class="far fa-calendar-alt"></i> {{ $value->bat_dau }}</span>
                                        <span><i class="far fa-clock"></i> {{ $value->thoi_luong }} phút</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ $value->trailer }}" class="banner-btn btn popup-video" data-animation="fadeInUp" data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- slider-area-end -->
