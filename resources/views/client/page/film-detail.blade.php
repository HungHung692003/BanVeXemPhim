@extends('client.share.master')
@section('noi_dung')
    <div id="app">
        <section class="movie-details-area" data-background="/assets_client/img/bg/movie_details_bg.jpg">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-xl-5 col-lg-4">
                        <div class="movie-details-img">
                            <img style="height: 730px; width: 503px" v-bind:src="phim.hinh_anh" alt="">
                            <a target="blank_" v-bind:href="phim.trailer" class="popup-video"><img
                                    src="/assets_client/img/images/play_icon.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8">
                        <div class="movie-details-content">
                            <h2>@{{ phim.ten_phim }}</h2>
                            <div class="banner-meta">
                                <ul>
                                    <li class="quality">
                                        <span>@{{ phim.ngon_ngu }}</span>
                                        <span>hd</span>
                                    </li>
                                    <li class="category">
                                        <a href="#">@{{ phim.the_loai }}</a>
                                    </li>
                                    <li class="release-time">
                                        <span><i class="far fa-calendar-alt"></i> @{{ phim.bat_dau }}</span>
                                        <span><i class="far fa-clock"></i> @{{ phim.thoi_luong }} phút</span>
                                    </li>
                                </ul>
                            </div>
                            <p>@{{ phim.mo_ta }}</p>
                            <template v-for="(v, k) in ds_lich">
                                <button v-on:click="getTT(v)" class="btn m-2" data-toggle="modal" data-target="#exampleModal">@{{ v.gio_bat_dau }}</button>
                            </template>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title mt-2" id="exampleModalLabel" style="color: black">Danh Sách Ghế Ngày 02/08/2023 tại phòng chiếu @{{c_phong_chieu.ten_phong}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <template v-for="i in c_phong_chieu.hang_doc">
                                                    <tr>
                                                        <template v-for="j in c_phong_chieu.hang_ngang">
                                                            <template v-for="(v, k) in c_ds_ve">
                                                                <template v-if="k == ((i - 1) * c_phong_chieu.hang_ngang + j - 1)">
                                                                    <td class="text-center">
                                                                        <template v-if="v.tinh_trang == 0" >
                                                                            <i v-if="v.choose == 1" v-on:click="v.choose = 0" class="text-success fa-solid fa-couch fa-2x"></i>
                                                                            <i v-if="v.choose == 0" v-on:click="v.choose = 1" class="fa-solid fa-couch fa-2x"></i>
                                                                        </template>
                                                                        <template v-else>
                                                                            <i class="text-danger fa-solid fa-couch fa-2x"></i>
                                                                        </template>
                                                                        <br>
                                                                        <b>@{{ v.so_ghe }}</b>
                                                                    </td>
                                                                </template>
                                                            </template>
                                                        </template>
                                                    </tr>
                                                </template>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-right">
                                        <button data-dismiss="modal" aria-label="Close" v-on:click="datVe()" class="btn btn-primary">Đặt Vé Xem Phim</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="movie-details-prime">
                                <ul>
                                    <li class="share"><a href="#"><i class="fas fa-share-alt"></i> Share</a></li>
                                    <li class="streaming">
                                        <h6>Prime Video</h6>
                                        <span>Streaming Channels</span>
                                    </li>
                                    <li class="watch"><a target="blank_" v-bind:href="phim.trailer" class="btn popup-video"><i
                                                class="fas fa-play"></i> Watch Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    phim: {},
                    hang_doc        : 7,
                    hang_ngang      : 10,
                    ds_lich         : [],
                    c_phong_chieu   : {},
                    c_ds_ve         : [],
                },
                created() {
                    this.loadData();
                },
                methods: {
                    convertIntToChar(number) {
                        return String.fromCharCode(65 + number);
                    },
                    loadData() {
                        var link = window.location.href;
                        var arr = link.split('/');
                        var payload = {
                            'id': arr[arr.length - 1]
                        }
                        axios
                            .post('{{ Route('getIdFilmDetail') }}', payload)
                            .then((res) => {
                                this.phim = res.data.data;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                        axios
                            .post('{{ Route('lichChieuTheoFilm') }}', payload)
                            .then((res) => {
                                this.ds_lich = res.data.lich_chieu;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    getTT(payload) {
                        setInterval(() => {
                            axios
                            .post('{{ Route("infoLichClient") }}', payload)
                            .then((res) => {
                                this.c_phong_chieu  = res.data.phong_chieu;
                                this.c_ds_ve        = res.data.ds_ve;
                                if(res.data.status == 0) {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                        }, 10000);

                    },
                    datVe() {
                        var payload = {
                            'ds_ve'     :   this.c_ds_ve
                        };
                        axios
                            .post('{{ Route("datVeXemPhim") }}', payload)
                            .then((res) => {
                                if(res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                },
            });
        });
    </script>
@endsection
