@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="card border-0 px-1 rounded-4 shadow mx-5 bg-body-secondary">
        <div class="p-4">
            <h2 class="fw-bold fs-1">Tagihan BPJS </h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success m-4">
                {{ session('success') }}
            </div>
        @endif

        @if($data['bills'])
            @foreach($data['bills'] as $bill)
                <div class="card row m-4 border-0 rounded-3 shadow-lg fw-bolder fs-5">
                    <div class="bg-success pt-2 rounded-top-2 text-light">
                        <div class="col-12 m-2">
                            Nama: {{ $bill['nama'] ?? 'Tidak ada data' }}
                        </div>
                        <div class="col-12 m-2">
                            NIK: {{ $bill['nik'] ?? 'Tidak ada data' }}
                        </div>
                    </div>
                    <div class="bg-light rounded-bottom-2">
                        <div class="col-12 m-2">
                            <i class="bi bi-credit-card-fill me-2"></i>Pembayaran:
                            Rp {{ number_format($bill['pembayaran'], 0, ',', '.') }}
                        </div>
                        <div class="col-12 m-2">
                            <i class="bi bi-front me-2"></i>Channel: {{ $bill['channel'] }}
                        </div>
                        <div class="col-12 m-2">
                            <i class="bi bi-calendar-date me-2"></i>Tanggal Jatuh
                            Tempo: {{ date('d-m-Y', strtotime($bill['tanggal_jatuh_tempo'])) }}
                        </div>
                        <div class="col-12 m-2">
                            <i class="bi bi-check-square me-2"></i>Status: {{ $bill['status'] }}
                        </div>
                        <div class="col-12 text-end my-2">
                            @if($bill['status'] == 'Belum Dibayar')
                                <a href="{{ url('user/bill-konfirmasi/' . $bill['id']) }}" class="btn btn-success">Bayar</a>
                            @else
                                <a class="btn btn-secondary" disabled>Sudah Dibayar</a>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <div class="card row m-4 border-0 rounded-3 shadow-lg fw-bolder fs-5">
                <div class="bg-light rounded-2 p-4">
                    <p>Tidak ada tagihan saat ini.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
