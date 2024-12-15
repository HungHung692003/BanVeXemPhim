@extends('client.share.master')
@section('noi_dung')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container" id="app">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Danh Sách Hóa Đơn</h5>
                    </div>
                    <div class="contact-form">
                        <table class="table table-striped">
                            <thead class="text-white">
                                <tr>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Mã Hóa Đơn</th>
                                    <th class="align-middle text-center">Ngày Mua</th>
                                    <th class="align-middle text-center">Tổng Tiền</th>
                                    <th class="align-middle text-center">Tình Trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">
                                <template v-for="(v, k) in list_bill">
                                    <tr>
                                        <th class="align-middle text-nowrap text-center">@{{ k + 1 }}</th>
                                        <td class="align-middle text-nowrap text-center">@{{ v.ma_don_hang }}</td>
                                        <td class="align-middle text-nowrap text-center">@{{ date_format(v.created_at) }}</td>
                                        <td class="align-middle text-nowrap text-center">@{{ v.tong_tien }}</td>
                                        <td class="align-middle text-nowrap text-center">
                                            <button style="width: 200px" v-if="v.is_thanh_toan == 1" class="btn">Đã thanh toán</button>
                                            <button style="width: 200px" v-else class="btn">Chưa thanh toán</button>
                                        </td>
                                        <td class="align-middle text-nowrap text-center">
                                            <button class="btn" data-toggle="modal" data-target="#chitietModal" v-on:click="loadChiTiet(v.ma_don_hang)">Chi Tiết</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="chitietModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header" data-background="/assets_client/img/bg/contact_bg.jpg">
                              <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Hóa Đơn</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" data-background="/assets_client/img/bg/contact_bg.jpg">
                                <section class="contact-area contact-bg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
                                        <table class="table table-striped">
                                            <thead class="text-white">
                                                <tr>
                                                    <th class="align-middle text-center">#</th>
                                                    <th class="align-middle text-center">Tên Phim</th>
                                                    <th class="align-middle text-center">Số Ghế</th>
                                                    <th class="align-middle text-center">Giá vé</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-white">
                                                <template v-for="(v, k) in list_detail">
                                                    <tr>
                                                        <th class="align-middle text-nowrap text-center">@{{ k + 1 }}</th>
                                                        <td class="align-middle text-nowrap text-center">@{{ v.ten_phim }}</td>
                                                        <td class="align-middle text-nowrap text-center">@{{ v.so_ghe }}</td>
                                                        <td class="align-middle text-nowrap text-center">@{{ number_format(v.gia_ve) }}</td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                </section>
                            </div>
                            <div class="modal-footer" data-background="/assets_client/img/bg/contact_bg.jpg">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    new Vue({
            el: '#app',
            data: {
                list_bill   : [],
                list_detail : []
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData(){
                    axios
                        .post('{{ Route("dataBill") }}')
                        .then((res) => {
                            this.list_bill = res.data.data;
                            console.log(this.list_bill);
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },

                loadChiTiet(ma_don_hang){
                    var payload = {
                        'ma_don_hang' : ma_don_hang,
                    };
                    axios
                        .post('{{ Route("dataBillDetail") }}', payload)
                        .then((res) => {
                            this.list_detail = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },

                date_format(now) {
                    return moment(now).format('DD/MM/yyyy HH:mm');
                },

                number_format(number) {
                    return new Intl.NumberFormat('vi', { style: 'currency', currency: 'VND' }).format(number)
                }

            },
        })
</script>
@endsection
