@extends('layouts.app')
@section('title','Laporan Mahasiswa')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Bukti Laporan Telah Isi Survey</h3>
</div>
<div class="page-content">
    <section class="row" style="min-height: 80vh;">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Terimakasi anda telah mengisi survey silahkan cetak bukti pada tombol di bawah</h5>
                    <a href="{{ route('laporan.cetak') }}" class="btn btn-primary">Cetak Bukti Telah Isi Survey</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection