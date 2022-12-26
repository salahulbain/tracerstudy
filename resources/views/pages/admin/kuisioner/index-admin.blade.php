@extends('layouts.app')
@section('title','Responden')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Responden Kuisioner</h3>
</div>
<div class="page-content">
    <section class="row" style="min-height: 80vh;">
        <div class="col-12">
            @if ($message = Session::get('success'))
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                <div class="toast show fade align-items-center text-bg-success border-0" role="alert" aria-live="polite"
                    aria-atomic="true">
                    <div role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-x-circle-fill mx-1"></i>
                                {{ $message }}.
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                <div class="toast show fade align-items-center text-bg-danger border-0" role="alert" aria-live="polite"
                    aria-atomic="true">
                    <div role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-x-circle-fill mx-1"></i>
                                {{ $message }}.
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="card shadow">
                <div class="card-header">
                    <a href="{{ route('kuisioner.export') }}" class="btn btn-success"><i
                            class="bi bi-filetype-xlsx"></i>
                        Download Responden</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode PT</th>
                                    <th>Kode Prodi</th>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </section>
</div>

<!-- Modal data mahasiswa -->
<div class="modal fade" id="kuisionerModal" tabindex="-1" aria-labelledby="kuisionerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="kuisionerModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!-- Modal data mahasiswa -->
@endsection

@push('addon-before-script')
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
@endpush

@if(Session::get('error'))
@push('addon-after-script')
<script>
    setInterval(() => {
            $('.toast').toast('hide');
        }, 2500);
</script>
@endpush
@endif
@if(Session::get('success'))
@push('addon-after-script')
<script>
    setInterval(() => {
            $('.toast').toast('hide');
        }, 2500);
</script>
@endpush
@endif

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
                "order": [[ 1, "asc" ]],
                ajax: "{{ route('kuisioner.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'kdptimsmh', name: 'kdptimsmh'},
                    {data: 'kdpstmsmh', name: 'kdpstmsmh'},
                    {data: 'nimhsmsmh', name: 'nimhsmsmh'},
                    {data: 'nmmhsmsmh', name: 'nmmhsmsmh'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
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

        $('#kuisionerModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
</script>
@endpush