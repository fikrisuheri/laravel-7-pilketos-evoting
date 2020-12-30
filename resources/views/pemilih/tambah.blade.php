@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Akun Evoting</h4>
                <div class="card-header-action">
                    <a href="javascript:void(0)" id="btn-back" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pemilih.simpan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="text" class="form-control @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}">
                        @error('npm')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                    <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas') }}">
                        @error('fakultas')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}">
                        @error('jurusan')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                <input type="hidden" name="password"  value="{{ Str::random(8) }}">
                    <div class="text-right">
                        <button type="submit" id="btn-submit" class="btn btn-success">Generate Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection