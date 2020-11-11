@include('layouts.header')

<main class="admin">
<section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="media-body m-auto">
                                <h1 class="mt-0">Content Post <img src="https://twemoji.maxcdn.com/2/72x72/1f397.png"
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
                            <div class="card-header">
                                <h5 class="m-b-0">
                                    <i class="mdi mdi-calendar"></i> Date and Time Pickers
                                </h5>

                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="pembayaran">Pembayaran</label>
                                        <input type="number" class="form-control" name="pembayaran" id="pembayaran" placeholder="Dalam Rupiah">

                                        <div class="mt-3">
                                            <label for="buruh_a">Buruh A</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="buruh_a">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label for="buruh_b">Buruh B</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="buruh_b">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label for="buruh_c">Buruh C</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="buruh_c">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="vl"></div> --}}
                                    <div class="form-group col-md-8">

                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-primary" id="save">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
</main>

        <div class="bg-gray-100">
            <div class="card-body ">
                    <div class="form-group col-md-4">
                        <label for="pembayaran">Pembayaran</label>
                        <input type="number" class="form-control" name="pembayaran" id="pembayaran" placeholder="Dalam Rupiah">
                    </div>
                    <hr>

                    <div class="form-group col-md-4">
                        <label for="buruh_a">Buruh A</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="buruh_a">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="buruh_b">Buruh B</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="buruh_b">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="buruh_c">Buruh C</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="buruh_c">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button class="btn btn-primary" id="save">Submit</button>
                    </div>
            </div>
        </div>
        <div>

            <h5>Buruh A: Rp. <h5 id="bonus_a"></h5></h5>
            <h5>Buruh B: Rp. <h5 id="bonus_b"></h5></h5>
            <h5>Buruh C: Rp. <h5 id="bonus_c"></h5></h5>
        </div>

        <script>

            $('#save').click((e)=>{
                var bonus = $('#pembayaran').val();
                var buruh_a = $('#buruh_a').val();
                var buruh_b = $('#buruh_b').val();
                var buruh_c = $('#buruh_c').val();
                var total_persen = parseInt(buruh_a)+parseInt(buruh_b)+parseInt(buruh_c);
                // console.log(total_persen);

                if(total_persen < 100){
                    alert('Pembagian bonus masih salah! Total '+total_persen+'%, kurang '+(100-total_persen)+'%.');
                }else{
                    alert('Pembagian bonus masih salah! Total '+total_persen+'%, lebih '+(total_persen-100)+'%.');
                }

                var bonus_a = bonus * (buruh_a / 100);
                var bonus_b = bonus * (buruh_b / 100);
                var bonus_c = bonus * (buruh_c / 100);

                $('#bonus_a').html(numeral(bonus_a).format('0,0'));
                $('#bonus_b').html(numeral(bonus_b).format('0,0'));
                $('#bonus_c').html(numeral(bonus_c).format('0,0'));
                console.log(bonus);
            })
        </script>
@include('layouts.footer')
