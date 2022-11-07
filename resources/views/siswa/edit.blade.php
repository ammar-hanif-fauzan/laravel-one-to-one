@extends('layouts.app')
@section('content')
<main role="main" class="container">
    <div class="col-md-12">
        <div class="content">
            <form action="{{Route('siswa.update',$siswa->id)}}" method="post">
                @method('PUT')
                @csrf
                <input type="text" name="nama_siswa" value="{{$siswa->nama_siswa}}"><br><br>
                <input type="text" name="nomor_telepon" value="{{$siswa->telepon->nomor_telepon}}"><br><br>
                <a class="btn" href="{{ url('/') }}/siswa">Kembali</a>
                <input type="submit" name="submit">
            </form> 
        </div>
    </div>
</main>
@endsection