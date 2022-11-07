<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Telpon;
use Session;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insert Siswa
        $siswa = Siswa::create($request->all());

        //Insert Telepon
        if($request->filled('nomor_telepon')){
            $this->insertTelepon($siswa, $request);
        }

        return redirect()->route('siswa.index');
    }
    private function insertTelepon(Siswa $siswa, Request $request){
        $telepon = new Telpon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view ('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $input = $request->all();

        // Update siswa.
        $siswa->update($input);

        // Update telepon.
        $this->updateTelepon($siswa, $request);

        // Flash message.
        Session::flash('flash_message', 'Data siswa berhasil diupdate.');

        return redirect()->route('siswa.index');
    }
    private function updateTelepon(Siswa $siswa, Request $request) {
        if ($siswa->telepon) {
            // Jika telp diisi, update.
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            // Jika telp tidak diisi, hapus.
            else {
                $siswa->telepon()->delete();
            }
        }
        // Buat entry baru, jika sebelumnya tidak ada no telp.
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telpon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        // Flash message.
        Session::flash('flash_message', 'Data siswa berhasil dihapus.');
        Session::flash('penting', true);

        return redirect()->route('siswa.index');
    }
}
