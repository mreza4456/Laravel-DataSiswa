@extends('layout')
@section('content')

<div class=" mt-5 p-5 p-lg-1" style="width:auto;">
    <h2 class="mb-5">Edit Data Ekskul </h2>
    <form action="{{ route('ekskul.update',  $ekskul->id) }}" method="post">
        @csrf @method('put')
        <div class="mb-3">
            <label for="nama">Nama Ekskul</label>
            <input type="text" class="form-control" value="{{ $ekskul->nama_ekskul }}" name="nama_ekskul">
        </div>
        <div class="mb-3">
            <label for="nama">Jadwal</label>
            <label for="jadwal">Jadwal</label>
            <select class="form-select" name="jadwal" id="">
                <option selected>{{$ekskul->jadwal}}</option>
                <option name="" id="">Senin</option>
                <option name="" id="">Selasa</option>
                <option name="" id="">Rabu</option>
                <option name="" id="">Kamis</option>
                <option name="" id="">Jumat</option>
                <option name="" id="">Sabtu</option>
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>

</div>
@endsection