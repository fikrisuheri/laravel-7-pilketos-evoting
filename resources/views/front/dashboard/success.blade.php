@extends('front.layout.app')
@section('content')
    @php
    $cek = \App\Pemilih::where('npm',session()->get('npm'))->first()
    @endphp
    @if ($cek->kandidat_id == null)
        <div class="container py-4">
            <div class="row mb-4">
                <div  class="col-md-12 text-center">
                    <div class="title">Selamat Datang di Evoting <br> PEMIRA ESA UNGGUL 2020 - 2021</div>
                    <div class="subtitle">Silahkan Pilih Calon Pilihanmu</div>
                </div>
            </div>
            <div class="row">
                @foreach ($kandidats as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm" data-aos="zoom-in" data-aos-duration="650">
                            <img class="card-img-top" src="{{ asset('storage/' . $item->avatar) }}" alt="Card image cap">
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
                                        <label for="">Nomor Urut</label><br>
                                        {{ $item->nomor_urut }}
                                    </div>
                                    <div>
                                        <label for="">Jurusan</label><br>
                                        {{ $item->jurusan }}
                                    </div>
                                    <div>
                                        <label for="">Visi</label>
                                        {!! $item->visi !!}
                                    </div>
                                    <div>
                                        <label for="">Misi</label>
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
        <div data-aos="fade-up" data-aos-delay="100" class="container py-4">
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <div class="title">Anda Telah Melakukan Voting</div>
                </div>
            </div>
        </div>
    @endif
@endsection
