<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login WADUL IT RSD KALISAT">
    <link rel="icon" href="{{ asset('assets/RS/LOgo RS ONLY.png') }}" type="image/x-icon">
    <title>Login — Helpdesk IT RS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        /* ===== RESET ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --pk: #22c55e;
            --pk-soft: #ecfdf5;
            --pk-mid: #bbf7d0;
            --pk-dark: #15803d;
            --pk-deep: #14532d;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-700: #374151;
            --gray-900: #111827;
            --border: #f3e8f0;
            --radius: 12px;
        }

        html,
        body {
            height: 100%;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--pk-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
        }

        /* ===== WRAPPER ===== */
        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            max-width: 880px;
            min-height: 560px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(236, 72, 153, 0.12), 0 4px 20px rgba(0, 0, 0, .06);
        }

        /* ===========================
           LEFT PANEL
        =========================== */
        .left-panel {
            background: var(--pk);
            padding: 2.5rem 2.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        /* decorative circles */
        .left-panel::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
            bottom: -80px;
            right: -80px;
            pointer-events: none;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            top: -40px;
            left: -40px;
            pointer-events: none;
        }

        .left-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 1;
        }

        .logo-mark {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, .2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo-mark img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        .logo-name {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            letter-spacing: 0.01em;
        }

        .logo-name small {
            display: block;
            font-size: 11px;
            font-weight: 400;
            color: rgba(255, 255, 255, .7);
            margin-top: 1px;
        }

        .left-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem 0 1.5rem;
            position: relative;
            z-index: 1;
        }

        .left-body h2 {
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            line-height: 1.3;
            margin-bottom: 10px;
        }

        .left-body p {
            font-size: 13px;
            color: rgba(255, 255, 255, .75);
            line-height: 1.65;
            max-width: 240px;
        }

        .feature-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 9px;
            margin-top: 1.75rem;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, .12);
            border-radius: 10px;
            padding: 9px 13px;
        }

        .feature-list li .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .9);
            flex-shrink: 0;
        }

        .feature-list li span {
            font-size: 12px;
            color: rgba(255, 255, 255, .88);
            font-weight: 500;
        }

        .left-foot {
            font-size: 11px;
            color: rgba(255, 255, 255, .45);
            position: relative;
            z-index: 1;
        }

        /* ===========================
           RIGHT PANEL
        =========================== */
        .right-panel {
            background: #fff;
            padding: 2.75rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .greeting-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--pk-mid);
            color: var(--pk-deep);
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 999px;
            letter-spacing: 0.05em;
            margin-bottom: 14px;
            width: fit-content;
        }

        .right-panel h1 {
            font-size: 22px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 5px;
        }

        .right-panel .subtitle {
            font-size: 13px;
            color: var(--gray-500);
            margin-bottom: 2rem;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-700);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 6px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid var(--gray-200);
            border-radius: 10px;
            overflow: hidden;
            transition: border-color .2s, box-shadow .2s;
            background: #fff;
        }

        .input-wrapper:focus-within {
            border-color: var(--pk);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.12);
        }

        .input-icon {
            width: 44px;
            height: 46px;
            background: var(--pk-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1px solid var(--border);
            flex-shrink: 0;
            color: var(--pk);
            font-size: 14px;
        }

        .input-wrapper input {
            flex: 1;
            height: 46px;
            padding: 0 14px;
            border: none;
            outline: none;
            font-size: 14px;
            color: var(--gray-900);
            font-family: 'Inter', sans-serif;
            background: transparent;
        }

        .input-wrapper input::placeholder {
            color: var(--gray-400);
        }

        .toggle-password {
            width: 42px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--gray-400);
            font-size: 14px;
            transition: color .2s;
            border: none;
            background: none;
        }

        .toggle-password:hover {
            color: var(--pk);
        }

        /* ===== ERROR ALERT ===== */
        .alert-error {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            color: #be123c;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1rem;
        }

        /* ===== FORGOT ===== */
        .forgot-row {
            text-align: right;
            margin-bottom: 1.25rem;
            margin-top: -6px;
        }

        .forgot-row a {
            font-size: 12px;
            color: var(--pk);
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
        }

        .forgot-row a:hover {
            color: var(--pk-dark);
            text-decoration: underline;
        }

        /* ===== SUBMIT BUTTON ===== */
        .btn-submit {
            width: 100%;
            background: var(--pk);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background .2s, transform .1s;
            letter-spacing: 0.01em;
        }

        .btn-submit:hover {
            background: var(--pk-dark);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* ===== DIVIDER ===== */
        .or-divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 1.25rem 0;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            flex: 1;
            height: 0.5px;
            background: var(--gray-200);
        }

        .or-divider span {
            font-size: 11px;
            color: var(--gray-400);
            white-space: nowrap;
        }

        /* ===== SSO BUTTON ===== */
        .btn-sso {
            width: 100%;
            background: var(--gray-50);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
            border-radius: 10px;
            padding: 11px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background .2s, border-color .2s;
            text-decoration: none;
        }

        .btn-sso:hover {
            background: var(--pk-soft);
            border-color: var(--pk-mid);
            color: var(--pk-dark);
        }

        /* ===== FOOTER NOTE ===== */
        .panel-note {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 11px;
            color: var(--gray-400);
        }

        /* ===== LOADING STATE ===== */
        .btn-submit.loading .btn-text {
            display: none;
        }

        .btn-submit.loading .btn-spinner {
            display: flex !important;
        }

        .btn-spinner {
            display: none;
            align-items: center;
            gap: 8px;
        }

        .spinner-ring {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, .4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin .7s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 640px) {
            body {
                padding: 0;
                align-items: flex-start;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
                border-radius: 0;
                min-height: 100vh;
                box-shadow: none;
            }

            .left-panel {
                padding: 1.5rem;
                min-height: auto;
            }

            .left-body {
                padding: 1.25rem 0 0.75rem;
            }

            .left-body h2 {
                font-size: 20px;
            }

            .feature-list {
                display: none;
            }

            .left-foot {
                display: none;
            }

            .right-panel {
                padding: 2rem 1.5rem 2.5rem;
            }

            .right-panel h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">

        {{-- ===== LEFT PANEL ===== --}}
        <div class="left-panel">
            <div class="left-logo">
                <div class="logo-mark">
                    <img src="{{ asset('assets/RS/LOgo RS ONLY.png') }}" alt="Logo RS" loading="lazy"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'fas fa-hospital\' style=\'color:#fff;font-size:16px;\'></i>'">
                </div>
                <div class="logo-name">
                    WADUL-IT
                    <small>RSD KALISAT</small>
                </div>
            </div>

            <div class="left-body">
                <h2>Sistem IT<br>Terintegrasi</h2>
                <p>Kelola laporan dan penanganan masalah IT seluruh unit rumah sakit dalam satu platform.</p>

                <ul class="feature-list">
                    <li>
                        <div class="dot"></div>
                        <span>Pelaporan masalah real-time</span>
                    </li>
                    <li>
                        <div class="dot"></div>
                        <span>Tracking tiket otomatis</span>
                    </li>
                    <li>
                        <div class="dot"></div>
                        <span>Notifikasi status langsung</span>
                    </li>
                    <li>
                        <div class="dot"></div>
                        <span>Riwayat penanganan lengkap</span>
                    </li>
                </ul>
            </div>

            <div class="left-foot">
                <i class="fas fa-hospital" style="margin-right:5px;"></i>
                RSD KALISAT &copy; {{ date('Y') }}
            </div>
        </div>

        {{-- ===== RIGHT PANEL ===== --}}
        <div class="right-panel">
            <div class="greeting-badge">
                <i class="fas fa-circle-check" style="font-size:10px;"></i>
                Selamat datang kembali
            </div>

            <h1>Masuk ke Akun Anda</h1>
            <p class="subtitle">Silakan masukkan kredensial untuk melanjutkan ke sistem</p>

            {{-- ERROR ALERT --}}
            @if (Session::has('error'))
                <div class="alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    {{ Session::get('error') }}
                </div>
            @endif

            <form action="{{ route('login-process') }}" method="POST" id="loginForm" novalidate>
                @csrf

                {{-- USERNAME --}}
                <div class="form-group">
                    <label class="form-label" for="name">
                        <i class="fas fa-user" style="margin-right:4px;"></i>Nama Pengguna
                    </label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama pengguna"
                            value="{{ old('name') }}" autocomplete="username" required>
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-lock" style="margin-right:4px;"></i>Kata Sandi
                    </label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                            autocomplete="current-password" required>
                        <button type="button" class="toggle-password" id="togglePwd"
                            title="Tampilkan/sembunyikan kata sandi">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                {{-- FORGOT --}}
                <div class="forgot-row">
                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-key" style="font-size:11px; margin-right:3px;"></i>
                        Lupa kata sandi?
                    </a>
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn-submit" id="btnSubmit">
                    <span class="btn-text">
                        <i class="fas fa-right-to-bracket" style="font-size:13px;"></i>
                        Masuk Sekarang
                    </span>
                    <span class="btn-spinner">
                        <span class="spinner-ring"></span>
                        Memproses...
                    </span>
                </button>

            </form>

            {{-- <div class="or-divider"><span>atau masuk dengan</span></div> --}}

            {{-- SSO --}}
            {{-- <a href="#" class="btn-sso" onclick="alert('Fitur SSO belum tersedia.'); return false;">
                <i class="fas fa-shield-halved" style="font-size:14px;"></i>
                Masuk via SSO Rumah Sakit
            </a>

            <p class="panel-note">
                <i class="fas fa-lock" style="font-size:10px; margin-right:3px;"></i>
                Sistem ini hanya untuk staf IT yang berwenang
            </p> --}}
        </div>

    </div>

    <script>
        /* ===== Toggle password visibility ===== */
        const togglePwd = document.getElementById('togglePwd');
        const pwdInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePwd.addEventListener('click', function() {
            const isHidden = pwdInput.type === 'password';
            pwdInput.type = isHidden ? 'text' : 'password';
            eyeIcon.classList.toggle('fa-eye', !isHidden);
            eyeIcon.classList.toggle('fa-eye-slash', isHidden);
        });

        /* ===== Loading state on submit ===== */
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('btnSubmit');
            btn.classList.add('loading');
            btn.disabled = true;
        });

        /* ===== Auto-focus first empty field ===== */
        const nameInput = document.getElementById('name');
        if (!nameInput.value) {
            nameInput.focus();
        } else {
            document.getElementById('password').focus();
        }
    </script>
</body>

</html>
