@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded">
            <div class="card-header bg-body-tertiary text-white text-center">
                <h1 class="fw-bolder text-dark mt-3">Daftar Voucher</h1>
                <div class="text-end">
                    <a href="{{ url('admin/generate_voucher') }}" class="btn btn-success my-4 me-3">Buat Voucher Baru</a>

                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table">
                    <thead>
                    <tr>
                        <th>Nama Voucher</th>
                        <th>Kode Voucher</th>
                        <th>Harga Voucher</th>
                        <th>Expired Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['vouchers'] as $voucher)
                        <tr>
                            <td>{{ $voucher['nama_voucher'] }}</td>
                            <td>{{ $voucher['kode_voucher'] }}</td>
                            <td>Rp {{ number_format($voucher['jumlah_voucher'], 0, ',', '.') }}</td>
                            <td>{{ $voucher['expired_date'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
