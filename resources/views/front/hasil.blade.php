@extends('front.layout.app')
@section('content')
    @if ($cekhasil->hasil == 1)
    <div class="container mt-1 mt-md-5 pt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="title">Data Hasil Quick Count</h1>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else 
    <div class="container mt-1 mt-md-5 pt-5">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="title">Mohon Ditunggu Ya !!! Hasil Pemilihannya Akan Segera Di Tampilkan</h1>
                <div class="p-5">
                    <img src="{{ asset('front/wait.svg') }}" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('js')
    <script>
        $(() => {
            getGrafik()
            getAkun()
            getAkunBelumVoting()
            getAkunSudahVoting()
        })

        const getGrafik = () => {
            $.getJSON("{{ route('hasil.ajax') }}", function(data) {
                var label = [];
                var jumlah = [];
                $(data).each(function(i) {
                    label.push(data[i].name)
                    jumlah.push(data[i].jumlah)
                })

                grafik(label, jumlah)
            })
        }

        const getAkun = () => {
            $.getJSON("{{ route('hasil.ajax.akun') }}", function(data) {
                $('#total-akun').text(data.jumlah)
            })
        }

        const getAkunBelumVoting = () => {
            $.getJSON("{{ route('hasil.ajax.akunbelumvoting') }}", function(data) {
                $('#total-akun-belum-voting').text(data.jumlah)
            })
        }

        const getAkunSudahVoting = () => {
            $.getJSON("{{ route('hasil.ajax.akunsudahvoting') }}", function(data) {
                $('#total-akun-sudah-voting').text(data.jumlah)
            })
        }

        $('#btn-refresh').on('click', function() {
            $('#total-akun').text('Mengambil Data')
            $('#total-akun-belum-voting').text('Mengambil Data')
            $('#total-akun-sudah-voting').text('Mengambil Data')
            getGrafik()
            getAkun()
            getAkunBelumVoting()
            getAkunSudahVoting()
        })


        const grafik = (label, jumlah) => {
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Hasil Perolehan Suara',
                        data: jumlah,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

    </script>
@endsection
