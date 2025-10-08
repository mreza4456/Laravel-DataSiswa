@extends('layout')
@section('content')

<div class=" mt-5 p-5 p-lg-1"style="width:auto;">
  <h2 class="mb-5">Tambah Data Siswa </h2>
   <form action="{{ route('siswa.update',  $siswa->id) }}" method="post">
                    @csrf @method('put')
        <div class="mb-3">
        <label for="nama">Nama</label>
        <input type="text" class="form-control"value="{{ $siswa->nama }}" name="nama">
        </div>
        <div class="mb-3">
   
          <label for="nama">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" id="">
              <option selected>{{ $siswa->jenis_kelamin}}</option>
              @if($siswa->jenis_kelamin ='Laki-Laki')
                <option name="" id="">Perempuan</option>
              @elseif($siswa->jenis_kelamin ='Perempuan')
              <option name="" id="">Laki-Laki</option>
              @endif
            </select>
        </div>
        <div class="mb-3">
        <label for="nama">Alamat</label>
        <input type="text" class="form-control"name="alamat" value="{{ $siswa->alamat }}">
        </div>
        <div class="mb-3">
           <div class="mb-3">
                                <label for="">Ekskul</label>
                                <select name="ekskul_id" class="form-select">
    @foreach ($ekskul as $item)
        <option value="{{ $item->id }}" {{ $item->id == $siswa->ekskul_id ? 'selected' : '' }}>
            {{ $item->nama_ekskul }}
        </option>
    @endforeach
</select>
                            </div>
        </div>
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>

</div>
@endsection