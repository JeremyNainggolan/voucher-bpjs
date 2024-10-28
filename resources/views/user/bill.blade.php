@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="card border-0 px-1 rounded-4 shadow mx-5 bg-body-secondary">
        <div class="p-4">
            <h2 class="fw-bold fs-1">Tagihan BPJS </h2>
        </div>

        <div class="card row m-4 border-0 rounded-3 shadow-lg fw-bolder fs-5">
            <div class="bg-success pt-2 rounded-top-2">
                <div class="col-12 m-2">
                    Nama
                </div>
                <div class="col-12 m-2">
                    NIK
                </div>
            </div>
            <div class="bg-light rounded-bottom-2">
                <div class="col-12 m-2">
                    Pembayaran
                </div>
                <div class="col-12 m-2">
                    Channel
                </div>
                <div class="col-12 m-2">
                    Tanggal Jatuh Tempo
                </div>
                <div class="col-12 m-2">
                    Status
                </div>
                <div class="col-12 text-end my-2">
                    <div class="btn btn-primary">
                        Bayar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
