<!doctype html>
<html lang="en">

<head>
	@include('admin.share.css')
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper" id="app">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="/assets_admin/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-5 rounded">
									<div class="text-center">
										<h3 class="">Đăng Nhập Admin</h3>
									</div>
									<div class="form-body">
                                        <div class="col-12 mt-3">
                                            <label for="inputFirstName" class="form-label">Email</label>
                                            <input v-model="dang_nhap.email" type="email" class="form-control" name="email" placeholder="Nhập vào email của bạn">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="inputLastName" class="form-label">Mật Khẩu</label>
                                            <input v-model="dang_nhap.password" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="d-grid">
                                                <button v-on:click="login()" type="button" class="btn btn-primary"><i class='bx bx-user'></i>Đăng Nhập</button>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	@include('admin.share.js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                dang_nhap   : {},
            },
            created()   {

            },
            methods :   {
                login() {
                    axios
                        .post('{{Route("adminLogin")}}', this.dang_nhap)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                setTimeout(() => {
                                    window.location.href = "/admin/lich-chieu/sap-chieu";
                                }, 500);
                            } else {
                                toastr.error(res.data.message, 'Error');
                                setTimeout(() => {
                                    window.location.href = "/admin/login";
                                }, 500);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                }
            },
        });
    </script>
</body>

</html>
