@extends('layouts.app')
@section('title','Tambah Data Mahasiswa')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Tambah Data Mahasiswa</h3>
</div>
<div class="page-content">
    <section class="row" style="min-height: 80vh;">
        <div class="col-12">
            @if (Auth::user()->role == 'ADMIN')
            <div class="card shadow">
                <div class="card-header">
                    <h4>Tambah Data Mahasiswa</h4>
                </div>
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode_pt">Kode PT</label>
                                    <input type="number" class="form-control @error('kode_pt') is-invalid @enderror"
                                        id="kode_pt" required name="kode_pt" value="{{ old('kode_pt') }}" />
                                    @error('kode_pt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text"
                                        class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                        id="nama_mahasiswa" required name="nama_mahasiswa"
                                        value="{{ old('nama_mahasiswa') }}" />
                                    @error('nama_mahasiswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" required name="tempat_lahir"
                                        value="{{ old('tempat_lahir') }}" />
                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" required name="nik" value="{{ old('nik') }}"
                                        oninput="this.value=this.value.slice(0,this.maxLength)" min="3"
                                        maxlength="16" />
                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No. Hp</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="no_hp" required name="no_hp" value="{{ old('no_hp') }}" />
                                    @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode_prodi">Kode Prodi</label>
                                    <input type="number" class="form-control @error('kode_prodi') is-invalid @enderror"
                                        id="kode_prodi" required name="kode_prodi" value="{{ old('kode_prodi') }}" />
                                    @error('kode_prodi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <input type="number" class="form-control @error('npm') is-invalid @enderror"
                                        id="npm" required name="npm" value="{{ old('npm') }}" />
                                    @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" max="{{ date('m/d/Y',strtotime(now())) }}"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" required name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}" />
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="number" class="form-control @error('npwp') is-invalid @enderror"
                                        id="npwp" name="npwp" value="{{ old('npwp') }}" />
                                    @error('npwp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" required name="email" value="{{ old('email') }}" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        required name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('mahasiswa.index') }}"
                            class="btn btn-outline-secondary float-right mx-1">Batal</a>
                        <button type="submit" class="btn btn-primary float-right">Tambah Data Mahasiswa</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection