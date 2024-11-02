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
                    @if (session('error'))
                        <div class="alert alert-danger m-4">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        @foreach($data['bills'] as $bill)
                        <?php
                            $bill_id = $bill->id;
                        ?>
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
                            @csrf
                            <div class="input-group mb-3">
                                <select id="voucherSelect" class="form-select" aria-label="Default select example" onchange="updateVoucherCode()">
                                    <option selected value="">Cek Voucher</option>
                                    @foreach($data['vouchers'] as $voucher)
                                        <option value="{{ $voucher->kode_voucher }}" data-discount="{{ $voucher->jumlah_voucher }}">
                                            {{ $voucher->nama_voucher ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-secondary" id="applyVoucher">Terapkan</button>
                            </div>
                            <input type="hidden" id="kode_voucher" name="kode_voucher" value="">
                            <input type="hidden" id="bill_id" name="bill_id" value="{{ $bill_id }}">
                            <button type="submit" class="btn btn-primary w-100 mt-3">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateVoucherCode() {
            // Mendapatkan elemen voucher yang dipilih dan mengupdate kode voucher
            let voucherSelect = document.getElementById('voucherSelect');
            let selectedVoucherCode = voucherSelect.value;
            document.getElementById('kode_voucher').value = selectedVoucherCode;
        }

        document.getElementById('applyVoucher').addEventListener('click', function() {
            // Mendapatkan diskon voucher yang dipilih
            let voucherSelect = document.getElementById('voucherSelect');
            let discount = parseFloat(voucherSelect.options[voucherSelect.selectedIndex].getAttribute('data-discount'));

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
