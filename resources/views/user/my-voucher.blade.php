@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>


    <div class="container">
        <div class="row gap-3 justify-content-center">
            <div class="card col-lg-2 bg-light border-0 rounded-2 shadow">
                <div class="fw-bolder">
                    <h4 class="fs-4 mt-2 card-title">Diskon</h4>
                    <p class="card-title">10% s.d. Rp100rb</p>
                </div>
                <p class="card-text">Berlaku hingga</p>
                <p class="card-text mb-2">17 September 2024</p>
            </div>
        </div>
    </div>
@endsection
