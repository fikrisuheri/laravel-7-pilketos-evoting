@extends('front.layout.app')
@section('content')
    @if ($cek->kandidat_id == null)
        @if ($cekvoting->voting == 1)
            <div class="container py-5 mt-5">
                <div class="row mb-4">
                    <div class="col-md-12 text-center">
                        <div class="title">Selamat Datang {{ $cek->name }} ! di Evoting PILKETOS <br> SMK Negeri 1 Kawali Periode 2020/2021
                        </div>
                        <div class="subtitle">Silahkan Pilih Calon Pilihanmu</div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($kandidats as $item)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card shadow border-0 rounded-0">
                                <img class="card-img-top" src="{{ asset('storage/' . $item->avatar) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                        data-target="#exampleModal{{ $item->id }}">
                                        Lihat
                                    </button>
                                    <a href="javascript:void(0)"
                                        onclick="alertconfirmn('{{ route('front.simpan', $item->id) }}','{{ $item->name }}')"
                                        class="btn btn-block btn-primary">Pilih</a>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="card-img-top" src="{{ asset('storage/' . $item->avatar) }}"
                                            alt="Calon Kandidat">
                                        <div class="mt-4">
                                            <label for="" style="font-weight: bold">Nomor Urut</label><br>
                                            {{ $item->nomor_urut }}
                                        </div>
                                        <div>
                                            <label for="" style="font-weight: bold">Jurusan</label><br>
                                            {{ $item->jurusan }}
                                        </div>
                                        <div>
                                            <label for="" style="font-weight: bold">Visi</label>
                                            {!! $item->visi !!}
                                        </div>
                                        <div>
                                            <label for="" style="font-weight: bold">Misi</label>
                                            {!! $item->misi !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="container py-5 mt-1 mt-md-5">
                <div class="row mb-4">
                    <div class="col-md-6 mx-auto text-center">
                        <div class="title">Mohon Maaf Kak {{ $cek->name }} ! Voting Telah Di Tutup</div>
                        <div class="p-5">
                            <img src="{{ asset('front/success.svg') }}" alt="" srcset="">
                        </div>
                        <a href="{{ route('front.hasil') }}" class="btn btn-primary">Lihat Hasil</a>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="container py-5 mt-1 mt-md-5">
            <div class="row mb-4">
                <div class="col-md-6 mx-auto text-center">
                    <div class="title">Selamat {{ $cek->name }} ! Kamu Telah Melakukan Pemilihan</div>
                    <div class="subtitle">Silahkan Ditunggu Ya Untuk Pengumuman Hasilnya</div>
                    <div class="p-5">
                        <img src="{{ asset('front/success.svg') }}" alt="" srcset="">
                    </div>
                    <a href="{{ route('front.hasil') }}" class="btn btn-primary">Lihat Hasil</a>
                </div>
            </div>
        </div>
    @endif
@endsection
