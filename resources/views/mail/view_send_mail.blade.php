<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <form action="/view-send-mail" method="post">
                        @csrf
                        <div class="card-header">
                            Gửi Email
                        </div>
                        <div class="card-body">
                            <textarea name="list_mail" class="form-control mt-3" cols="30" rows="5" placeholder="Nhập vào danh sách email"></textarea>
                            <input name="tieu_de" type="text" class="form-control mt-3" placeholder="Nhập vào tiêu đề">
                            <textarea name="noi_dung" class="form-control mt-3" cols="30" rows="5" placeholder="Nhập vào nội dung email"></textarea>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Gửi Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
