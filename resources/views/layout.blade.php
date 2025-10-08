<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DATA SISWA</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    

</head>
<style>
    body{
        overflow-x: hidden;
    }
.ib {
    font-size: 1.5rem;
}

.navbar-nav {
    text-align: center;

}

.nav-item {
    transition: 1.5s
}

.nav-item :hover {

    transform: scale(1.1);

}

@media only screen and (min-width:990px) {
    .navbar-nav {
        padding: 30px;
        text-align: left;

    }

    .ib {
        margin-right: 20px;
    }
    .dn{
        display: none;
    }
}
@media only screen and (max-width:990px) {
    .rp{
        margin-top:70px;
       

    }
    .db{
        display:none;
    }
    

    
}
@media only screen and (max-width:650px) {
    
    .table{
        width:300px;
        font-size:10px;
        margin-left:60px;
    }
    .siswaH

    .dn{
        display: none;
    }
}
</style>

<body>
    <nav class="navbar bg-dark shadow fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-light p-2">DATA SISWA</span>
            <span><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle mx-4" type="button" data-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-person-fill"></i>&nbsp;&nbsp;{{ auth()->user()->username }}&nbsp;&nbsp;
  </button>
  <div class="dropdown-menu">

    
   
    <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1">Logout &nbsp;&nbsp;<i class="bi bi-box-arrow-right "></i></a> 
  </div>
</div>
        
    </nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
        Anda yakin Log Out ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <div class="row mt-3">
        <div class="col-1 col-lg-2 col-m-1 col-s-1 col-xs-1" style="position:fixed;">
            <div class=" bg-secondary" style="min-width:70px;height:100vh;">
                <h2></h2>
                <ul class="navbar-nav text-light ">

                    <li class="nav-item border-bottom border-light rp">
                        <a href="/dashboard" class="nav-link p-3 "><i class="bi bi-house-fill ib"></i>Home</a>
                    </li>
                    <li class="nav-item border-bottom border-light">
                        <a href="/siswa" class="nav-link p-3"><i class="bi bi-table ib"></i>Siswa</a>
                    </li>
                    <li class="nav-item border-bottom border-light">
                        <a href="/ekskul" class="nav-link p-3"><i class="bi bi-person-arms-up ib"></i>Ekskul</a>
                    </li>
                  
                 
                </ul>
            </div>
        </div>
        <div class="row">
              <div class="col-1 col-lg-2 col-m-1 col-s-1 col-xs-1"></div>
               <div class="col-11 col-lg-10 col-m-11 col-s-11 col-xs-11">
        
            <div class="container"style="margin-top:90px;">
                @yield('content')
            </div>
        </div>
        </div>
       


    </div>

    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- PIE CHART: Jenis Kelamin -->
<script>
    const pieCtx = document.getElementById('chartJenisKelamin').getContext('2d');

    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($jenis_kelamin_chart->keys()) !!},
            datasets: [{
                label: 'Jumlah Siswa',
                data: {!! json_encode($jenis_kelamin_chart->values()) !!},
                backgroundColor: ['#36A2EB', '#FF6384'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            scales: {
                x: { display: false },
                y: { display: false }
            }
        }
    });
</script>

<!-- BAR CHART: Ekskul -->
<script>
    const ekskulCtx = document.getElementById('chartEkskul').getContext('2d');

    new Chart(ekskulCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($ekskul_chart)) !!},
            datasets: [{
                label: 'Jumlah Siswa',
                data: {!! json_encode(array_values($ekskul_chart)) !!},
                backgroundColor: [
                    '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
                    '#66BB6A', '#EF5350', '#AB47BC', '#FFA726'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>

<!-- BAR CHART: Ekskul Mingguan (Hari) -->
<script>
    const barHariCtx = document.getElementById('barChartEkskul').getContext('2d');

    const hariList = {!! json_encode($hariList) !!};
    const jumlahEkskul = {!! json_encode(array_values($jumlahEkskul)) !!};
    const ekskulTooltips = {!! json_encode(array_values($ekskulPerHari)) !!};

    new Chart(barHariCtx, {
        type: 'line',
        data: {
            labels: hariList,
            datasets: [{
                label: 'Jumlah Ekskul',
                data: jumlahEkskul,
                backgroundColor: '#42A5F5',
                borderWidth: 10,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const index = context.dataIndex;
                            const ekskuls = ekskulTooltips[index];
                            return ekskuls.length > 0
                                ? 'Ekskul: ' + ekskuls.join(', ')
                                : 'Tidak ada ekskul';
                        }
                    }
                },
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

@if(session('success_edit'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data Telah Berhasil Di Update',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#search').on('keyup', function () {
        let query = $(this).val();
        $.ajax({
            url: "{{ route('siswa.search') }}",
            type: "GET",
            data: { search: query },
            success: function (data) {
                $('#siswa-table').html(data);
            }
        });
    });
</script>

</body>

</html>