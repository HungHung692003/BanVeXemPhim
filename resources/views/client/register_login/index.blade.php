<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Customer</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="asstes_client_login_regis/img/favicon.ico">
    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="asstes_client_login_regis/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="asstes_client_login_regis/css/plugins/glightbox.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <!-- Plugin css -->
    <link rel="stylesheet" href="asstes_client_login_regis/css/vendor/bootstrap.min.css">
    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="asstes_client_login_regis/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <!-- Start header area -->

    <!-- End header area -->


    <main id="app" class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="/">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding">
            <div class="container">
                <form action="#">
                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title mb-10">Đăng Nhập</h2>
                                        <p class="account__login--header__desc">Đăng Nhập Tại Đây Nếu Bạn Đã Là Thành
                                            Viên</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                            <input v-model="dang_nhap.email" class="account__login--input" placeholder="Email Addres"
                                                type="email">
                                        </label>
                                        <label>
                                            <input v-model="dang_nhap.password" class="account__login--input" placeholder="Password" type="password">
                                        </label>
                                        <button v-on:click="login()" class="account__login--btn primary__btn" type="button">Login</button>
                                        <div class="account__login--divide">
                                            <span class="account__login--divide__text">OR</span>
                                        </div>
                                        <div class="account__social d-flex justify-content-center mb-15">
                                            <a class="account__social--link facebook" target="_blank"
                                                href="https://www.facebook.com">Facebook</a>
                                            <a class="account__social--link google" target="_blank"
                                                href="https://www.google.com">Google</a>
                                            <a class="account__social--link twitter" target="_blank"
                                                href="https://twitter.com">Twitter</a>
                                        </div>
                                        <p class="account__login--signup__text"><button
                                                type="button"><a href="/forgot-password">Quên Mật Khẩu</a></button></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title mb-10">Tạo Tài Khoản</h2>
                                        <p class="account__login--header__desc">Tạo Tài Khoản Tại Đây Để Trở Thành Thành
                                            Viên</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                            <input v-model="them_moi.ho_va_ten" class="account__login--input" placeholder="Họ Và Tên" type="text">
                                        </label>
                                        <label>
                                            <input v-model="them_moi.ngay_sinh" class="account__login--input" placeholder="Ngày Sinh" type="date">
                                        </label>
                                        <label>
                                            <input v-model="them_moi.dia_chi" class="account__login--input" placeholder="Địa Chỉ" type="text">
                                        </label>
                                        <label>
                                            <input v-model="them_moi.email" class="account__login--input" placeholder="Địa Chỉ Mail"
                                                type="email">
                                        </label>
                                        <label>
                                            <input v-model="them_moi.password" class="account__login--input" placeholder="Password" type="password">
                                        </label>
                                        <label>
                                            <input v-model="them_moi.re_password" class="account__login--input" placeholder="Nhập lại mật khẩu"
                                                type="password">
                                        </label>
                                        <label>
                                            <input v-model="them_moi.so_dien_thoai" class="account__login--input" placeholder="Số điện thoại"
                                                type="tel">
                                        </label>
                                        <button v-on:click="register()" class="account__login--btn primary__btn mb-10" type="button">Đăng
                                            Ký</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End login section  -->

        <!-- Start shipping section -->

        <!-- End shipping section -->

    </main>



    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <!-- All Script JS Plugins here  -->
    <script src="asstes_client_login_regis/js/vendor/popper.js" defer="defer"></script>
    <script src="asstes_client_login_regis/js/vendor/bootstrap.min.js" defer="defer"></script>
    <script src="asstes_client_login_regis/js/plugins/swiper-bundle.min.js"></script>
    <script src="asstes_client_login_regis/js/plugins/glightbox.min.js"></script>

    <!-- Customscript js -->
    <script src="asstes_client_login_regis/js/script.js"></script>
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                them_moi    :   {},
                dang_nhap   :   {},
            },
            created()   {

            },
            methods :   {
                register() {
                    axios
                        .post('{{ Route("register") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                            } else {
                                toastr.error('Có cái lỗi gì đó tao không biết!', 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                login() {
                    axios
                        .post('{{ Route("login") }}', this.dang_nhap)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                setTimeout(() => {
                                    window.location.href = "/";
                                }, 700);
                            } else {
                                toastr.error(res.data.message, 'Error');
                                setTimeout(() => {
                                    window.location.href = "/login";
                                }, 700);
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
    </script>
</body>

</html>
