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
                    <a href="{{ route('kuisioner.export') }}" class="btn btn-success"><i class="bi bi-filetype-csv"></i>
                        Download Responden</a>
                </div>
                <div class="card-body">
                    {{-- tabel responden --}}
                    tabel responden
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </section>
</div>
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