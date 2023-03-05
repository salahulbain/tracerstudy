@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">
                                        Total Mahasiswa
                                    </h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_mhs }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Telah Isi Survey</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_isi_survey }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Belum Isi Survey</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_belum_isi_survey }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Seluruh Prodi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_prodi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Jumlah Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card shadow" style="min-height:97vh;">
                <div class="card-header">
                    <h4>Recent Submited</h4>
                </div>
                <div class="card-content pb-4 min-h-full">
                    @forelse ($recent_submit as $item)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/{{ $loop->iteration }}.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $item->nmmhsmsmh }}</h5>
                            <h6 class="text-muted mb-0">{{ $item->nimhsmsmh }}</h6>
                        </div>
                    </div>
                    @empty
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/4.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">No Data</h5>
                            <h6 class="text-muted mb-0">No Data</h6>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Status Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-after-script')
<script>
    var optionsProfileVisit = {
        annotations: { position: "back" },
        dataLabels: { enabled: !1 },
        chart: { type: "bar", height: 300 },
        fill: { opacity: 1 },
        plotOptions: {},
        series: [
            {
                name: "mahasiswa",
                data: [{{ $pai }}, {{ $pba }}, {{ $mpi }}, {{ $sas }}, {{ $ekos }}, {{ $kpi }}, {{ $pmi }}],
            },
        ],
        colors: "#435ebe",
        xaxis: {
            categories: ["PAI", "PBA", "MPI", "SAS", "EKOS", "KPI", "PMI"],
        },
    };

    let optionsVisitorsProfile = {
        series: [{{ $kerja_full }},{{ $belum_kerja }},{{ $wiraswasta }},{{ $lanjut_pendidikan }},{{ $tidak_kerja }},],
        labels: ["Bekerja Full/Part Time", "Belum Mungkin Bekerja", "Wiraswasta", "Melanjutkan Pendidikan","Sedang Mencari Kerja"],
        colors: ["#435ebe", "#dc3545", "#fd7e14", "#20c997", "#ffc107"],
        chart: { type: "donut", width: "100%", height: "350px" },
        legend: { position: "bottom" },
        plotOptions: { pie: { donut: { size: "30%" } } },
    };

    var chartProfileVisit = new ApexCharts(
        document.querySelector("#chart-profile-visit"),
        optionsProfileVisit
    ),
    chartVisitorsProfile = new ApexCharts(
        document.getElementById("chart-visitors-profile"),
        optionsVisitorsProfile
    );
    chartProfileVisit.render(),
    chartVisitorsProfile.render();
</script>
@endpush