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
                            <p><strong>Total Harga: Rp</strong>
                                <strong id="total-harga" data-initial-total="{{ $bill->pembayaran }}">
                                    {{ number_format($bill->pembayaran, 0, ',', '.') }}
                                </strong>
                            </p>
                        @endforeach

                        <hr>

                        <!-- Kode Voucher -->
                        <h5 class="mb-3">Kode Voucher</h5>
                        <form method="post" action="{{ url('user/bill') }}" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <select id="voucherSelect" class="form-select" aria-label="Default select example">
                                    <option selected>Cek Voucher</option>
                                    @foreach($data['bills'] as $bill)
                                        <option value="{{ $bill->nama_voucher != null ? $bill->jumlah_voucher : '' }}"> {{$bill->nama_voucher != null ? $bill->nama_voucher : '' }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-secondary" id="applyVoucher">Terapkan</button>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('applyVoucher').addEventListener('click', function() {
            // Mendapatkan nilai voucher yang dipilih
            let voucherSelect = document.getElementById('voucherSelect');
            let discount = parseFloat(voucherSelect.value);

            // Mendapatkan elemen total harga dan nilai awalnya
            let totalHargaElement = document.getElementById('total-harga');
            let initialTotal = parseFloat(totalHargaElement.getAttribute('data-initial-total'));

            // Jika ada voucher yang dipilih, kurangi total harga
            if (!isNaN(discount) && discount > 0) {
                let newTotal = initialTotal - discount;
                totalHargaElement.textContent = newTotal.toLocaleString('id-ID');
            } else {
                // Jika tidak ada voucher yang dipilih, tampilkan total harga awal
                totalHargaElement.textContent = initialTotal.toLocaleString('id-ID');
            }
        });
    </script>
@endsection
