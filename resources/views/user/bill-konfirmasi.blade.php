@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header text-center">
                        <h4>Detail Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        @foreach($data['bills'] as $bill)
                            <!-- Informasi Paket -->
                            <h5 class="mb-3">Informasi Paket</h5>
                            <p><strong>Nama:</strong> {{ $bill->nama }}</p>
                            <p><strong>NIK:</strong> {{ $bill->nik }}</p>
                            <p><strong>Total Harga:</strong>
                                <strong class="total-harga" data-original-price="{{ $bill->pembayaran }}">
                                    Rp {{ number_format($bill->pembayaran, 0, ',', '.') }}
                                </strong>
                            </p>
                        @endforeach

                        <hr>

                        <!-- Kode Voucher -->
                        <h5 class="mb-3">Kode Voucher</h5>
                        <form>
                            <div class="input-group mb-3">
                                <select id="voucherSelect" class="form-select" aria-label="Default select example">
                                    <option selected>Cek Voucher</option>
                                    @foreach($data['bills'] as $bill)
                                        <option value="{{ $bill->jumlah_voucher }}">{{ $bill->nama_voucher }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-secondary" id="applyVoucher">Terapkan</button>
                            </div>

                            <!-- Informasi Pembayaran -->
                            <h5 class="mb-3">Metode Pembayaran</h5>
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Pilih Metode Pembayaran</label>
                                <select class="form-select" id="paymentMethod" required>
                                    <option value="" selected disabled>Pilih metode...</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="creditCard">Kartu Kredit</option>
                                    <option value="ewallet">E-Wallet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Masukkan nomor telepon" required>
                            </div>

                            <!-- Tombol Bayar -->
                            <button type="submit" class="btn btn-primary w-100 mt-3">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
