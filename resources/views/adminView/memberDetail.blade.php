@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/dokter">Data Dokter</a></li>
            <li class="breadcrumb-item active">Detail Dokter</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row align-items-top">
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/dokter-image/'.$member->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $member->nama }}</h5>
                            <p class="card-text">Poliklinik : <strong>{{ $member->poliklinik->poliklinik }}</strong></p>

                            @if($member->jenis_kelamin == 'L')
                            <p class="card-text">Jenis Kelamin : <strong>Laki-Laki</strong></p>
                            @else
                            <p class="card-text">Jenis Kelamin : <strong>Perempuan</strong></p>
                            @endif

                            <p class="card-text">Tanggal Lahir : <strong>{{ $member->tanggal_lahir }}</strong></p>
                            <p class="card-text">Alamat Domisili : <strong>{{ $member->alamat_domisili }}</strong></p>
                            <p class="card-text">Telepon : <strong>{{ $member->no_hp }}</strong></p>
                            <p class="card-text">E-mail : <strong>{{ $member->email }}</strong></p>
                            <p class="card-text">Sub-Spesialis : <strong>{{ $member->specialis }}</strong></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Dokter</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Hari</th>
                                <th scope="col">jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if(is_null($jadwal))
                                <td>jadwal belum ditentukan</td>
                                @else
                                <td>{{$jadwal->hari}}</td>
                                @endif

                                @if(is_null($jadwal))
                                <td>jadwal belum ditentukan</td>
                                @else
                                <td>{{date("H:i", strtotime("$jadwal->dari"))}} - {{date("H:i", strtotime("$jadwal->sampai"))}}</td>
                                @endif

                                @if(is_null($jadwal))
                                <td>
                                    <a href="" class="btn btn-secondary" aria-disabled="true">Edit Jadwal</a>
                                </td>
                                @else
                                <td>
                                    <a href="/dashboard/jadwal-edit/{{$jadwal->id}}" class="btn btn-secondary">Edit Jadwal</a>
                                </td>
                                @endif

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Dokter</h5>
                    {!! $dokter->riwayat !!}
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
