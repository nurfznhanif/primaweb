<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use App\Models\Poliklinik;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{

    public function index()
    {
        return view('adminView/dokter', [
            'tittle' => 'Dokter',
            'dokters' => Dokter::latest()->filter(request(['search', 'poliklinik']))->paginate(7)->withQueryString()

        ]);
    }


    public function create()
    {
        return view('adminView/dokterCreate', [
            'tittle' => 'Dokter',
            'poliklinik' => Poliklinik::all()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:dokters',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:dokters',
            'alamat_domisili' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'riwayat' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('dokter-images');
        }

        Dokter::create($validatedData);

        return redirect('/dashboard/dokter')->with('pesan', 'dokter berhasil ditambah');
    }


    public function show(Dokter $dokter)
    {

        return view('adminView/dokterDetail', [
            'tittle' => 'Dokter',
            'senin' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Senin')->first(),
            'selasa' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Selasa')->first(),
            'rabu' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Rabu')->first(),
            'kamis' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Kamis')->first(),
            'jumat' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Jumat')->first(),
            'sabtu' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Sabtu')->first(),
            'minggu' => JadwalDokter::where('dokter_id', $dokter->id)->where('hari', 'Minggu')->first(),
            'dokter' => $dokter
        ]);
    }


    public function edit(Dokter $dokter)
    {
        return view('adminView/dokterEdit', [
            'tittle' => 'Dokter',
            'dokter' => $dokter,
            'poliklinik' => Poliklinik::all()
        ]);
    }


    public function update(Request $request, Dokter $dokter)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:dokters',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat_domisili' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'riwayat' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('dokter-images');
        }

        Dokter::where('id', $dokter->id)
            ->update($validatedData);

        return redirect('/dashboard/dokter')->with('pesan', 'dokter berhasil diupdate');
    }


    public function destroy(Dokter $dokter)
    {
        if ($dokter->image) {
            Storage::delete($dokter->image);
        }

        Dokter::destroy($dokter->id);

        return redirect('/dashboard/dokter')->with('pesan', 'Data dokter berhasil di hapus');
    }
}