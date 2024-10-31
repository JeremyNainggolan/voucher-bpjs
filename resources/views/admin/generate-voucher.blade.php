@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Voucher Baru</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('vouchers.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_voucher">Nama Voucher</label>
            <input type="text" class="form-control" id="nama_voucher" name="nama_voucher" required>
        </div>
        <div class="form-group">
            <label for="jumlah_voucher">Jumlah Voucher</label>
            <input type="number" class="form-control" id="jumlah_voucher" name="jumlah_voucher" required>
        </div>
        <div class="form-group">
            <label for="expired_date">Expired Date</label>
            <input type="date" class="form-control" id="expired_date" name="expired_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Buat Voucher</button>
    </form>
</div>
@endsection