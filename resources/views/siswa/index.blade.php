@extends('layouts.app')
@section('content')
<main role="main" class="container">
    <div class="col-md-12">
            <div class="content">
                <h6><a href="{{Route('siswa.create')}}"> TAMBAH SISWA </a></h6>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NAMA SISWA</th>
                            <th>NOMOR TELPON</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->nama_siswa}}</td>
                            <td>{{$item->telepon->nomor_telepon}}</td>
                            <td>
                                <form action="{{Route('siswa.destroy', ['id'=>$item->id])}}" method="post" >
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{Route('siswa.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
