@extends('admin.share.master')
@section('noi_dung')
<div id="app">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH PHIM</h6>
        </div>
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#themPhimModal" type="button" class="btn btn-primary">Thêm Mới Phim</button>
            <div class="modal fade" id="themPhimModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm Mới Phim</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <label class="mb-2">Tên Phim</label>
                                    <input v-model="them_moi.ten_phim" type="text" class="form-control" placeholder="Nhập vào tên phim">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Slug Phim</label>
                                    <input v-model="them_moi.slug_phim" type="text" class="form-control" placeholder="Nhập vào slug phim">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Hình Ảnh</label>
                                    <input v-model="them_moi.hinh_anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Tên Đạo Diễn</label>
                                    <input v-model="them_moi.dao_dien" type="text" class="form-control" placeholder="Nhập vào danh sách đạo diễn">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label class="mb-2">Diễn Viên</label>
                                    <input v-model="them_moi.dien_vien" type="text" class="form-control" placeholder="Nhập vào danh sách diễn viên">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Thể Loại</label>
                                    <input v-model="them_moi.the_loai" type="text" class="form-control" placeholder="Nhập vào thể loại">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Thời Lượng Chiếu</label>
                                    <input v-model="them_moi.thoi_luong" type="number" class="form-control" placeholder="Nhập vào số phút chiếu">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Ngôn Ngữ</label>
                                    <input v-model="them_moi.ngon_ngu" type="text" class="form-control" placeholder="Nhập vào ngôn ngữ">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label class="mb-2">Rated</label>
                                    <input v-model="them_moi.rated" type="text" class="form-control" placeholder="Nhập vào Rated">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Link youtube</label>
                                    <input v-model="them_moi.trailer" type="text" class="form-control" placeholder="Nhập vào link youtube">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Thời Gian Bắt Đầu</label>
                                    <input v-model="them_moi.bat_dau" type="date" class="form-control" placeholder="Nhập vào số phút chiếu">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Thời Gian Kết Thúc</label>
                                    <input v-model="them_moi.ket_thuc" type="date" class="form-control" placeholder="Nhập vào ngôn ngữ">
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select v-model="them_moi.hien_thi" class="form-control">
                                        <option value="1">Hiển Thị Trang Chủ</option>
                                        <option value="0">Không Hiển thị</option>
                                    </select>
                                </div>
                                <div class="col-9">
                                    <label class="mb-2">Mô Tả</label>
                                    <textarea id="mo_ta" name="mo_ta" class="form-control" cols="30" rows="5" placeholder="Nhập vào mô tả phim"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button v-on:click="themPhim()" type="button" class="btn btn-primary">Thêm Phim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>

    <div class="row">
        <div class="col">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableA" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Tên Phim</th>
                                        <th class="text-center">Thể Loại</th>
                                        <th class="text-center">Hình Ảnh</th>
                                        <th class="text-center">Thời Gian Chiếu</th>
                                        <th class="text-center">Tình Trạng</th>
                                        <th class="text-center">Hiển Thị</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, key) in list_phim">
                                        <tr>
                                            <th class="text-center align-middle">@{{key + 1}}</th>
                                            <td class="align-middle">@{{value.ten_phim}}</td>
                                            <td class="align-middle">@{{value.the_loai}}</td>
                                            <td class="align-middle text-center">
                                                <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.hinh_anh" alt="">
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                @{{value.thoi_luong}} phút
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button class="btn btn-primary">Phim Đang Chiếu</button>
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button v-on:click="doiTrangThai(value)" v-if="value.hien_thi == 1" class="btn btn-primary">Hiển Thị</button>
                                                <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Tạm Tắt</button>
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button v-on:click="editPhim(value)"  data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-info">Cập Nhật</button>
                                                <button v-on:click="tt_xoa = value"  data-bs-toggle="modal" data-bs-target="#delModal" class="btn btn-danger">Hủy Bỏ</button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phim</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                    <input type="hidden" id="id_xoa">
                                                <div class="text-dark">Bạn có chắc chắn muốn xóa phim <b  class="text-danger">@{{tt_xoa.ten_phim}}</b> này không!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button v-on:click="xoaPhim()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cập Nhật Phim</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <label class="mb-2">Tên Phim</label>
                                                <input v-model="edit.ten_phim" type="text" class="form-control" placeholder="Nhập vào tên phim">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Slug Phim</label>
                                                <input v-model="edit.slug_phim" type="text" class="form-control" placeholder="Nhập vào slug phim">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Hình Ảnh</label>
                                                <input v-model="edit.hinh_anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Tên Đạo Diễn</label>
                                                <input v-model="edit.dao_dien" type="text" class="form-control" placeholder="Nhập vào danh sách đạo diễn">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col">
                                                <label class="mb-2">Diễn Viên</label>
                                                <input v-model="edit.dien_vien" type="text" class="form-control" placeholder="Nhập vào danh sách diễn viên">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Thể Loại</label>
                                                <input v-model="edit.the_loai" type="text" class="form-control" placeholder="Nhập vào thể loại">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Thời Lượng Chiếu</label>
                                                <input v-model="edit.thoi_luong" type="number" class="form-control" placeholder="Nhập vào số phút chiếu">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Ngôn Ngữ</label>
                                                <input v-model="edit.ngon_ngu" type="text" class="form-control" placeholder="Nhập vào ngôn ngữ">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col">
                                                <label class="mb-2">Rated</label>
                                                <input v-model="edit.rated" type="text" class="form-control" placeholder="Nhập vào Rated">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Link youtube</label>
                                                <input v-model="edit.trailer" type="text" class="form-control" placeholder="Nhập vào link youtube">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Thời Gian Bắt Đầu</label>
                                                <input v-model="edit.bat_dau" type="date" class="form-control" placeholder="Nhập vào số phút chiếu">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Thời Gian Kết Thúc</label>
                                                <input v-model="edit.ket_thuc" type="date" class="form-control" placeholder="Nhập vào ngôn ngữ">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="mb-2">Tình Trạng</label>
                                                <select v-model="edit.hien_thi" class="form-control">
                                                    <option value="1">Hiển Thị Trang Chủ</option>
                                                    <option value="0">Không Hiển thị</option>
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <label class="mb-2">Mô Tả</label>
                                                <textarea id="e_mo_ta" name="mo_ta" class="form-control" cols="30" rows="5" placeholder="Nhập vào mô tả phim"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatPhim()" type="button" class="btn btn-primary">Cập Nhật Phim</button>
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        new Vue({
            el      :       '#app',
            data    :       {
                them_moi        :       {},
                list_phim       :       [],
                edit            :       {},
                tt_xoa          :       {},
            },
            created()       {
                this.loadData();
            },
            methods:        {
                themPhim() {
                    this.them_moi.mo_ta = CKEDITOR.instances['mo_ta'].getData();
                    axios
                        .post('{{ Route("phimStore") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                $("#themPhimModal").modal('hide');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadData() {
                    axios
                        .post('{{ Route("phimData") }}')
                        .then((res) => {
                            this.list_phim   = res.data.xxx;
                            if(res.data.status == 0) {
                                toastr.error(res.data.message);
                            }
                        });
                },
                xoaPhim() {
                    axios
                        .post('{{ Route("phimDel") }}', this.tt_xoa)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#deleteModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                capNhatPhim() {
                    this.edit.mo_ta = CKEDITOR.instances['e_mo_ta'].getData(),
                    axios
                        .post('{{ Route("phimUpdate") }}', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#editModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                doiTrangThai(payload) {
                    axios
                        .post('{{ Route("phimStatus") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                editPhim(value) {
                    this.edit =  Object.assign({}, value);
                    CKEDITOR.instances.e_mo_ta.setData(this.edit.mo_ta);
                }
            },
        });
    });
</script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('mo_ta');
        CKEDITOR.replace('e_mo_ta');
    });
</script>
@endsection
