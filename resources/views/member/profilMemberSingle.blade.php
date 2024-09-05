@extends('layout.main')

@section('content')

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{asset('images/member-image/'.$data->image)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-title" style="font-size: 1.875em;"><strong>{{ $data->nama }}</strong></p>
                            <span>
                                <p class="card-text text-muted">Posisi : {{ $data->posisi }}</p>
                            </span>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <h4 class="card-title">Detail</h4>
                <p class="card-text">{!! $data->riwayat !!}</p>
            </div>
        </div>
    </div>
</section>

@endsection
