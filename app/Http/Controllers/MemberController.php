<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\JadwalMember;
use Illuminate\Http\Request;
use App\Models\Layanan_poliklinik;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('adminView/member', [
            'tittle' => $user->nama,
            'members' => Member::latest()->filter(request(['search', 'poliklinik']))->paginate(7)->withQueryString()

        ]);
    }


    public function create()
    {
        $user = Auth::user();

        return view('adminView/memberCreate', [
            'tittle' => $user->nama,
            'poliklinik' => Layanan_poliklinik::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:members',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:members',
            'alamat_domisili' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'riwayat' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/dokter-image'), $imageName);

        Member::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'poliklinik_id' => $request->poliklinik_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_domisili' => $request->alamat_domisili,
            'riwayat' => $request->riwayat,
            'image' => $imageName,
        ]);

        return redirect('/dashboard/dokter')->with('pesan', 'dokter berhasil ditambah');
    }


    public function show(Member $member)
    {
        $user = Auth::user();

        return view('adminView/memberDetail', [
            'tittle' => $user->nama,
            'jadwal' => JadwalMember::where('member_id', $member->id)->first(),
            'member' => $member
        ]);
    }


    public function edit(Member $member)
    {
        $user = Auth::user();

        return view('adminView/memberEdit', [
            'tittle' => $user->nama,
            'member' => $member,
            'poliklinik' => Layanan_poliklinik::all()
        ]);
    }


    public function update(Request $request, Member $member)
    {
        $rules = ([
            'nama' => 'required|max:255',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat_domisili' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'riwayat' => 'required'
        ]);

        if ($request->slug != $member->slug) {
            $rules['slug'] = 'required|unique:dokters';
        }

        $validatedData = $request->validate($rules);

        $imageName = $member->image;

        if ($request->file('image')) {
            if ($request->oldImage) {
                File::delete(public_path('/images/dokter-image/' . $member->image));
            }
            $validatedData['image'] =
                $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dokter-image'), $imageName);
        }

        Member::find($member)
            ->update([
                'nama' => $request->nama,
                'slug' => $request->slug,
                'poliklinik_id' => $request->poliklinik_id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'alamat_domisili' => $request->alamat_domisili,
                'riwayat' => $request->riwayat,
                'image' => $imageName,
            ]);

        return redirect('/dashboard/dokter')->with('pesan', 'dokter berhasil diupdate');
    }


    public function destroy(Member $dokter)
    {
        if ($dokter->image) {
            File::delete(public_path('/images/dokter-image/' . $dokter->image));
        }

        Member::destroy($dokter->id);

        return redirect('/dashboard/dokter')->with('pesan', 'Data dokter berhasil di hapus');
    }
}
