@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>
    <div class="card border-0 px-1 m-5 rounded-4 shadow bg-body-tertiary col-sm-8 col-md-10 col-xl-2 ">
        <div class="p-4">
            <h2 class="fw-bold fs-2 mt-1">Claim Voucher</h2>
            <form class="row g-3" action="{{ route('my_voucher') }}" method="post">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @csrf
                <div class="col-auto">
                    <label for="voucher" class="mt-1">Tukarkan Kode Voucher Anda</label>
                    <input type="text" class="form-control my-2" id="voucher" name="voucher" placeholder="Kode Voucher">
                    <button type="submit" class="btn btn-primary mt-4">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($data['my_vouchers'] as $my_voucher)
            <div class="card border-0 px-1 m-5 rounded-4 shadow bg-body-tertiary col-2">
                <div class="p-4">
                    <h2 class="fw-bold fs-2 mt-1">Voucher Saya</h2>
                    <div class="col-auto">
                        <p><b>Nama: </b>{{ $my_voucher->nama_voucher }}</p>
                        <p><b>Kode: </b>{{ $my_voucher->kode_voucher }}</p>
                        <p><b>Potongan Harga: </b>{{ number_format($my_voucher->jumlah_voucher, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
