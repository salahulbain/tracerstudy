@extends('layouts.app')
@section('title','Profile')

@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Data Profile</h3>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection