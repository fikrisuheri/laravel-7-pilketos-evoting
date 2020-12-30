@extends('front.layout.app')
@section('content')
    <div class="datone">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-6 mb-4">
                    <h2 class="heading">Pilketos SMKN 1 Kawali 20202</h2>
                    <h3 class="subheading">Selamat datang di website Pemilihan Ketua dan Wakil Ketua OSIS SMK Negeri 1
                        Kawali Periode 2020/2021</h3>
                    <div class="btnvote">
                        <a href="#login" class="btn btn-primary mt-4 btn-voting">VOTING SEKARANG</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('front/option.svg') }}" width="100%" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-top" id="tatacara">
        <div class="container">
            <div class="ta-heading">
                <h1>Tata Cara Pemungutan Suara</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="tata-cara">
                        <div class="tatacara-icon">
                            <img src="{{ asset('image/login.svg') }}" alt="image" class="img-fluid" />
                        </div>
                        <h2>1. Login Pemilih</h2>
                        <p>Masukkan NIS dan Token kamu</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tata-cara">
                        <div class="tatacara-icon">
                            <img src="{{ asset('image/kandidat.svg') }}" alt="image" class="img-fluid" />
                        </div>
                        <h2>2. Dashboard E-Voting</h2>
                        <p>Lihat dan Pilih Kandidat</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tata-cara">
                        <div class="tatacara-icon">
                            <img src="{{ asset('image/success.svg') }}" alt="image" class="img-fluid" />
                        </div>
                        <h2>3. Selesai</h2>
                        <p>Ditunggu hasil voting keseluruhan ya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card border-0 rounded-lg shadow" id="login">
                    <div class="card-body">
                        <div class="title">Login Pemilih</div>
                        <div class="subtitle">Silahkan login untuk melakukan voting</div>
                        <form action="{{ route('masuk') }}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <input type="text" name="npm" class="form-control" style="height: 45px"
                                    placeholder="Masukan NIM">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" style="height: 45px"
                                    placeholder="Masukan Token">
                            </div>
                            @if (session('status'))
                                <div class="alert alert-warning">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
                            <small>Memiliki Masalah Saat Melakukan Voting ?</small>
                            <a href="https://api.whatsapp.com/send?phone=6281222627526&text=Halo Admin ! Saya Memiliki Masalah Saat Melakukan Evoting, Mohon Di Bantu Ya ! "
                                class="btn btn-success btn-block">Hubungi Admin</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 pt-5">
                    <p class="copyright">Copyright &copy; 2020. All right reserved. <a href="">Fikri Suheri</a></p>
                    <a href="https://stories.freepik.com/sport">Illustration by Freepik Stories</a>
                </div>
            </div>
        </div>
    </div>
@endsection
