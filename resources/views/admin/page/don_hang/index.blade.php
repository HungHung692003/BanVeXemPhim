@extends('admin.share.master')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2">Danh Sách Đơn Hàng</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Khách Hàng</th>
                                <th class="text-center">Mã Đơn Hàng</th>
                                <th class="text-center">Tổng Tiền</th>
                                <th class="text-center">Ngày Hóa Đơn</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_don_hang">
                                <tr>
                                    <th class="text-center">@{{ key + 1}}</th>
                                    <td class="align-middle text-nowrap">@{{ value.ho_va_ten}}</td>
                                    <td class="text-center align-middle text-nowrap">@{{ value.ma_don_hang}}</td>
                                    <td class="align-middle text-nowrap">@{{ number_format(value.tong_tien)}}</td>
                                    <td class="text-center align-middle">@{{ date_format(value.created_at)}}</td>
                                    <td class="text-center align-middle">
                                        <button v-on:click="getChiTietDonHang(value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi Tiết</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Chi Tiết Đơn Hàng</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle text-nowrap">#</th>
                                                <th class="text-center align-middle text-nowrap">Tên Phim</th>
                                                <th class="text-center align-middle text-nowrap">Tên Ghế</th>
                                                <th class="text-center align-middle text-nowrap">Giá Ghế</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(value, key) in list_ct_don_hang">
                                                <tr>
                                                    <th class="text-center">@{{key + 1}}</th>
                                                    <td class="text-center">@{{value.ten_phim}}</td>
                                                    <td class="text-center">@{{value.so_ghe}}</td>
                                                    <td class="text-center">@{{number_format(value.gia_ve)}}</td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                list_don_hang    : [],
                list_ct_don_hang : [],
            },
            created()   {
                this.getDataDonHang();
            },
            methods :   {
                getDataDonHang() {
                    axios
                        .post('{{Route('dataDonHang')}}')
                        .then((res) => {
                            this.list_don_hang = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                getChiTietDonHang(value) {
                    axios
                        .post('{{Route('dataChiTietDonHang')}}', value)
                        .then((res) => {
                            this.list_ct_don_hang = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
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
        });
    </script>
@endsection
