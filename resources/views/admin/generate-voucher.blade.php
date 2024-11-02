@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="m-0">Buat Voucher Baru</h2>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('vouchers.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_voucher" class="form-label">Nama Voucher</label>
                    <input type="text" class="form-control border-primary" id="nama_voucher" name="nama_voucher" placeholder="Masukkan nama voucher" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_voucher" class="form-label">Jumlah Voucher</label>
                    <input type="number" min="1" class="form-control border-primary" id="jumlah_voucher" name="jumlah_voucher" placeholder="Masukkan jumlah voucher" required>
                </div>

                <div class="mb-3">
                    <label for="expired_date" class="form-label">Expired Date</label>
                    <input type="date" class="form-control border-primary" id="expired_date" name="expired_date" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Buat Voucher</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card-header {
        background: linear-gradient(90deg, #4b6cb7, #182848);
    }
    .form-label {
        font-weight: bold;
    }
    .btn-success {
        transition: all 0.3s ease;
    }
    .btn-success:hover {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>
@endsection
