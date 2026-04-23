<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="Wadul-IT By Budi & Rashel">
    <meta name="author" content="Wadul-IT By Budi & Rashel">
    <link rel="icon" href="{{ asset('assets/RS/LOgo RS ONLY.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wadul-IT</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <style>
        /* ===== RESET & BASE ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --pk: #22c55e;
            --pk-soft: #ecfdf5;
            --pk-mid: #bbf7d0;
            --pk-dark: #15803d;
            --pk-deep: #14532d;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-700: #374151;
            --gray-900: #111827;
            --border-soft: #f3e8f0;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, .07), 0 1px 2px rgba(0, 0, 0, .05);
            --shadow-md: 0 4px 16px rgba(236, 72, 153, .08), 0 1px 4px rgba(0, 0, 0, .06);
            --radius: 16px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--pk-soft);
            color: var(--gray-900);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ===== NAVBAR ===== */
        .navbar-rs {
            background: #fff;
            border-bottom: 0.5px solid var(--border-soft);
            box-shadow: 0 2px 12px rgba(236, 72, 153, .06);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-rs .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.875rem 1.5rem;
            max-width: 900px;
            margin: 0 auto;
        }

        .navbar-brand img {
            height: 48px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-500);
            padding: 6px 14px;
            border-radius: 8px;
            transition: all .2s;
        }

        .nav-links a:hover {
            background: var(--pk-soft);
            color: var(--pk-dark);
        }

        .nav-links a.active {
            background: var(--pk-soft);
            color: var(--pk-dark);
            font-weight: 600;
        }

        .nav-toggler {
            display: none;
            background: none;
            border: 0.5px solid var(--border-soft);
            border-radius: 8px;
            padding: 6px 10px;
            cursor: pointer;
            color: var(--gray-700);
            font-size: 18px;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 2.5rem 1.5rem 4rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .page-header .badge-section {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--pk-mid);
            color: var(--pk-deep);
            font-size: 12px;
            font-weight: 600;
            padding: 4px 14px;
            border-radius: 999px;
            margin-bottom: 12px;
            letter-spacing: 0.04em;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 14px;
            color: var(--gray-500);
        }

        /* ===== TICKET CARD ===== */
        .ticket-card {
            background: #fff;
            border-radius: var(--radius);
            border: 0.5px solid var(--border-soft);
            box-shadow: var(--shadow-md);
            max-width: 760px;
            margin: 0 auto;
            overflow: hidden;
        }

        /* Card Header */
        .card-header-band {
            background: linear-gradient(135deg, #22c55e 0%, #0e8f3d 100%);
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .ticket-icon-wrap {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, .18);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ticket-icon-wrap svg {
            width: 22px;
            height: 22px;
            stroke: #fff;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .header-info {
            flex: 1;
            min-width: 0;
        }

        .header-info .ticket-no {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            letter-spacing: 0.01em;
        }

        .header-info .ticket-date {
            font-size: 13px;
            color: rgba(255, 255, 255, .78);
            margin-top: 2px;
        }

        /* Status Pill */
        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            flex-shrink: 0;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-menunggu {
            background: #fff7ed;
            color: #c2410c;
        }

        .status-menunggu .status-dot {
            background: #f97316;
        }

        .status-diterima {
            background: #ecfdf5;
            color: #166534;
        }

        .status-diterima .status-dot {
            background: #22c55e;
        }

        .status-diproses {
            background: #fefce8;
            color: #854d0e;
        }

        .status-diproses .status-dot {
            background: #eab308;
        }

        .status-selesai {
            background: #eff6ff;
            color: #1e40af;
        }

        .status-selesai .status-dot {
            background: #3b82f6;
        }

        /* Card Body */
        .card-body-rs {
            padding: 1.75rem 2rem;
        }

        .section-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--pk-dark);
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 0.5px;
            background: var(--pk-mid);
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem 2rem;
            margin-bottom: 1.5rem;
        }

        .info-item {}

        .info-item .lbl {
            font-size: 11px;
            font-weight: 500;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
        }

        .info-item .val {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-900);
        }

        /* Deskripsi box */
        .desc-box {
            background: var(--pk-soft);
            border: 0.5px solid var(--pk-mid);
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            color: var(--gray-700);
            line-height: 1.65;
            margin-bottom: 1.5rem;
        }

        /* Timeline */
        .timeline {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .tl-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .tl-left {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 20px;
            flex-shrink: 0;
        }

        .tl-dot-outer {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid var(--pk);
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        .tl-dot-inner {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--pk);
        }

        .tl-dot-outer.inactive {
            border-color: var(--gray-300);
        }

        .tl-dot-outer.inactive .tl-dot-inner {
            background: var(--gray-300);
        }

        .tl-line {
            width: 1px;
            flex: 1;
            background: var(--pk-mid);
            min-height: 14px;
        }

        .tl-content {
            padding-bottom: 4px;
        }

        .tl-content .tl-lbl {
            font-size: 11px;
            color: var(--gray-500);
            font-weight: 500;
        }

        .tl-content .tl-val {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-900);
            margin-top: 2px;
        }

        .tl-content .tl-val.muted {
            color: var(--gray-500);
            font-weight: 400;
            font-style: italic;
        }

        /* Card Footer */
        .card-footer-rs {
            background: var(--gray-50);
            border-top: 0.5px solid var(--border-soft);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }

        .footer-rs-text {
            font-size: 12px;
            color: var(--gray-500);
        }

        .tag-kategori {
            background: var(--pk-mid);
            color: var(--pk-deep);
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 999px;
        }

        /* ===== ALERT STATE ===== */
        .alert-rs {
            max-width: 760px;
            margin: 0 auto;
            background: #fff;
            border-radius: var(--radius);
            border: 0.5px solid var(--pk-mid);
            box-shadow: var(--shadow-sm);
            padding: 2rem;
            text-align: center;
        }

        .alert-rs .icon {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .alert-rs h3 {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 6px;
        }

        .alert-rs p {
            font-size: 14px;
            color: var(--gray-500);
        }

        /* ===== FOOTER ===== */
        .footer-rs {
            background: #fff;
            border-top: 0.5px solid var(--border-soft);
            padding: 2rem 1.5rem;
            margin-top: auto;
        }

        .footer-rs .container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .footer-brand {
            font-size: 18px;
            font-weight: 700;
            color: var(--pk-dark);
        }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            font-size: 13px;
            color: var(--gray-500);
            transition: color .2s;
        }

        .footer-links a:hover {
            color: var(--pk);
        }

        .footer-social {
            display: flex;
            gap: 10px;
        }

        .footer-social a {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 0.5px solid var(--border-soft);
            background: var(--pk-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pk-dark);
            font-size: 14px;
            transition: all .2s;
        }

        .footer-social a:hover {
            background: var(--pk-mid);
        }

        .footer-copy {
            text-align: center;
            font-size: 12px;
            color: var(--gray-500);
            margin-top: 1.25rem;
            padding-top: 1rem;
            border-top: 0.5px solid var(--border-soft);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 640px) {
            .page-header h1 {
                font-size: 22px;
            }

            .card-header-band {
                padding: 1.25rem 1.25rem;
            }

            .card-body-rs {
                padding: 1.25rem 1.25rem;
            }

            .card-footer-rs {
                padding: 0.875rem 1.25rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .nav-toggler {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 68px;
                left: 0;
                right: 0;
                background: #fff;
                border-bottom: 0.5px solid var(--border-soft);
                padding: 1rem 1.5rem;
                gap: 0.5rem;
            }

            .nav-links.open {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <header>
        <nav class="navbar-rs">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('assets/RS/LOgo RS ONLY.png') }}" alt="Logo RS" loading="lazy">
                </a>

                <button class="nav-toggler" id="nav-toggler" aria-label="Menu">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="nav-links" id="nav-links">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home" style="font-size:12px; margin-right:5px;"></i>Home
                    </a>
                    <a href="{{ route('laporan.create') }}"
                        class="{{ request()->is('laporan/create') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle" style="font-size:12px; margin-right:5px;"></i>Pengajuan
                    </a>
                    <a href="{{ route('laporan.index') }}" class="{{ request()->is('laporan') ? 'active' : '' }}">
                        <i class="fas fa-search" style="font-size:12px; margin-right:5px;"></i>Cek Laporan
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- ===== MAIN ===== -->
    <main class="main">

        <div class="page-header">
            <div class="badge-section">
                <i class="fas fa-ticket-alt" style="font-size:11px;"></i>
                Status Tiket
            </div>
            <h1>Hasil Cek Laporan</h1>
            <p>Berikut adalah detail pengajuan tiket IT Anda</p>
        </div>

        @if (isset($laporan) && $laporan)
            @php
                $status = $laporan['status'] ?? '';
                $statusClass = match ($status) {
                    'Diterima' => 'diterima',
                    'Diproses' => 'diproses',
                    'Selesai' => 'selesai',
                    default => 'menunggu',
                };
            @endphp

            <div class="ticket-card">

                {{-- ===== CARD HEADER ===== --}}
                <div class="card-header-band">
                    <div class="ticket-icon-wrap">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <div class="header-info">
                        <div class="ticket-no">#{{ $laporan['nomor_tiket'] }}</div>
                        <div class="ticket-date">
                            <i class="fas fa-calendar-alt" style="font-size:11px;"></i>
                            {{ $laporan['created_at'] }}
                        </div>
                    </div>
                    <span class="status-pill status-{{ $statusClass }}">
                        <span class="status-dot"></span>
                        {{ $status ?: 'Menunggu' }}
                    </span>
                </div>

                {{-- ===== CARD BODY ===== --}}
                <div class="card-body-rs">

                    {{-- INFO PELAPOR --}}
                    <div class="section-label">Informasi Pelapor</div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="lbl"><i class="fas fa-user" style="margin-right:4px;"></i>Pelapor</div>
                            <div class="val">{{ $laporan['pelapor'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="lbl"><i class="fas fa-door-open" style="margin-right:4px;"></i>Ruangan</div>
                            <div class="val">{{ $laporan['ruangan'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="lbl"><i class="fas fa-tag" style="margin-right:4px;"></i>Kategori</div>
                            <div class="val">{{ $laporan['kategori'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="lbl"><i class="fas fa-align-left" style="margin-right:4px;"></i>Keterangan
                            </div>
                            <div class="val">{{ $laporan['keterangan'] }}</div>
                        </div>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="section-label">Deskripsi Masalah</div>
                    <div class="desc-box">
                        {{ $laporan['deskripsi'] ?: 'Tidak ada deskripsi tambahan.' }}
                    </div>

                    {{-- TIMELINE --}}
                    <div class="section-label">Riwayat Penanganan</div>
                    <div class="timeline">
                        <div class="tl-row">
                            <div class="tl-left">
                                <div class="tl-dot-outer">
                                    <div class="tl-dot-inner"></div>
                                </div>
                                <div class="tl-line"></div>
                            </div>
                            <div class="tl-content">
                                <div class="tl-lbl">Waktu Respons</div>
                                <div class="tl-val {{ empty($laporan['waktu_diproses']) ? 'muted' : '' }}">
                                    {!! !empty($laporan['waktu_diproses']) ? nl2br(e($laporan['waktu_diproses'])) : 'Belum ada respons' !!}
                                </div>
                            </div>
                        </div>
                        <div class="tl-row">
                            <div class="tl-left">
                                <div
                                    class="tl-dot-outer {{ empty($laporan['waktu_selesai_keterangan']) ? 'inactive' : '' }}">
                                    <div class="tl-dot-inner"></div>
                                </div>
                            </div>
                            <div class="tl-content">
                                <div class="tl-lbl">Waktu Selesai</div>
                                <div class="tl-val {{ empty($laporan['waktu_selesai_keterangan']) ? 'muted' : '' }}">
                                    {!! !empty($laporan['waktu_selesai_keterangan'])
                                        ? nl2br(e($laporan['waktu_selesai_keterangan']))
                                        : 'Belum selesai' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{-- end card-body-rs --}}

                {{-- ===== CARD FOOTER ===== --}}
                <div class="card-footer-rs">
                    <span class="footer-rs-text">
                        <i class="fas fa-hospital" style="margin-right:5px; color: var(--pk);"></i>
                        RSD Kalisat - IT
                    </span>
                    <span class="tag-kategori">{{ $laporan['kategori'] }}</span>
                </div>

            </div>{{-- end ticket-card --}}
        @else
            <div class="alert-rs">
                <div class="icon">🔍</div>
                <h3>Laporan Tidak Ditemukan</h3>
                <p>Nomor tiket tidak ditemukan atau belum terdaftar dalam sistem.</p>
            </div>
        @endif

    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer-rs">
        <div class="container">
            <div class="footer-brand">WADUL-IT</div>
            <div class="footer-links">
                <a href="{{ route('laporan.create') }}">
                    <i class="fas fa-plus-circle" style="margin-right:4px;"></i>Pengajuan
                </a>
                <a href="{{ route('laporan.index') }}">
                    <i class="fas fa-search" style="margin-right:4px;"></i>Cek Status
                </a>
            </div>
            <div class="footer-social">
                <a href="https://www.instagram.com/rsdkalisatjember/" target="_blank" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/RsdKalisat" target="_blank" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
        <div class="footer-copy" id="copyright-text"></div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>

    <script>
        // Copyright year
        document.getElementById('copyright-text').textContent =
            `Copyright © ${new Date().getFullYear()} RSD kalisat.`;

        // Mobile nav toggle
        document.getElementById('nav-toggler').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('open');
        });
    </script>

</body>

</html>
