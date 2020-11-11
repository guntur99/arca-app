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
                            @foreach ($buruh as $data)

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
                                    <div class="col-6">
                                        <a href="#" class="text-big"><h5>Rp. {{ $data->bonus }}</h5></a>
                                    </div>
                                    <div class="d-none d-md-block col-3 row">
                                        <button class="btn btn-primary" onclick="lihatDetail({{ $data->id }})">Lihat Detail</button>
                                        <button class="btn btn-danger" onclick="hapus({{ $data->id }})">Hapus Data</button>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                   </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="detailBuruhModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Total Bonus: Rp. <span id="total_bonus"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-0">
                        <div class="col-12 mb-3">
                            <div class="form-row">
                                <div class="form-group col-md-12" id="did_n">
                                    <label for="nama_buruh">Nama Buruh</label>
                                    <input type="text" class="form-control" name="nama_buruh" id="nama_buruh" disabled>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="bonus_buruh">Bonus Buruh</label>
                                    <h5>Rp. <span id="bonus_buruh"></span></h5>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="bonus_persen">Bonus Buruh</label>
                                    <div class="input-group ">
                                        <input type="number" autocomplete="off" class="form-control" onkeyup="bonusPersen()" id="bonus_persen" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_edit" class="btn btn-info" onclick="edit()"> Ubah Data</button>
                    <button type="button" id="btn_simpan" class="btn btn-success d-none" onclick="simpan()"> Simpan Data</button>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    var totalB = 0;
    var idB = 0;
    function lihatDetail(id){
        axios.get('{{url("detail-buruh")}}/'+id).then((res) => {
            var buruh = res.data[0];
            $('#detailBuruhModal').modal('show');
            $('#nama_buruh').val(buruh.nama);
            $('#bonus_buruh').html(buruh.bonus);
            $('#bonus_persen').val(buruh.bonus_persen);
            $('#total_bonus').html(numeral(buruh.total_bonus).format('0,0'));
            totalB = buruh.total_bonus;
            idB = buruh.id;
        });
    };

    function edit(){
        $('#nama_buruh').prop('disabled', false);
        $('#bonus_persen').prop('disabled', false);
        $('#btn_edit').addClass('d-none');
        $('#btn_simpan').removeClass('d-none');
        $('#btn_hapus').addClass('d-none');
    };

    var bonusB = 0;
    function bonusPersen() {
        var x = parseInt(document.getElementById("bonus_persen").value);
        var bonus = totalB * (x / 100);
        document.getElementById("bonus_buruh").innerHTML = bonus;
        bonusB = bonus;
    }

    function simpan(){
        $('#nama_buruh').prop('disabled', true);
        $('#bonus_persen').prop('disabled', true);
        $('#btn_simpan').addClass('d-none');

        var formData = new FormData();
        formData.append('id', idB);
        formData.append('nama', $('#nama_buruh').val());
        formData.append('bonus', bonusB);
        formData.append('bonus_persen', $('#bonus_persen').val());

        axios.post('{{route("form.update")}}', formData).then((res) => {

            Swal.fire({
                type: 'success',
                title:'Berhasil!',
                text:'Data Bonus Buruh berhasil dirubah.',
                timer:3000,
                closeOnClickOutside:false,
                closeOnEsc: false,
                buttons: false,
            }).then((resp) => {
                $('#detailBuruhModal').modal('hide');
                location.reload();
            });

        }).catch((err) => {
            showModal('error', err.response.data.message);
        });
    };

    function hapus(id){
        Swal.fire({
            title: 'Perhatian!',
            text: "Apakah anda yakin?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            allowOutsideClick: false,
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-success px-3 ml-2',
                cancelButton: 'btn btn-danger px-3 ml-2',
                title: 'swal-title-custom',
                content: 'swal-text-custom mb-2',
                popup: 'swal-popup-custom'
            }
        }).then((result) => {
            if (result.value) {
                axios.post('{{url("delete")}}/'+id).then((res) => {
                    location.reload();
                }).catch((err) => {
                    showModal('error', err.response.data.message);
                });
            }
        });
    };

</script>
@include('layouts.footer')
