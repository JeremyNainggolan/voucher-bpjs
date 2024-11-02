<nav class="p-smg-3 navbar navbar-expand-lg sticky-top navbar-light top-0 w-100 bg-light opacity-75">
    <div class="container-fluid p-1">
        <a class="navbar-brand px-lg-3 fw-bolder" href="#">BPJS - Voucher</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fw-bold">
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/user/dashboard" :active="request()->is('user/dashboard') || request()->is('user')">Dashboard</x-nav-links>
                </li>
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/user/bill" :active="request()->is('user/bill') || request()->is('user/bill-konfirmasi')">Bill</x-nav-links>
                </li>
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/user/my-voucher" :active="request()->is('user/my-voucher')">My Voucher</x-nav-links>
                </li>
            </ul>
        </div>
    </div>
</nav>
