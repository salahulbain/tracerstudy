@extends('layouts.app')
@section('title','Data Mahasiswa')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Data Mahasiswa</h3>
</div>
<div class="page-content">
    <section class="row" style="min-height: 80vh;">
        <div class="col-12">
            {{-- table data mahasiswa jika user admin --}}
            @if (Auth::user()->role == 'ADMIN')
            <div class="card shadow">
                <div class="card-header text-center">
                    <button type="button" class="btn btn-primary m-1">
                        <i class="bi bi-person-plus"></i> Tambah Data Mahasiswa
                    </button>
                    <button type="button" class="btn btn-success m-1">
                        <i class="bi bi-filetype-csv"></i> Import Data Mahasiswa
                    </button>
                </div>
                <div class="card-body">
                    {{-- tabel mahasiswa jika user admin --}}
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>NIK</th>
                                    <th>No. HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Michael Right</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">UI/UX</td>
                                    <td>Remote</td>
                                    <td>Austin,Taxes</td>
                                    <td>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="eye"></i></a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="badge-circle badge-circle-light-secondary text-warning font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i class="badge-circle badge-circle-light-secondary text-danger font-medium-1"
                                                data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Morgan Vanblum</td>
                                    <td>$13/hr</td>
                                    <td class="text-bold-500">Graphic concepts</td>
                                    <td>Remote</td>
                                    <td>Shangai,China</td>
                                    <td>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="eye"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="badge-circle badge-circle-light-secondary text-warning font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i class="badge-circle badge-circle-light-secondary text-danger font-medium-1"
                                                data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Tiffani Blogz</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>Remote</td>
                                    <td>Austin,Texas</td>
                                    <td>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="eye"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="badge-circle badge-circle-light-secondary text-warning font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i class="badge-circle badge-circle-light-secondary text-danger font-medium-1"
                                                data-feather="trash-2"></i>
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Ashley Boul</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>Remote</td>
                                    <td>Austin,Texas</td>
                                    <td>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="eye"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="badge-circle badge-circle-light-secondary text-warning font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i class="badge-circle badge-circle-light-secondary text-danger font-medium-1"
                                                data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Mikkey Mice</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>Remote</td>
                                    <td>Austin,Texas</td>
                                    <td>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="eye"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="badge-circle badge-circle-light-secondary text-warning font-medium-1"
                                                data-feather="edit"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i class="badge-circle badge-circle-light-secondary text-danger font-medium-1"
                                                data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            {{-- data mahasiswa jika user mahasiswa --}}
            @if (Auth::user()->role == 'USER')
            <div class="card shadow">
                <div class="card-header">
                    <h4>Bioadata Mahasiswa</h4>
                </div>
                <form action="{{ route('mahasiswa.update',Auth::user()->user_id) }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode_pt">Kode PT</label>
                                    <input type="number" class="form-control" id="kode_pt" name="kode_pt" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" />
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" />
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" />
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No. Hp</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode_prodi">Kode Prodi</label>
                                    <input type="number" class="form-control" id="kode_prodi" name="kode_prodi"
                                        readonly />
                                </div>
                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <input type="number" class="form-control" id="npm" name="npm" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" max="{{ now() }}" class="form-control" id="tanggal_lahir"
                                        name="tanggal_lahir" />
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="number" class="form-control" id="npwp" name="npwp" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary float-right">Update Data Mahasiswa</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection

@push('addon-after-style')
<link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}" />
@endpush

@push('addon-before-script')
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
@endpush

@push('addon-after-script')
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $("#table").DataTable();
    });
</script>
@endpush