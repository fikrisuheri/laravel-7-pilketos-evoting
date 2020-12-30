@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Akun Evoting</h4>
                    <div class="card-header-action">
                        <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('pemilih.hapus') }}')"
                            class="btn btn-danger mr-2">
                            Hapus Semua Akun
                        </a>
                        <a href="{{ route('pemilih.tambah') }}" class="btn btn-primary mr-2">
                            Tambah
                        </a>
                        <a href="javascript:;"  data-toggle="modal"
                        data-target="#modalPrint" class="btn btn-info mr-2">
                            Print PDF
                        </a>
                        <button type="button" class="btn btn-success mr-2" data-toggle="modal"
                            data-target="#exampleModal">
                            Import Excel
                        </button>
                        <a href="{{ asset('excel/contoh.xlsx') }}" class="btn btn-warning mr-2">
                            Download Format Import
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-hover" id="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Token</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akuns as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->npm }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>{{ $item->fakultas }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>
                                            <div class="alert {{ $item->kandidat_id == null ? 'alert-warning' : 'alert-primary' }}"
                                                role="alert">
                                                {{ $item->kandidat_id == null ? 'Belum Voting' : 'Sudah Voting' }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                onclick="alertconfirmn('{{ route('pemilih.hapus.id', $item->id) }}')"
                                                class="btn btn-danger mr-2">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('modal')
    <div class="modal fade" id="modalPrint" tabindex="-1" role="dialog"
        aria-labelledby="modalPrintLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPrintLabel">Print PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('pemilih.print') }}" target="_blank" enctype="multipart/form-data" method="GET">
                    @csrf
                    <select name="kelas" id="" class="form-control" >
                        @foreach ($kelas as $kel)
                            <option value="{{ $kel->fakultas }}">{{ $kel->fakultas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Import</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('pemilih.import') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="file" id="" class="form-control" placeholder="Masukan File Excel">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Import</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
