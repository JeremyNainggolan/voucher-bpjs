@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Voucher</h1>
    <a href="{{ route('vouchers.create') }}" class="btn btn-primary">Buat Voucher Baru</a>

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
            @foreach($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->nama_voucher }}</td>
                    <td>{{ $voucher->kode_voucher }}</td>
                    <td>{{ $voucher->harga_voucher }}</td>
                    <td>{{ $voucher->expired_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection