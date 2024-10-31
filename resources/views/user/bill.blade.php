@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
@php
    $bill = $bill ?? null;
@endphp

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

        @if(isset($bill))
        <div class="card row m-4 border-0 rounded-3 shadow-lg fw-bolder fs-5">
            <div class="bg-success pt-2 rounded-top-2">
                <div class="col-12 m-2">
                    Nama: {{ $bill->nama ?? 'Tidak ada data' }}
                </div>
                <div class="col-12 m-2">
                    NIK: {{ $bill->nik ?? 'Tidak ada data' }}
                </div>
            </div>
            <div class="bg-light rounded-bottom-2">
                <div class="col-12 m-2">
                    Pembayaran: Rp {{ number_format($bill->pembayaran, 0, ',', '.') }}
                </div>
                <div class="col-12 m-2">
                    Channel: {{ $bill->channel }}
                </div>
                <div class="col-12 m-2">
                    Tanggal Jatuh Tempo: {{ $bill->tanggal_jatuh_tempo->format('d/m/Y') }}
                </div>
                <div class="col-12 m-2">
                    Status: {{ $bill->status }}
                </div>
                <div class="col-12 text-end my-2">
                    @if($bill->status == 'Belum Dibayar')
                        <form action="{{ route('bill.pay', $bill) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </form>
                    @else
                        <button class="btn btn-secondary" disabled>Sudah Dibayar</button>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="card row m-4 border-0 rounded-3 shadow-lg fw-bolder fs-5">
            <div class="bg-light rounded-2 p-4">
                <p>Tidak ada tagihan saat ini.</p>
            </div>
        </div>
        @endif
    </div>
@endsection