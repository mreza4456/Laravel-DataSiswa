@extends('layout')

@section('content')
<div class=" mt-5 p-5 p-lg-1" style="width:auto;">
    <div class="row ">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card  shadow p-3 bg-primary border-0 text-light ">
                <h5>Jumlah Siswa:</h5>
                <h2 class="text-center py-3">{{$jumlah_siswa}}</h2>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow p-3 bg-warning border-0 text-light ">
                <h5>Jumlah Ekskul:</h5>
                <h2 class="text-center py-3">{{$jumlah_ekskul}}</h2>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow p-3 bg-success border-0 text-light ">
                <h5>Laki-Laki</h5>
                <h2 class="text-center py-3">{{$jumlahLaki}}</h2>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow p-3 bg-danger border-0 text-light ">
                <h5>Siswa Perempuan:</h5>
                <h2 class="text-center py-3">{{$jumlahPerempuan}}</h2>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border-0 p-3 px-2">
                    <h4 class="text-center">Jenis Kelamin</h4>
                    <canvas id="chartJenisKelamin"></canvas>
                </div>
                
            </div>
            <div class="col-lg-8">
                <div class="card border-0 p-3">
                    <h4 class="text-center"> Jumlah Siswa Yang Mengikuti Ekskul</h4>
                    <canvas id="chartEkskul"></canvas>

                </div>
                
            </div>
            <div class="col-lg-12">
                <div class="card border-0 p-3 mt-4">
                      <h4 class="text-center">Jadwal Ekskul per Minggu</h4>
                    <canvas id="barChartEkskul"></canvas>
               </div>
          

            </div>
        </div>


    </div>

</div>
@endsection