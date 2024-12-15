@extends('client.share.master')
@section('noi_dung')
    @include('client.share.slide')

    <section class="ucm-area ucm-bg2" data-background="/assets_client/img/bg/ucm_bg02.jpg">
        <div class="container">
            <div class="row align-items-end mb-55">
                <div class="col-lg-6">
                    <div class="section-title title-style-three text-center text-lg-left">
                        <span class="sub-title">ONLINE STREAMING</span>
                        <h2 class="title">DANH SÁCH CÁC PHIM</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ucm-nav-wrap">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tvShow-tab" data-toggle="tab" href="#tvShow" role="tab"
                                    aria-controls="tvShow" aria-selected="true">Phim Đang Chiếu</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="movies-tab" data-toggle="tab" href="#movies" role="tab"
                                    aria-controls="movies" aria-selected="false">Phim Sắp Chiếu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tvShow" role="tabpanel" aria-labelledby="tvShow-tab">
                    <div class="ucm-active-two owl-carousel">
                        @foreach ($phimDangChieu as $key => $value)
                            <div class="movie-item movie-item-two mb-30 " style="height: 550px">
                                <div class="movie-poster">
                                    <a href="/film-detail/{{$value->id}}"><img style="height: 285px; width: 195px" src="{{ $value->hinh_anh}}"
                                            alt=""></a>
                                </div>
                                <div class="movie-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h5 class="title"><a href="/film-detail/{{$value->id}}">{{ mb_strimwidth($value->ten_phim, 0, 20, '...') }}</a></h5>
                                    <span class="rel">{{ mb_strimwidth($value->the_loai, 0, 20, '...') }}</span>
                                    <div class="movie-content-bottom">
                                        <ul>
                                            <li class="tag">
                                                <a class="mt-2" href="#">HD</a>
                                                <a class="mt-2" href="#">{{ mb_strimwidth($value->ngon_ngu, 0, 14, '...') }}</a>
                                            </li>
                                            <li>
                                                <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="movies" role="tabpanel" aria-labelledby="movies-tab">
                    <div class="ucm-active-two owl-carousel" style="height: 550px">
                        @foreach ($phimSapChieu as $key => $value)
                            <div class="movie-item movie-item-two mb-30 ">
                                <div class="movie-poster">
                                    <a href="/film-detail/{{$value->id}}"><img style="height: 285px; width: 195px" src="{{ $value->hinh_anh}}"
                                            alt=""></a>
                                </div>
                                <div class="movie-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h5 class="title"><a href="/film-detail/{{$value->id}}">{{ mb_strimwidth($value->ten_phim, 0, 20, '...') }}</a></h5>
                                    <span class="rel">{{ mb_strimwidth($value->the_loai, 0, 20, '...') }}</span>
                                    <div class="movie-content-bottom">
                                        <ul>
                                            <li class="tag">
                                                <a href="#">HD</a>
                                                <a href="#">{{ mb_strimwidth($value->ngon_ngu, 0, 14, '...') }}</a>
                                            </li>
                                            <li>
                                                <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
