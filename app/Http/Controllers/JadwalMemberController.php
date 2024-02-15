<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\JadwalMember;
use Illuminate\Http\Request;

class JadwalMemberController extends Controller
{

    public function index(Member $member)
    {
        return View('adminView/jadwalMemberCreate', [
            'tittle' => 'Member',
            'member' => $member,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'member_id' => 'required',
            'poliklinik_id' => 'required',
            'hari' => 'required|max:255',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        JadwalMember::create($validatedData);

        return redirect('/dashboard/dokter')->with('pesan', 'jadwal member berhasil ditambah');
    }

    public function edit($id)
    {
        return view('adminView/jadwalDokterEdit', [
            'tittle' => 'Member',
            'jadwal' => JadwalMember::where('member_id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'member_id' => 'required',
            'poliklinik_id' => 'required',
            'hari' => 'required|max:255',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        JadwalMember::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/dokter')->with('pesan', 'jadwal member berhasil diupdate');
    }
}
