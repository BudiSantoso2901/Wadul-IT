<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="Wadul-IT By Budi & Rashel">
    <meta name="author" content="Wadul-IT By Budi & Rashel">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/RS/LOgo RS ONLY.png') }}" type="image/x-icon">
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
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS tambahan untuk responsivitas -->
    <style>
        :root {
            --pink-main: #ec4899;
            --pink-soft: #fce7f3;
            --pink-dark: #be185d;
        }

        /* ================= NAVBAR ================= */
        .navigation {
            background: white !important;
            box-shadow: 0 4px 20px rgba(236, 72, 153, 0.1);
        }

        .navbar .nav-link {
            color: #444;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar .nav-link:hover {
            color: var(--pink-main);
        }

        .navbar .nav-link.active {
            color: var(--pink-main) !important;
            font-weight: 600;
            position: relative;
        }

        .navbar .nav-link.active::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            background: var(--pink-main);
            left: 0;
            bottom: -6px;
            border-radius: 10px;
        }

        /* ================= BUTTON ================= */
        .btn-primary {
            background: var(--pink-main) !important;
            border: none !important;
            border-radius: 999px;
            padding: 12px 25px;
        }

        .btn-primary:hover {
            background: var(--pink-dark) !important;
        }

        /* ================= FORM ================= */
        .form-control:focus {
            border-color: var(--pink-main);
            box-shadow: 0 0 0 0.2rem rgba(236, 72, 153, 0.2);
        }

        .form-select:focus {
            border-color: var(--pink-main);
            box-shadow: 0 0 0 0.2rem rgba(236, 72, 153, 0.2);
        }

        /* ================= SELECT2 ================= */
        .select2-container--default .select2-selection--single {
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: var(--pink-main);
            box-shadow: 0 0 0 0.2rem rgba(236, 72, 153, 0.2);
        }

        .select2-container--default .select2-results__option--highlighted {
            background-color: var(--pink-main) !important;
        }

        /* ================= TITLE ================= */
        h1,
        h2,
        h3 {
            color: #111;
        }

        .text-primary {
            color: var(--pink-main) !important;
        }

        /* ================= CARD FORM ================= */
        form {
            border-radius: 20px !important;
            box-shadow: 0 10px 40px rgba(236, 72, 153, 0.1);
        }

        /* ================= INPUT FILE ================= */
        input[type="file"] {
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        /* ================= SWEET ALERT ================= */
        .swal2-confirm {
            background: var(--pink-main) !important;
        }

        .swal2-confirm:hover {
            background: var(--pink-dark) !important;
        }

        /* ================= FOOTER ================= */
        footer {
            background: #fff !important;
        }

        .footer-widget h5 {
            color: var(--pink-main);
        }

        /* ================= MOBILE ================= */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <!-- navigation -->
    <header class="navigation bg-tertiary">
        <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img loading="prelaod" decoding="async" class="img-fluid" width="80"
                        src="{{ asset('assets/RS/LOgo RS ONLY.png') }}" alt="RSD Kalisat">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('laporan/create') ? 'active' : '' }}"
                                href="{{ route('laporan.create') }}">Pengajuan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}"
                                href="{{ route('laporan.index') }}">Cek Laporan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- /navigation -->

    <div class="container mt-5">
        <h1 class="text-center">Cek Laporan</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan</h4>
                        <form id="search-form" class="d-flex align-items-center">
                            @csrf
                            <div class="form-group mb-8">
                                <input type="text" id="search" class="form-control" placeholder="Cari Laporan"
                                    style="width: 300px;" />
                            </div>
                            <button type="submit" id="cek-laporan" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="laporan-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Tanggal</th>
                                        <th>Pelapor</th>
                                        <th>Ruangan</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Waktu Respons</th>
                                        <th>Waktu Selesai</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nomor Tiket</th>
                                        <th>Tanggal</th>
                                        <th>Pelapor</th>
                                        <th>Ruangan</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Waktu Respons</th>
                                        <th>Waktu Selesai</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </tfoot>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="section-sm bg-tertiary pt-6  ">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Bagian Layanan di kiri -->
                <div class="col-lg-2 col-md-4 col-6 mb-4 form-group">
                    <div class="footer-widget">
                        <h5 class="mb-4 form-group text-primary font-secondary">Layanan</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('laporan.create') }}">Pengajuan
                                    Masalah</a></li>
                            <li class="mb-2"><a href="{{ route('laporan.index') }}">Cek Status
                                    Pengajuan</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Bagian Informasi di kanan -->
                <div class="col-lg-2 col-md-4 col-6 mb-4 form-group">
                    <div class="footer-widget">
                        <h5 class="mb-4 form-group text-primary font-secondary">Informasi</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">Kontak Kami</a></li>
                        </ul>
                    </div>
                </div>
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

    <!-- Year Script -->
    <script>
        // Mengambil tahun saat ini
        const currentYear = new Date().getFullYear();
        const copyrightText = `Copyright © ${currentYear} RSD Kalisat. All rights reserved.`;
        // Menambahkan teks ke elemen dengan id "copyright-text"
        document.getElementById('copyright-text').textContent = copyrightText;
    </script>
    <!--   Core JS Files   -->
    <script src="{{ asset('/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('/assets/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('/assets/js/setting-demo2.js') }}"></script>
    <!-- Tambahkan library Sweet Alert ke dalam kode Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable awal
            var table = $('#laporan-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: false,
                searching: false,
                paging: true,
                columns: [{
                        data: 'nomor_tiket'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'pelapor'
                    },
                    {
                        data: 'ruangan'
                    },
                    {
                        data: 'kategori'
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == 'Diterima') {
                                return '<span class="badge bg-success">' + data + '</span>';
                            } else if (data == 'Diproses') {
                                return '<span class="badge bg-warning">' + data + '</span>';
                            } else if (data == 'Selesai') {
                                return '<span class="badge bg-primary">' + data + '</span>';
                            }
                        }
                    },
                    {
                        data: 'waktu_diproses', // Menambahkan kolom waktu respons
                        render: function(data, type, row) {
                            if (data === '-') {
                                return data;
                            }
                            return `<span class="badge bg-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: 'waktu_selesai_keterangan', // Menambahkan kolom waktu selesai keterangan
                        render: function(data, type, row) {
                            if (row.status === 'Selesai' && data) {
                                return `<span class="badge bg-info">${data}</span>`;
                            }
                            return '-';
                        }
                    },
                    {
                        data: 'deskripsi',
                        render: function(data, type, row) {
                            // Jika data null atau kosong, tampilkan tanda '-'
                            if (data === null || data === '') {
                                return '-';
                            }
                            return `${data}`;
                        }
                    },
                ],
                columnDefs: [{
                    targets: "_all",
                    className: "dt-center"
                }]
            });
            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                var search = $('#search').val();

                if (search != '') {
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('laporan.cari') }}",
                        data: {
                            search: search
                        },
                        success: function(data) {
                            if (data.message) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Tidak ada data yang sesuai',
                                    text: data.message,
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-danger',
                                        },
                                    },
                                });
                            } else {
                                // Hapus data sebelumnya
                                table.clear();

                                // Tambahkan data baru
                                table.rows.add(data);

                                // Gambar ulang tabel
                                table.draw();
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Tidak ada data yang sesuai',
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-danger',
                                    },
                                },
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kata Kunci Pencarian Kosong',
                        text: 'Silakan masukkan kata kunci pencarian',
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger',
                            },
                        },
                    });
                }
            });


        });
    </script>
</body>

</html>
