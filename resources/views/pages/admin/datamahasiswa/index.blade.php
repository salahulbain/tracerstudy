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
                    <button type="button" class="btn btn-success m-1" data-bs-toggle="modal"
                        data-bs-target="#dataMahasiswaModal">
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
                            <tbody></tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            {{-- data mahasiswa jika user mahasiswa --}}
            @if (Auth::user()->role == 'USER')
            <div class="card shadow">
                @if ($message = Session::get('success'))
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                    <div class="toast show fade align-items-center text-bg-success border-0" role="alert"
                        aria-live="polite" aria-atomic="true">
                        <div role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-check-circle m-1"></i>
                                    {{ $message }}.
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                    data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="toast show align-items-center text-white bg-success border-0" role="alert"
                        aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true"
                        data-bs-animation="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-check-circle"></i>
                                {{ $message }}.
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div> --}}
                </div>
                @endif
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
                                    <input type="number" class="form-control @error('kode_pt') is-invalid @enderror"
                                        id="kode_pt" required name="kode_pt" value="{{ $item->kode_pt }}" readonly />
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
                                        value="{{ $item->nama_mahasiswa }}" />
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
                                        value="{{ $item->tempat_lahir }}" />
                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" required name="nik" value="{{ $item->nik }}"
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
                                        id="no_hp" required name="no_hp" value="{{ $item->no_hp }}" />
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
                                        id="kode_prodi" required name="kode_prodi" readonly
                                        value="{{ $item->kode_prodi }}" />
                                    @error('kode_prodi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <input type="number" class="form-control @error('npm') is-invalid @enderror"
                                        id="npm" required name="npm" readonly value="{{ $item->npm }}" />
                                    @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" max="{{ now() }}"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" required name="tanggal_lahir"
                                        value="{{ $item->tanggal_lahir }}" />
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="number" class="form-control @error('npwp') is-invalid @enderror"
                                        id="npwp" name="npwp" value="{{ $item->npwp }}" />
                                    @error('npwp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" required name="email" value="{{ $item->email }}" />
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
                                        required name="alamat" rows="3">{{ $item->alamat }}</textarea>
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
                        <button type="submit" class="btn btn-primary float-right">Update Data Mahasiswa</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </section>
</div>
@if (Auth::user()->role == "ADMIN")
<!-- Modal data mahasiswa -->
<div class="modal fade" id="dataMahasiswaModal" tabindex="-1" aria-labelledby="dataMahasiswaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="dataMahasiswaModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Upload</button>
            </div> --}}
        </div>
    </div>
</div>
@endif
@endsection

@push('addon-before-script')
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
@endpush

@if (Auth::user()->role == "USER")
<script>
    @if(Session::get('success'))
    setInterval(() => {
        $('.toast').toast('hide');
    }, 2500);
    @endif
</script>
@endif

@if (Auth::user()->role == "ADMIN")
@push('addon-after-style')
<link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}" />
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/sl-1.4.0/datatables.min.css" />
@endpush

@push('addon-after-script')
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/sl-1.4.0/datatables.min.js">
</script>
<script>
    $(function () {
            var table = $('#table').DataTable({
                // responsive: true,
                autoWidth: true,
                processing: true,
                serverSide: true,
                lengthMenu: [
                        [ 10, 25, 50, -1 ],
                        [ '10', '25', '50', 'Show all' ]
                ],
                // language: {
                //     'paginate': {
                //         'previous': '<',
                //         'next': '>'
                //     }
                // },
                "order": [[ 1, "asc" ]],
                ajax: "{{ route('mahasiswa.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama_mahasiswa', name: 'nama_mahasiswa'},
                    {data: 'npm', name: 'npm'},
                    {data: 'nik', name: 'nik'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                buttons: [{extend: 'csvHtml5', exportOptions: { columns: [ 0, 1, 2, 3, 4] }}, {extend: 'excelHtml5', exportOptions: { columns: [ 0, 1, 2, 3, 4] }}, {extend: 'pdfHtml5', exportOptions: { columns: [ 0, 1, 2, 3, 4] }}, {extend: 'print', exportOptions: { columns: [ 0, 1, 2, 3, 4] }}],
                // mengatur tatak letak tombol
                // l = lengt, B = Buttons, f = filter, tr = <tr></tr>, i = info, p = paginate.
                dom: "<'row text-center'<'col-md-3'l><'col-md-5'B><'col-md-3'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-6'i><'col-md-6'p>>"
            });
            table.buttons().container()
                .appendTo('#table_wrapper .col-md-5:eq(0)');
        });

        $('#dataMahasiswaModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
</script>
@endpush
@endif