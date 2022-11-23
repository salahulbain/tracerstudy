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
            <div class="card">
                <div class="card-header">
                    {{-- --}}
                </div>
                <div class="card-body">
                    {{-- tabel mahasiswa jika user admin --}}
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
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
                                        <a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Morgan Vanblum</td>
                                    <td>$13/hr</td>
                                    <td class="text-bold-500">Graphic concepts</td>
                                    <td>Remote</td>
                                    <td>Shangai,China</td>
                                    <td>
                                        <a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Tiffani Blogz</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>Remote</td>
                                    <td>Austin,Texas</td>
                                    <td>
                                        <a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Ashley Boul</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>Remote</td>
                                    <td>Austin,Texas</td>
                                    <td>
                                        <a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Mikkey Mice</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>Remote</td>
                                    <td>Austin,Texas</td>
                                    <td>
                                        <a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- data mahasiswa jika user mahasiswa --}}
        </div>
    </section>
</div>
@endsection