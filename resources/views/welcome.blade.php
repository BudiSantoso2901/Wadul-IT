<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="Wadul-IT By Budi & Rashel">
    <meta name="author" content="Wadul-IT By Budi & Rashel">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wadul-IT</title>

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/solid.css') }}">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('assets/guest/css/style.css') }}">
</head>
<style>
    :root {
        --pink-main: #ec4899;
        --pink-soft: #fce7f3;
        --pink-dark: #be185d;
    }

    /* NAVBAR UPGRADE */
    .navigation {
        background: white !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    /* NAVBAR PINK THEME */
    .navbar-light .navbar-nav .nav-link {
        color: #555;
        font-weight: 500;
        transition: 0.3s;
    }

    .navbar-light .navbar-nav .nav-link:hover {
        color: #ec4899;
    }

    .navbar-light .navbar-nav .nav-link.active {
        color: #ec4899 !important;
        font-weight: 600;
        position: relative;
    }

    /* underline */
    .navbar-light .navbar-nav .nav-link.active::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        background: #ec4899;
        left: 0;
        bottom: -6px;
        border-radius: 10px;
    }

    /* HERO SECTION */
    .banner {
        background: linear-gradient(135deg, #fce7f3, #ffffff) !important;
        padding: 80px 0;
    }

    .banner h1 {
        font-weight: 700;
        font-size: 40px;
    }

    .banner p {
        color: #6b7280;
    }

    /* BUTTON */
    .btn-primary {
        background: var(--pink-main) !important;
        border: none;
        border-radius: 999px;
        padding: 12px 25px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: var(--pink-dark) !important;
        transform: translateY(-2px);
    }

    /* SERVICE CARD */
    .service-item .block {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .service-item .block:hover {
        transform: translateY(-8px);
    }

    .colored-box {
        background: var(--pink-soft) !important;
        color: var(--pink-main);
        border-radius: 50%;
        padding: 15px;
    }

    /* SECTION TITLE */
    .text-primary {
        color: var(--pink-main) !important;
    }

    /* TAB STYLE MODERN */
    .payment_info_tab .nav-link {
        border-radius: 999px !important;
        padding: 10px 20px;
        transition: 0.3s;
    }

    .payment_info_tab .nav-link.active {
        background: var(--pink-main) !important;
        color: white !important;
    }

    .tab-content {
        border-radius: 20px !important;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    }

    /* CONTENT BLOCK */
    .content-block {
        animation: fadeUp 0.6s ease;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* FOOTER */
    footer,
    .bg-tertiary {
        background: #fff !important;
    }

    .footer-widget h5 {
        color: var(--pink-main);
    }

    /* IMAGE HERO */
    .banner img {
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(236, 72, 153, 0.2);
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .banner h1 {
            font-size: 28px;
        }
    }

    /* WRAPPER */
    .slider-wrapper {
        width: 100%;
        overflow: hidden;
        border-radius: 20px;
        background: transparent;
        /* biar tidak ganggu */
    }

    /* TRACK */
    .slider-track {
        display: flex;
        animation: slideMove 20s infinite;
    }

    /* SLIDE */
    .slide {
        min-width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* 🔥 GAMBAR (INI KUNCI) */
    .slide img {
        width: 480px;
        height: 480px;
        /* 🔥 mengikuti rasio asli */
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(236, 72, 153, 0.2);
        display: block;
    }

    /* ANIMASI */
    @keyframes slideMove {
        0% {
            transform: translateX(0);
        }

        20% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-100%);
        }

        45% {
            transform: translateX(-100%);
        }

        50% {
            transform: translateX(-200%);
        }

        70% {
            transform: translateX(-200%);
        }

        75% {
            transform: translateX(-300%);
        }

        95% {
            transform: translateX(-300%);
        }

        100% {
            transform: translateX(0);
        }
    }
</style>

<body>
    <!-- navigation -->
    <header class="navigation bg-tertiary">
        <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img loading="prelaod" decoding="async" class="img-fluid" width="80"
                        src="{{ asset('assets/RS/LOgo RS ONLY.png') }}" alt="Wallet">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item "> <a class="nav-link" href="{{ route('laporan.create') }}"
                                target="">Pengajuan</a>
                        </li>
                        <li class="nav-item "> <a class="nav-link" href="{{ route('laporan.index') }}"
                                target="">Cek Laporan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- /navigation -->

    <section class="banner bg-tertiary position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="block text-center text-lg-start pe-0 pe-xl-5">
                        <h1 class="text-capitalize mb-4">Pengajuan Laporan Masalah IT yang Mudah dan Cepat Lewat
                            WADUL-IT
                        </h1>
                        <p class="mb-4">Sistem kami mempermudah pengajuan laporan masalah atau permintaan bantuan.
                            <br>Gunakan tiket, NIK dan NIP, atau nomor HP untuk melacak status laporan Anda dengan cepat dan
                            akurat.
                        </p>
                        <a type="button" class="btn btn-primary" href="{{ route('laporan.create') }}" target="_blank">
                            Ajukan Laporan<span style="font-size: 14px;" class="ms-2 fas fa-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-5">

                        <div class="slider-wrapper">

                            <div class="slider-track">

                                <!-- SLIDE -->
                                <div class="slide">
                                    <img src="{{ asset('assets/RS/1.png') }}">
                                </div>

                                <div class="slide">
                                    <img src="{{ asset('assets/RS/1.jpeg') }}">
                                </div>

                                <div class="slide">
                                    <img src="{{ asset('assets/RS/3.jpeg') }}">
                                </div>

                                <div class="slide">
                                    <img src="{{ asset('assets/RS/4.jpeg') }}">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="has-shapes">
            <svg class="shape shape-left text-light" viewBox="0 0 192 752" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M-30.883 0C-41.3436 36.4248 -22.7145 75.8085 4.29154 102.398C31.2976 128.987 65.8677 146.199 97.6457 166.87C129.424 187.542 160.139 213.902 172.162 249.847C193.542 313.799 149.886 378.897 129.069 443.036C97.5623 540.079 122.109 653.229 191 728.495"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-55.5959 7.52271C-66.0565 43.9475 -47.4274 83.3312 -20.4214 109.92C6.58466 136.51 41.1549 153.722 72.9328 174.393C104.711 195.064 135.426 221.425 147.449 257.37C168.829 321.322 125.174 386.42 104.356 450.559C72.8494 547.601 97.3965 660.752 166.287 736.018"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-80.3302 15.0449C-90.7909 51.4697 -72.1617 90.8535 -45.1557 117.443C-18.1497 144.032 16.4205 161.244 48.1984 181.915C79.9763 202.587 110.691 228.947 122.715 264.892C144.095 328.844 100.439 393.942 79.622 458.081C48.115 555.123 72.6622 668.274 141.552 743.54"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M-105.045 22.5676C-115.506 58.9924 -96.8766 98.3762 -69.8706 124.965C-42.8646 151.555 -8.29436 168.767 23.4835 189.438C55.2615 210.109 85.9766 236.469 98.0001 272.415C119.38 336.367 75.7243 401.464 54.9072 465.604C23.4002 562.646 47.9473 675.796 116.838 751.063"
                    stroke="currentColor" stroke-miterlimit="10" />
            </svg>
            <svg class="shape shape-right text-light" viewBox="0 0 731 746" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.1794 745.14C1.80036 707.275 -5.75764 666.015 8.73984 629.537C27.748 581.745 80.4729 554.968 131.538 548.843C182.604 542.703 234.032 552.841 285.323 556.748C336.615 560.64 391.543 557.276 433.828 527.964C492.452 487.323 511.701 408.123 564.607 360.255C608.718 320.353 675.307 307.183 731.29 327.323"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M51.0253 745.14C41.2045 709.326 34.0538 670.284 47.7668 635.783C65.7491 590.571 115.623 565.242 163.928 559.449C212.248 553.641 260.884 563.235 309.4 566.931C357.916 570.627 409.887 567.429 449.879 539.701C505.35 501.247 523.543 426.331 573.598 381.059C615.326 343.314 678.324 330.853 731.275 349.906"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M89.8715 745.14C80.6239 711.363 73.8654 674.568 86.8091 642.028C103.766 599.396 150.788 575.515 196.347 570.054C241.906 564.578 287.767 573.629 333.523 577.099C379.278 580.584 428.277 577.567 465.976 551.423C518.279 515.172 535.431 444.525 582.62 401.832C621.964 366.229 681.356 354.493 731.291 372.46"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M128.718 745.14C120.029 713.414 113.678 678.838 125.837 648.274C141.768 608.221 185.939 585.788 228.737 580.659C271.536 575.515 314.621 584.008 357.6 587.282C400.58 590.556 446.607 587.719 482.028 563.16C531.163 529.111 547.275 462.733 591.612 422.635C628.572 389.19 684.375 378.162 731.276 395.043"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M167.564 745.14C159.432 715.451 153.504 683.107 164.863 654.519C179.753 617.046 221.088 596.062 261.126 591.265C301.164 586.452 341.473 594.402 381.677 597.465C421.88 600.527 464.95 597.872 498.094 574.896C544.061 543.035 559.146 480.942 600.617 443.423C635.194 412.135 687.406 401.817 731.276 417.612"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M817.266 289.466C813.108 259.989 787.151 237.697 759.261 227.271C731.372 216.846 701.077 215.553 671.666 210.904C642.254 206.24 611.795 197.156 591.664 175.224C555.853 136.189 566.345 75.5336 560.763 22.8649C552.302 -56.8256 498.487 -130.133 425 -162.081"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M832.584 276.159C828.427 246.683 802.469 224.391 774.58 213.965C746.69 203.539 716.395 202.246 686.984 197.598C657.573 192.934 627.114 183.85 606.982 161.918C571.172 122.883 581.663 62.2275 576.082 9.55873C567.62 -70.1318 513.806 -143.439 440.318 -175.387"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M847.904 262.853C843.747 233.376 817.789 211.084 789.9 200.659C762.011 190.233 731.716 188.94 702.304 184.292C672.893 179.627 642.434 170.544 622.303 148.612C586.492 109.577 596.983 48.9211 591.402 -3.74766C582.94 -83.4382 529.126 -156.746 455.638 -188.694"
                    stroke="currentColor" stroke-miterlimit="10" />
                <path
                    d="M863.24 249.547C859.083 220.07 833.125 197.778 805.236 187.353C777.347 176.927 747.051 175.634 717.64 170.986C688.229 166.321 657.77 157.237 637.639 135.306C601.828 96.2707 612.319 35.6149 606.738 -17.0538C598.276 -96.7443 544.462 -170.052 470.974 -202"
                    stroke="currentColor" stroke-miterlimit="10" />
            </svg>
        </div> --}}
    </section>

    <section class="section pt-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="section-title pt-4">
                        <p class="text-primary text-uppercase fw-bold mb-3">Layanan Kami</p>
                        <h1>Solusi Cepat untuk Masalah IT Anda</h1>
                        <p> WADUL-IT kami dirancang untuk mempermudah pelaporan masalah ataupun permintaan
                            bantuan, serta pelacakan status
                            laporan Anda.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('laporan.create') }}" >
                        <div class="block"> <span class="colored-box text-center h3 mb-4">01</span>
                            <h3 class="mb-3 service-title">Ajukan Laporan</h3>
                            <p class="mb-0 service-description">Ajukan masalah atau permintaan bantuan dengan mudah
                                melalui sistem kami.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 service-item">
                    <a class="text-black" href="{{ route('laporan.index') }}">
                        <div class="block"> <span class="colored-box text-center h3 mb-4">02</span>
                            <h3 class="mb-3 service-title">Cek Status</h3>
                            <p class="mb-0 service-description">Lacak status laporan Anda menggunakan tiket, NIK, atau
                                nomor HP.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage_tab position-relative">
        <div class="section container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Panduan Penggunaan</p>
                        <h1>Cara Mengajukan Masalah & Mengecek Status Laporan</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <ul class="payment_info_tab nav nav-pills justify-content-center mb-4" id="pills-tab"
                        role="tablist">
                        <li class="nav-item m-2" role="presentation"> <a
                                class="nav-link btn btn-outline-primary effect-none text-dark active"
                                id="pills-how-much-can-i-recive-tab" data-bs-toggle="pill"
                                href="#pills-how-much-can-i-recive" role="tab"
                                aria-controls="pills-how-much-can-i-recive" aria-selected="true">Bagaimana Cara Saya
                                Melakukan Pengajuan?</a>
                        </li>
                        <li class="nav-item m-2" role="presentation"> <a
                                class="nav-link btn btn-outline-primary effect-none text-dark "
                                id="pills-how-much-does-it-costs-tab" data-bs-toggle="pill"
                                href="#pills-how-much-does-it-costs" role="tab"
                                aria-controls="pills-how-much-does-it-costs" aria-selected="true">Bagaimana Cara
                                Mengecek Pengajuan Saya?</a>
                        </li>
                    </ul>
                    <div class="rounded shadow bg-white p-5 tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-how-much-can-i-recive" role="tabpanel"
                            aria-labelledby="pills-how-much-can-i-recive-tab">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="content-block text-center">
                                        <h3 class="mb-4">Cara Mengajukan Masalah/Bantuan</h3>
                                        <div class="content">
                                            <p>Untuk mengajukan masalah atau permintaan bantuan, Anda perlu:</p>
                                            <ul class="text-start d-inline-block">
                                                <li>Mengisi data diri: <strong>NIK dan NIP, Nama, Nomor HP</strong>.</li>
                                                <li>Memilih <strong>Ruangan</strong> dan <strong>Kategori
                                                        Pengajuan</strong> sesuai kebutuhan.</li>
                                                <li>Menuliskan <strong>Keterangan</strong> detail tentang masalah Anda.
                                                </li>
                                                <li>Opsional: Mengunggah <strong>Dokumen Pendukung</strong> jika
                                                    diperlukan.</li>
                                            </ul>
                                            <p>Setelah formulir lengkap diisi, klik tombol <strong>"Ajukan
                                                    Laporan"</strong>.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-how-much-does-it-costs" role="tabpanel"
                            aria-labelledby="pills-how-much-does-it-costs-tab">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="content-block text-center">
                                        <h3 class="mb-4">Cara Mengecek Status Laporan</h3>
                                        <div class="content">
                                            <p>Untuk mengecek status laporan Anda, gunakan salah satu metode berikut:
                                            </p>
                                            <ul class="text-start d-inline-block">
                                                <li>Masukkan <strong>Nomor Tiket</strong> yang diberikan saat berhasil
                                                    mengajukan pengajuan
                                                    (Nomor Tiket juga akan dikirim ke Nomor HP).
                                                </li>
                                                <li>Gunakan <strong>NIK</strong> dan <strong>Nomor HP</strong>.</li>
                                            </ul>
                                            <p>Status laporan akan ditampilkan, termasuk apakah sudah diterima, sedang
                                                dikerjakan,
                                                atau telah selesai.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="section-sm bg-tertiary pt-0">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Bagian Layanan di kiri -->
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="footer-widget">
                        <h5 class="mb-4 text-primary font-secondary">Layanan</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('laporan.create') }}">Pengajuan
                                    Masalah</a></li>
                            <li class="mb-2"><a href="{{ route('laporan.index') }}">Cek Status
                                    Pengajuan</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Bagian Informasi di kanan -->
                {{-- <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="footer-widget">
                        <h5 class="mb-4 text-primary font-secondary">Informasi</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">Kontak Kami</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>

            <!-- Bagian bawah footer -->
            <div class="row align-items-center mt-5 text-center text-md-start">
                <div class="col-lg-4">
                    <a href="{{ url('/') }}">
                        <h3 class="mb-0">WADUL-IT</h3>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <ul class="list-unstyled list-inline mb-0 text-lg-center">
                        <li class="list-inline-item me-4">
                            <span id="copyright-text" class="text-black"></span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 text-md-end mt-4 mt-md-0">
                    <ul class="list-unstyled list-inline mb-0 social-icons">
                        <li class="list-inline-item me-3">
                            <a title="Explorer Instagram Profile" class="text-black"
                                href="https://www.instagram.com/rsdkalisatjember/" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item me-3">
                            <a title="Explorer Facebook Profile" class="text-black"
                                href="https://www.facebook.com/RsdKalisat" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- CSS tambahan untuk responsivitas -->
    <style>
        @media (max-width: 768px) {
            .footer-widget h5 {
                text-align: center;
            }

            .footer-widget ul {
                padding-left: 0;
                text-align: center;
            }
        }
    </style>

    <!-- Year Script -->
    <script>
        // Mengambil tahun saat ini
        const currentYear = new Date().getFullYear();
        const copyrightText = `Copyright © ${currentYear} RSD Kalisat. All rights reserved.`;

        // Menambahkan teks ke elemen dengan id "copyright-text"
        document.getElementById('copyright-text').textContent = copyrightText;
    </script>

    <!-- # JS Plugins -->
    <script src="{{ asset('assets/guest/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/guest/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/guest/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/guest/plugins/scrollmenu/scrollmenu.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('assets/guest/js/script.js') }}"></script>
</body>

</html>
