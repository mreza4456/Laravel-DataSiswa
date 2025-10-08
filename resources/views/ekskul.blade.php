@extends('layout')

@section('content')

<div class=" mt-5 p-5 p-lg-1" style="width:auto;">
    <div class="row">
        <div class="col-lg-5 p-3">
            <h2 class="mb-5">Tambah Ekskul </h2>
            <form action="{{ route('ekskul.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama Ekskul</label>
                    <input type="text" class="form-control" name="nama_ekskul">
                </div>
                <div class="mb-3">
                    <label for="nama">Jadwal</label>
                    <select class="form-select" name="jadwal" id="">
                        <option selected hidden disable>Pilih Jadwal</option>
                        <option name="" id="">Senin</option>
                        <option name="" id="">Selasa</option>
                        <option name="" id="">Rabu</option>
                        <option name="" id="">Kamis</option>
                        <option name="" id="">Jumat</option>
                        <option name="" id="">Sabtu</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark float-end mt-4">Submit</button>
            </form>


        </div>
        <div class="col-lg-7">
          
    <table class="table mt-5">
      @php $no=1 @endphp
        <tr>
            <th>No</th>
            <th>Nama Ekskul</th>
            <th>Jadwal</th>
            <th>Action</th>
        </tr>
        @forelse ($ekskul as $ekskul)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$ekskul -> nama_ekskul}}</td>
            <td>{{$ekskul -> jadwal}}</td>
            <td class="d-flex">
                <form action="{{route('ekskul.destroy',$ekskul->id)}}" method="post">@csrf @method('delete')<button
                        class="btn btn-danger mx-2" type="submit"><i class="bi bi-trash"></i></button></form>
                <a href="{{route('ekskul.edit',$ekskul->id)}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
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

</div>
@endsection