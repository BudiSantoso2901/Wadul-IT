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

    <!-- # JS Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guest/plugins/font-awesome/solid.css') }}">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('assets/guest/css/style.css') }}">

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
                    {{-- <!-- account btn --> <a href="#!" class="btn btn-outline-primary">Log In</a> --}}
                    {{-- <!-- account btn --> <a href="#!" class="btn btn-primary ms-2 ms-lg-3">Sign Up</a> --}}
                </div>
            </div>
        </nav>
    </header>
    <!-- /navigation -->

    <div class="container mt-5">
        <h1 class="text-center">Buat Laporan</h1>
        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
            class="border p-4 rounded shadow-lg mt-3">
            @csrf
            <div class="mb-4 form-group">
                <label for="nik" class="form-label">NIK Atau NIP</label>
                <input type="text" class="form-control shadow-none" id="nik" name="nik"
                    value="{{ old('nik') }}" required>
                @error('nik')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control shadow-none" id="nama" name="nama"
                    value="{{ old('nama') }}" required>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control shadow-none" id="nomor_hp" name="nomor_hp"
                    placeholder="08xxxxxxxxxx" value="{{ old('nomor_hp') }}" required>
                @error('nomor_hp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Ruangan dan Kategori dalam satu baris -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="ruangan_id" class="form-label">Ruangan</label>
                    <select class="form-select select2-ruangan" id="ruangan_id" name="ruangan_id" required>
                        <option value="" disabled selected>Pilih Ruangan</option>
                        @foreach ($ruangans as $ruangan)
                            <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-select select2-kategori" id="kategori_id" name="kategori_id" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4 form-group">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control shadow-none" placeholder="Keterangan laporan minimal 10 kata" id="keterangan"
                    name="keterangan" rows="3" required></textarea>
                @error('keterangan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 form-group">
                <label for="dokumen_pendukung" class="form-label">Dokumen Pendukung (Opsional)</label>
                <input type="file" class="form-control shadow-none" id="dokumen_pendukung"
                    name="dokumen_pendukung">
                @error('dokumen_pendukung')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-2">Kirim Laporan</button>
        </form>
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

    {{-- script untuk mengisi nama dan nomor HP berdasarkan NIK (AutoComplete) --}}
    <script>
        $(document).ready(function() {
            $('.select2-ruangan').select2({
                placeholder: 'Pilih Ruangan',
                allowClear: true
            });

            $('.select2-kategori').select2({
                placeholder: 'Pilih Kategori',
                allowClear: true
            });

            $('#nik').on('input', function() {
                let nik = $(this).val();

                if (nik.length === 16) {
                    $.ajax({
                        url: "{{ route('pelapor.search') }}",
                        type: 'GET',
                        data: {
                            nik: nik
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#nama').val(response.data.nama);
                                $('#nomor_hp').val(response.data.nomor_hp);

                                $.ajax({
                                    url: "{{ route('laporan.last-ruangan') }}",
                                    type: 'GET',
                                    data: {
                                        nik: nik
                                    },
                                    success: function(ruanganResponse) {
                                        if (ruanganResponse.success &&
                                            ruanganResponse.ruangan_id) {
                                            // set select option ruangan sesuai dengan ruangan terakhir
                                            $('#ruangan_id').val(ruanganResponse
                                                .ruangan_id).trigger('change');
                                        }
                                    },
                                    error: function() {
                                        console.log(
                                            'Terjadi kesalahan saat mencari ruangan terakhir'
                                        );
                                    }
                                })
                            } else {
                                $('#nama').val('');
                                $('#nomor_hp').val('');
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mencari pelapor');
                            $('#nama').val('');
                            $('#nomor_hp').val('');
                        }
                    });
                }
            });
        });
    </script>
    {{-- end script --}}

    {{-- alert konfirmasi data --}}
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Konfirmasi Data',
                    text: 'Apakah Anda yakin data yang anda masukkan sudah benar?',
                    icon: 'question',
                    position: 'top-right',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lanjutkan',
                    cancelButtonText: 'Cek Lagi',
                    customClass: {
                        confirmButton: 'swal-custom-confirm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>

    <!-- # JS Plugins -->
    <script src="{{ asset('assets/guest/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/guest/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/guest/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/guest/plugins/scrollmenu/scrollmenu.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Main Script -->
    <script src="{{ asset('assets/guest/js/script.js') }}"></script>
</body>

</html>
