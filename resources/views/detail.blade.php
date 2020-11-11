@include('layouts.header')

<main class="admin">
<section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="media-body m-auto">
                                <h1 class="mt-0">Daftar Buruh </h1>
                            </div>
                        </div>
                    </div>

                    @include('layouts.menu')
                </div>
            </div>
        </div>

        <div class="container pull-up">
            <div class="row">

                <div class="col-md-12 m-b-30">
                    <div class="card ">
                        <div class="card-header border-bottom">
                            <div class="row text-muted  no-gutters align-items-center">
                                <div class="col-3 ">
                                  Nama
                                </div>
                                <div class="col-5 d-none d-md-block text-muted">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-12">Bonus Buruh</div>
                                    </div>
                                </div>
                                <div class="col-4 d-none d-md-block text-muted">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-12"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            {{-- @foreach ($buruh as $data) --}}

                                <div class="row p-t-10 p-b-10  align-items-center border-bottom">
                                    <div class="col-3">
                                        <div class="row no-gutters align-items-center">
                                            <div class="media col-12 align-items-center">
                                                <div class="avatar avatar">
                                                    <img src="light/assets/img/users/user-4.jpg" alt="..."
                                                        class="avatar-img rounded-circle">
                                                </div>
                                                <div class="media-body  ml-2">
                                                    <div class=" text-truncate"><h6>{{ $data->nama }}</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <a href="#" class="text-big"><h5>Rp. {{ $data->bonus }}</h5></a>
                                    </div>
                                    <div class="d-none d-md-block col-4 row">
                                        <button class="btn btn-primary" id="lihat_detail">Lihat Detail</button>
                                        <button class="btn btn-warning">Ubah Data</button>
                                        <button class="btn btn-danger">Hapus Data</button>
                                    </div>
                                </div>
                            {{-- @endforeach --}}

                        </div>

                   </div>
                </div>

            </div>
        </div>
    </section>
</main>

<script>

</script>
@include('layouts.footer')
