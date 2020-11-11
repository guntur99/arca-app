@include('layouts.header')

<main class="admin">
<section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="media-body m-auto">
                                <h1 class="mt-0">Form Input Bonus <img src="https://twemoji.maxcdn.com/2/72x72/1f397.png"
                                                                      width="20" alt=""></h1>
                            </div>
                        </div>
                    </div>

                    @include('layouts.menu')
                </div>
            </div>
        </div>

        <div class="container pull-up">
            <div class="row">
                <div class="col-lg-12">
                    <!--List post-->
                        <div class="card m-b-30">
                            <div class="card-header mt-3 row">
                                <div class="col-md-6">
                                    <h5 class="m-b-0">
                                        <i class="mdi mdi-cash-usd"></i> Pembayaran
                                    </h5>
                                    <input type="number" class="form-control mt-2" name="pembayaran" id="pembayaran" onkeyup="totalBonus()" placeholder="Dalam Rupiah">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="m-b-0">
                                        <i class="mdi mdi-cash-usd"></i> Pembagian Bonus Sementara
                                    </h5>
                                    <h4 class="mt-3">Rp. <span id="total_bonus">-</span></h4>
                                    {{-- <input type="number" class="form-control mt-2" name="pembayaran" id="pembayaran" placeholder="Dalam Rupiah"> --}}
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="mt-1">
                                            <label for="nama_buruh_1">Buruh 1</label>
                                            <div class="row">
                                                <div class="input-group mb-3 col-md-8">
                                                    <input type="text" class="form-control" id="nama_buruh_1" name="nama_buruh[]" onkeyup="namaBuruh(1)" placeholder="Nama Buruh">
                                                </div>
                                                <div class="input-group mb-3 col-md-4">
                                                    <input type="number" class="form-control" id="bonus_buruh_1" name="bonus_buruh[]" onkeyup="bonusBuruh(1)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label for="nama_buruh_2">Buruh 2</label>
                                            <div class="row">
                                                <div class="input-group mb-3 col-md-8">
                                                    <input type="text" class="form-control" id="nama_buruh_2" name="nama_buruh[]" onkeyup="namaBuruh(2)" placeholder="Nama Buruh">
                                                </div>
                                                <div class="input-group mb-3 col-md-4">
                                                    <input type="number" class="form-control" id="bonus_buruh_2" name="bonus_buruh[]" onkeyup="bonusBuruh(2)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label for="nama_buruh_3">Buruh 3</label>
                                            <div class="row">
                                                <div class="input-group mb-3 col-md-8">
                                                    <input type="text" class="form-control" id="nama_buruh_3" name="nama_buruh[]" onkeyup="namaBuruh(3)" placeholder="Nama Buruh">
                                                </div>
                                                <div class="input-group mb-3 col-md-4">
                                                    <input type="number" class="form-control" id="bonus_buruh_3" name="bonus_buruh[]" onkeyup="bonusBuruh(3)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="field_buruh"></div>
                                    </div>

                                    {{-- <div class="vl"></div> --}}
                                    <div class="form-group col-md-5 ml-4">
                                        <div class="mt-3">
                                            <label for="nama_buruh_display_1">Buruh 1</label>
                                            <div class="row ml-1">
                                                <p>Nama: <span id="nama_buruh_display_1">-</span></p>
                                                <div class="mb-3 col-md-6">
                                                    Bonus: Rp. <span id="bonus_buruh_display_1">-</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="mt-3">
                                            <label for="nama_buruh_display_2">Buruh 2</label>
                                            <div class="row ml-1">
                                                <p>Nama: <span id="nama_buruh_display_2">-</span></p>
                                                <div class="mb-3 col-md-6">
                                                    Bonus: Rp. <span id="bonus_buruh_display_2">-</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="mt-3">
                                            <label for="nama_buruh_display_3">Buruh 3</label>
                                            <div class="row ml-1">
                                                <p>Nama: <span id="nama_buruh_display_3">-</span></p>
                                                <div class="mb-3 col-md-6">
                                                    Bonus: Rp. <span id="bonus_buruh_display_3">-</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="field_buruh_display"></div>
                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-secondary" id="tambah_buruh" onclick="tambahBuruh()">Tambah Buruh</button>
                                    </div>
                                    <div class="form-group col-md-12 w-100 text-right">
                                        <hr>
                                        <button class="btn btn-primary" id="simpan" onclick="simpan()">Simpan Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
</main>

<script>

    var count = 3;
    function tambahBuruh(){
        count += 1;
        $('#field_buruh').append(`
            <div class="mt-3">
                <label for="nama_buruh_`+count+`">Buruh `+count+`</label>
                <div class="row">
                    <div class="input-group mb-3 col-md-8">
                        <input type="text" class="form-control" id="nama_buruh_`+count+`" name="nama_buruh[]" onkeyup="namaBuruh(`+count+`)" placeholder="Nama Buruh">
                    </div>
                    <div class="input-group mb-3 col-md-4">
                        <input type="number" class="form-control" id="bonus_buruh_`+count+`" name="bonus_buruh[]" onkeyup="bonusBuruh(`+count+`)">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>`
        );

        $('#field_buruh_display').append(`
            <hr>
            <div class="mt-3">
                <label for="nama_buruh_display_`+count+`">Buruh `+count+`</label>
                <div class="row ml-1">
                    <p>Nama: <span id="nama_buruh_display_`+count+`">-</span></p>
                    <div class="mb-3 col-md-6">
                        Bonus: Rp. <span id="bonus_buruh_display_`+count+`">-</span>
                    </div>
                </div>
            </div>`
        );
    }

    function simpan(){

        var bonus = $('#pembayaran').val();
        var total_persen = 0;
        for(var i=1; i<=count; i++){
            var x = $('#bonus_buruh_'+i).val();
            total_persen += parseInt(x);
        }

        var alert = '';
        if(total_persen < 100){
            alert = 'Pembagian bonus masih salah! Total '+total_persen+'%, kurang '+(100-total_persen)+'%.';
        }else if(total_persen > 100){
            alert = 'Pembagian bonus masih salah! Total '+total_persen+'%, lebih '+(total_persen-100)+'%.';
        }

        var arrBuruh = [];
        var nBuruh = [];
        var bBuruh = [];
        var nama_buruh = $('[name="nama_buruh[]"]');
        nama_buruh.each(function(){
            nBuruh.push($(this).val());
        });

        var bonus_buruh = $('[name="bonus_buruh[]"]');
        bonus_buruh.each(function(){
            bBuruh.push($(this).val());
        });

        for (let i = 0; i < nBuruh.length; i++) {
            arrBuruh.push({
                nama_buruh:nBuruh[i],
                bonus_buruh:bonus * (bBuruh[i] / 100),
                bonus_persen:bBuruh[i],
                total_bonus:bonus,
            });
        }

        if(total_persen !== 100){
            Swal.fire({
                title: 'Ada kesalahan input data!',
                text: alert,
                type: 'warning',
                showCancelButton: false,
                confirmButtonText: 'Tutup',
                allowOutsideClick: false,
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success px-3',
                    // cancelButton: 'btn btn-danger px-3 ml-2',
                    title: 'swal-title-custom',
                    content: 'swal-text-custom mb-2',
                    popup: 'swal-popup-custom'
                }
            });
        }else{
            var formData = new FormData();
            formData.append('data_buruh', JSON.stringify(arrBuruh));
            console.log(formData);

            axios.post('{{route("form.store")}}', formData).then((res) => {

                Swal.fire({
                    type: 'success',
                    title:'Berhasil!',
                    text:'Data Bonus Buruh berhasil disimpan.',
                    timer:3000,
                    closeOnClickOutside:false,
                    closeOnEsc: false,
                    buttons: false,
                }).then((resp) => {
                    location.reload();
                });

            }).catch((err) => {
                hideLoader();
                showModal('error', err.response.data.message);
            });
        }

    };

    function totalBonus() {
        var x = document.getElementById("pembayaran").value;
        document.getElementById("total_bonus").innerHTML = numeral(x).format('0,0');
    }

    function namaBuruh(num) {
        var x = document.getElementById("nama_buruh_"+num).value;
        document.getElementById("nama_buruh_display_"+num).innerHTML = x;
    }

    function bonusBuruh(num) {
        var x = parseInt(document.getElementById("bonus_buruh_"+num).value);
        var bayar = $('#pembayaran').val();
        var bonus = bayar * (x / 100);
        document.getElementById("bonus_buruh_display_"+num).innerHTML = numeral(bonus).format('0,0');
        console.log(bonus);
    }
</script>
@include('layouts.footer')
