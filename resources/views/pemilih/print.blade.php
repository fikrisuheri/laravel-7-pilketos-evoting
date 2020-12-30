<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $request->kelas }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="window.print()">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($pemilih as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->npm }}</td>
                                    <td>{{ $item->password }}</td>
                                    <td>{{ $item->fakultas }}</td>
                                    <td>{{ $item->jurusan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>