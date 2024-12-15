<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('client.share.css')
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <img src="/assets_client/img/preloader.svg" alt="">
                </div>
            </div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            @include('client.share.header')
        </header>
        <!-- header-area-end -->


        <!-- main-area -->
        <main>
            <!-- movie-area -->
            <section class="movie-area movie-bg" data-background="/assets_client/img/bg/movie_bg.jpg">
                <div class="container">
                    <div class="row align-items-end mb-60">
                        <div class="col-lg-6">
                            <div class="section-title text-center text-lg-left">
                                <span class="sub-title">ONLINE STREAMING</span>
                                <h2 class="title">New Release Movies</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="movie-page-meta">
                                <div class="tr-movie-menu-active text-center">
                                    <button class="active" data-filter="*">Animation</button>
                                    <button class="" data-filter=".cat-one">Movies</button>
                                    <button class="" data-filter=".cat-two">Romantic</button>
                                </div>
                                <form action="#" class="movie-filter-form">
                                    <select class="custom-select">
                                        <option selected>English</option>
                                        <option value="1">Blueray</option>
                                        <option value="2">4k Movie</option>
                                        <option value="3">Hd Movie</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row tr-movie">
                        @if (isset($phim))
                        @foreach ($phim as $key => $value)
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
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
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </section>
            <!-- movie-area-end -->



        </main>
        <!-- main-area-end -->


        <!-- footer-area -->
        @include('client.share.footer')
        <!-- footer-area-end -->
        @include('client.share.js')
    </body>
</html>
