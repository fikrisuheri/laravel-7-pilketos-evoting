@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }}</h4>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <h5>Izinkan Pemilih Melakukan Voting </h5>
                            @if ($setting->voting == 0)
                                <a href="{{ route('setting.update',['status' => 1,'field' => 'voting']) }}" class="ml-3 btn btn-success">Aktifkan</a>
                            @else
                                <a href="{{ route('setting.update',['status' => 0,'field' => 'voting']) }}" class="ml-3 btn btn-warning">Non Aktifkan</a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <h5>Tampilkan Hasil Voting </h5>
                            @if ($setting->hasil == 0)
                                <a href="{{ route('setting.update',['status' => 1,'field' => 'hasil']) }}" class="ml-3 btn btn-success">Aktifkan</a>
                            @else
                                <a href="{{ route('setting.update',['status' => 0,'field' => 'hasil']) }}" class="ml-3 btn btn-warning">Non Aktifkan</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
