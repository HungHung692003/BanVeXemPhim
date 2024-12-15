@extends('admin.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
                <template v-for="(v, k) in list">
                    <div v-if="k == 0" class="carousel-item active">
                        <img style="height: 400px" v-bind:src="v.hinh_anh" class="d-block w-100" alt="...">
                    </div>
                    <div v-else class="carousel-item">
                        <img style="height: 400px" v-bind:src="v.hinh_anh" class="d-block w-100" alt="...">
                    </div>
                </template>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
@section('js')
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            list    :   [],
        },
        created()   {
            this.loadData();
        },
        methods :   {
            loadData() {
                axios
                    .post('/api/slide-hien-thi')
                    .then((res) => {
                        this.list   = res.data.data;
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            }
        },
    });
</script>
@endsection
