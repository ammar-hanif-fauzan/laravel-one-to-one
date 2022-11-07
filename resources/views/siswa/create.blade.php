@extends('layouts.app')
@section('content')
<main role="main" class="container">
    <div class="col-md-12">
        <div class="content">
            <form action="{{Route('siswa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="nama_siswa" placeholder="nama siswa"><br><br>
                    <input type="text" name="nomor_telepon" placeholder="nomor telepon"> <br><br>
                    <a class="btn" href="{{ url('/') }}/siswa">Kembali</a>
                    <input type="submit" value="simpan">
                </form>
        </div>
    </div>
</main>
@endsection
