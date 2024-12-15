@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH PHIM</h6>
    </div>
    <div class="ms-auto">
        <button data-bs-toggle="modal" data-bs-target="#themPhimModal" type="button" class="btn btn-primary">Thêm Mới Phim</button>
        <div class="modal fade" id="themPhimModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm Mới Phim</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col">
                                <label class="mb-2">Tên Phim</label>
                                <input id="ten_phim" type="text" class="form-control" placeholder="Nhập vào tên phim">
                            </div>
                            <div class="col">
                                <label class="mb-2">Slug Phim</label>
                                <input id="slug_phim" type="text" class="form-control" placeholder="Nhập vào slug phim">
                            </div>
                            <div class="col">
                                <label class="mb-2">Hình Ảnh</label>
                                <input id="hinh_anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                            </div>
                            <div class="col">
                                <label class="mb-2">Tên Đạo Diễn</label>
                                <input id="dao_dien" type="text" class="form-control" placeholder="Nhập vào danh sách đạo diễn">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label class="mb-2">Diễn Viên</label>
                                <input id="dien_vien" type="text" class="form-control" placeholder="Nhập vào danh sách diễn viên">
                            </div>
                            <div class="col">
                                <label class="mb-2">Thể Loại</label>
                                <input id="the_loai" type="text" class="form-control" placeholder="Nhập vào thể loại">
                            </div>
                            <div class="col">
                                <label class="mb-2">Thời Lượng Chiếu</label>
                                <input id="thoi_luong" type="number" class="form-control" placeholder="Nhập vào số phút chiếu">
                            </div>
                            <div class="col">
                                <label class="mb-2">Ngôn Ngữ</label>
                                <input id="ngon_ngu" type="text" class="form-control" placeholder="Nhập vào ngôn ngữ">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label class="mb-2">Rated</label>
                                <input id="rated" type="text" class="form-control" placeholder="Nhập vào Rated">
                            </div>
                            <div class="col">
                                <label class="mb-2">Link youtube</label>
                                <input id="trailer" type="text" class="form-control" placeholder="Nhập vào link youtube">
                            </div>
                            <div class="col">
                                <label class="mb-2">Thời Gian Bắt Đầu</label>
                                <input id="bat_dau" type="date" class="form-control" placeholder="Nhập vào số phút chiếu">
                            </div>
                            <div class="col">
                                <label class="mb-2">Thời Gian Kết Thúc</label>
                                <input id="ket_thuc" type="date" class="form-control" placeholder="Nhập vào ngôn ngữ">
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="mb-2">Tình Trạng</label>
                                <select id="hien_thi" class="form-control">
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
                        <button id="themPhim" type="button" class="btn btn-primary">Thêm Phim</button>
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
                                <tr>
                                    <th class="text-center align-middle">1</th>
                                    <td class="align-middle">AAAAA</td>
                                    <td class="align-middle">AAAAA</td>
                                    <td class="align-middle text-center">
                                        <img class="rounded-circle p-1 border" width="90px" height="90px" src="https://w7.pngwing.com/pngs/431/803/png-transparent-rodimus-bumblebee-transformers-logo-autobot-transformers-s-sticker-transformers-prime-area.png" alt="">
                                    </td>
                                    <td class="text-nowrap align-middle">
                                        114 phút
                                    </td>
                                    <td class="text-nowrap align-middle text-center">
                                        <button class="btn btn-primary">Phim Đang Chiếu</button>
                                    </td>
                                    <td class="text-nowrap align-middle text-center">
                                        <button class="btn btn-primary">Hiển Thị</button>
                                    </td>
                                    <td class="text-nowrap align-middle text-center">
                                        <button class="btn btn-info">Cập Nhật</button>
                                        <button class="btn btn-danger">Hủy Bỏ</button>
                                    </td>
                                </tr>
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
                                <input type="hidden" id="id_xoa">
                                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-dark">Warning Alerts</h6>
											<div class="text-dark">Bạn có chắc chắn muốn xóa phim <b id="phim_xoa" class="text-danger">ABC</b> này không!</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button id="aDel" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Xóa</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cập Nhật Phim</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <input type="text" id="e_id">
                                        <div class="col">
                                            <label class="mb-2">Tên Phim</label>
                                            <input id="e_ten_phim" type="text" class="form-control" placeholder="Nhập vào tên phim">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Slug Phim</label>
                                            <input id="e_slug_phim" type="text" class="form-control" placeholder="Nhập vào slug phim">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Hình Ảnh</label>
                                            <input id="e_hinh_anh" type="text" class="form-control" placeholder="Nhập vào ảnh đại diện">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Tên Đạo Diễn</label>
                                            <input id="e_dao_dien" type="text" class="form-control" placeholder="Nhập vào danh sách đạo diễn">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label class="mb-2">Diễn Viên</label>
                                            <input id="e_dien_vien" type="text" class="form-control" placeholder="Nhập vào danh sách diễn viên">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thể Loại</label>
                                            <input id="e_the_loai" type="text" class="form-control" placeholder="Nhập vào thể loại">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thời Lượng Chiếu</label>
                                            <input id="e_thoi_luong" type="number" class="form-control" placeholder="Nhập vào số phút chiếu">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Ngôn Ngữ</label>
                                            <input id="e_ngon_ngu" type="text" class="form-control" placeholder="Nhập vào ngôn ngữ">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label class="mb-2">Rated</label>
                                            <input id="e_rated" type="text" class="form-control" placeholder="Nhập vào Rated">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Link youtube</label>
                                            <input id="e_trailer" type="text" class="form-control" placeholder="Nhập vào link youtube">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thời Gian Bắt Đầu</label>
                                            <input id="e_bat_dau" type="date" class="form-control" placeholder="Nhập vào số phút chiếu">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thời Gian Kết Thúc</label>
                                            <input id="e_ket_thuc" type="date" class="form-control" placeholder="Nhập vào ngôn ngữ">
                                        </div>

                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="mb-2">Tình Trạng</label>
                                            <select id="e_hien_thi" class="form-control">
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
                                    <button id="aUpdate" type="button" class="btn btn-primary">Cập Nhật Phim</button>
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
        CKEDITOR.replace('mo_ta');
        CKEDITOR.replace('e_mo_ta');
    });

    $("#themPhim").click(function() {
        var new_phim    =   {
            'ten_phim'      : $("#ten_phim").val(),
            'slug_phim'     : $("#slug_phim").val(),
            'hinh_anh'      : $("#hinh_anh").val(),
            'dien_vien'     : $("#dien_vien").val(),
            'the_loai'      : $("#the_loai").val(),
            'dao_dien'      : $("#dao_dien").val(),
            'thoi_luong'    : $("#thoi_luong").val(),
            'rated'         : $("#rated").val(),
            'mo_ta'         : CKEDITOR.instances['mo_ta'].getData(),
            'ngon_ngu'      : $("#ngon_ngu").val(),
            'ket_thuc'      : $("#ket_thuc").val(),
            'trailer'       : $("#trailer").val(),
            'bat_dau'       : $("#bat_dau").val(),
            'hien_thi'      : $("#hien_thi").val(),
        };
        // axios => chỉ gửi được object
        axios
            .post("{{ Route('phimStore') }}", new_phim)
            .then((res) => {
                if(res.data.status == true) {
                    toastr.success(res.data.message);
                    $('#themPhimModal').modal('hide');
                    loadData();
                }
            });
    });

    $("#aUpdate").click(function() {
        var new_phim    =   {
            'id'            : $("#e_id").val(),
            'ten_phim'      : $("#e_ten_phim").val(),
            'slug_phim'     : $("#e_slug_phim").val(),
            'hinh_anh'      : $("#e_hinh_anh").val(),
            'dien_vien'     : $("#e_dien_vien").val(),
            'the_loai'      : $("#e_the_loai").val(),
            'dao_dien'      : $("#e_dao_dien").val(),
            'thoi_luong'    : $("#e_thoi_luong").val(),
            'rated'         : $("#e_rated").val(),
            'mo_ta'         : CKEDITOR.instances['e_mo_ta'].getData(),
            'ngon_ngu'      : $("#e_ngon_ngu").val(),
            'ket_thuc'      : $("#e_ket_thuc").val(),
            'trailer'       : $("#e_trailer").val(),
            'bat_dau'       : $("#e_bat_dau").val(),
            'hien_thi'      : $("#e_hien_thi").val(),
        };
        // axios => chỉ gửi được object
        axios
            .post("{{ Route('phimUpdate') }}", new_phim)
            .then((res) => {
                if(res.data.status == true) {
                    toastr.success(res.data.message);
                    $('#editModal').modal('hide');
                    loadData();
                } else {
                    toastr.error(res.data.message);
                }
            });
    });

    loadData();

    function loadData()
    {
        axios
            .post('{{ Route("phimData") }}')
            .then((res) => {
                var data = res.data.xxx;
                var noi_dung = '';
                $.each(data, function(k, v) {
                    noi_dung += '<tr>';
                    noi_dung += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                    noi_dung += '<td class="align-middle">'+ v.ten_phim +'</td>';
                    noi_dung += '<td class="align-middle">'+ v.the_loai +'</td>';
                    noi_dung += '<td class="align-middle text-center">';
                    noi_dung += '<img class="rounded-circle p-1 border" width="90px" height="90px" src="'+ v.hinh_anh +'" alt="">';
                    noi_dung += '</td>';
                    noi_dung += '<td class="text-nowrap align-middle">';
                    noi_dung += (v.thoi_luong + ' phút');
                    noi_dung += '</td>';
                    noi_dung += '<td class="text-nowrap align-middle text-center">';
                    noi_dung += '<button class="btn btn-primary">Phim Đang Chiếu</button>';
                    noi_dung += '</td>';
                    noi_dung += '<td class="text-nowrap align-middle text-center">';
                    if(v.hien_thi == 1) {
                        noi_dung += '<button data-id="'+ v.id +'" class="btn btn-primary status">Hiển Thị</button>';
                    } else {
                        noi_dung += '<button data-id="'+ v.id +'" class="btn btn-warning status">Tạm Tắt </button>';
                    }
                    noi_dung += '</td>';
                    noi_dung += '<td class="text-nowrap align-middle text-center">';
                    noi_dung += '<button data-id="'+ v.id +'" class="edit btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#editModal">Cập Nhật</button>';
                    noi_dung += '<button data-id="'+ v.id +'" class="del btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModal">Hủy Bỏ</button>';
                    noi_dung += '</td>';
                    noi_dung += '</tr>';
                });
                $("#tableA tbody").html(noi_dung);
            });
    }

    $("body").on('click', '.status', function() {
        var id  = $(this).data('id');
        // Muốn gửi dữ liệu từ client lên server thì chỉ gửi duy nhất bằng object
        // Ta chỉ cần gửi 1 mình ID lên là đủ   => dù 1 biến nhưng ta cũng phải tạo object  => tên gì cũng được
        var payload     =   {
            'id'    :   id,
        };
        // Ta chuẩn bị gửi payload (object) lên server -> phải có thằng nhận
        axios
            .post('{{ Route("phimStatus") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    toastr.success(res.data.message, 'Success');
                    loadData();
                } else {
                    toastr.error(res.data.message, 'Error');
                }
            });
    });

    $("body").on('click', '.del', function() {
        var id  = $(this).data('id');
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("phimInfo") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    $("#phim_xoa").text(res.data.data.ten_phim);
                    $("#id_xoa").val(res.data.data.id);
                } else {
                    toastr.error(res.data.message, 'Error');
                    setTimeout(() => {
                        $('#delModal').modal('hide');
                    }, 500);
                }
            });
    });

    $("body").on('click', '.edit', function() {
        var id  = $(this).data('id');
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("phimInfo") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    $("#e_id").val(res.data.data.id);
                    $('#e_ten_phim').val(res.data.data.ten_phim);
                    $('#e_slug_phim').val(res.data.data.slug_phim);
                    $('#e_hinh_anh').val(res.data.data.hinh_anh);
                    $('#e_dien_vien').val(res.data.data.dien_vien);
                    $('#e_the_loai').val(res.data.data.the_loai);
                    $('#e_dao_dien').val(res.data.data.dao_dien);
                    $('#e_thoi_luong').val(res.data.data.thoi_luong);
                    $('#e_rated').val(res.data.data.rated);
                    // $('#e_mo_ta').val(res.data.data.mo_ta);
                    CKEDITOR.instances.e_mo_ta.setData(res.data.data.mo_ta);
                    $('#e_ngon_ngu').val(res.data.data.ngon_ngu);
                    $('#e_ket_thuc').val(res.data.data.ket_thuc);
                    $('#e_trailer').val(res.data.data.trailer);
                    $('#e_bat_dau').val(res.data.data.bat_dau);
                    $('#e_hien_thi').val(res.data.data.hien_thi);
                } else {
                    toastr.error(res.data.message, 'Error');
                    setTimeout(() => {
                        $('#delModal').modal('hide');
                    }, 500);
                }
            });
    });

    $("body").on('click', '#aDel', function() {
        var id = $("#id_xoa").val();
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("phimDel") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    toastr.success(res.data.message, 'Success');
                    loadData();
                } else {
                    toastr.error(res.data.message, 'Error');
                }
            });
    });

</script>
@endsection
