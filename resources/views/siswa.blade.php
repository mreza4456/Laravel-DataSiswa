@extends('layout')
@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nama">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" id="">
                            <option disable selected hidden>Laki-Laki/Perempuan</option>
                            <option name="" id="">Laki-Laki</option>
                            <option name="" id="">Perempuan</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="nama">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="mb-4">
                        <label for="">Ekskul</label>
                        <select name="ekskul_id" id="" class="form-select">
                            <option disable selected hidden>PIlih ekskul</option>
                            @forelse ($ekskul as $row)
                            <option value="{{$row->id}}">{{$row->nama_ekskul}}</option>
                            @empty
                            <option>data tidak ditemukan</option>
                            @endforelse

                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark float-end ">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>






<form action="{{ route('siswa.index') }}" method="GET">
    <div class="row">
        <h3 class="mb-4">Data Siswa</h3>
        <div class="col-lg-3 col-md-6">

            <div class="d-flex mb-3">
                <input type="text" name="search" class="form-control rounded-0 rounded-start"
                    placeholder="Cari nama siswa..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary rounded-0 rounded-end"><i
                        class="bi bi-search "></i></button>
            </div>
        </div>
        <div class="col-lg-3">

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="d-flex mb-3">
                <select class="form-select rounded-0 rounded-start" name="ekskul_id">
                    <option disable selected hidden value="">Filter Ekskul</option>
                    @foreach ($ekskul as $item)
                    <option value="{{ $item->id }}" {{ request('ekskul_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_ekskul }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-secondary rounded-0 rounded-end"><i
                        class="bi bi-filter"></i></button>
            </div>
        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-primary float-start mb-3" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="bi bi-file-earmark-plus"></i>&ensp; Tambah Data
            </button>

        </div>




    </div>

    </div>


</form>



<div class="container">

<table class="table p-3">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Ekskul</th>
        <th>Action</th>
    </tr>
    @php $no=1 @endphp
    @forelse ($siswa as $siswa)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$siswa -> nama}}</td>
        <td>{{$siswa -> jenis_kelamin}}</td>
        <td>{{$siswa -> alamat}}</td>
        <td>{{ $siswa->ekskul->nama_ekskul ?? 'Belum terdaftar' }}</td>
        <td>
            <div class="d-flex">
                <a href="{{route('siswa.edit',$siswa->id)}}" class="btn btn-warning mb-3 "><i
                        class="bi bi-pencil"></i></a>
                <button type="button" class=" btn btn-danger float-end mb-3 mx-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{$siswa ->id}}">
                    <i class="bi bi-trash"></i>
                </button>

                <div class="modal fade" id="exampleModal{{$siswa ->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                Apakah Anda Yakin Mau Menghapusnya ?

                            </div>
                            <div class="modal-footer">


                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>

                                <form action="{{route('siswa.destroy',$siswa->id)}}" method="post">@csrf
                                    @method('delete')<button type="submit" class="btn btn-primary">Iya</button></form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">data tidak ditemukan</td>
    </tr>
    @endforelse
</table>

</div>

</div>

@endsection