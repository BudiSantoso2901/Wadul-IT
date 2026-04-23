<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reset Password Helpdesk IT — RSD Kalisat Jember">
    <link rel="icon" href="{{ asset('assets/RS/LOgo RS ONLY.png') }}" type="image/x-icon">
    <title>Lupa Kata Sandi — RSD Kalisat</title>

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
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-700: #374151;
            --gray-900: #111827;
            --border: #5af4ac;
            --radius: 12px;
        }

        html,
        body {
            height: 100%;
            font-family: 'Inter', sans-serif;
        }

        /* ===== ANIMATED BACKGROUND ===== */
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        /* Floating blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.35;
            animation: blobFloat 8s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }

        .blob-1 {
            width: 400px;
            height: 400px;
            background: #15803d;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .blob-2 {
            width: 320px;
            height: 320px;
            background: #22c55e;
            bottom: -80px;
            right: -80px;
            animation-delay: 3s;
        }

        .blob-3 {
            width: 220px;
            height: 220px;
            background: #127938;
            top: 40%;
            left: 60%;
            animation-delay: 1.5s;
        }

        .blob-4 {
            width: 150px;
            height: 150px;
            background: #038e36;
            top: 60%;
            left: 10%;
            animation-delay: 5s;
        }

        .blob-5 {
            width: 100px;
            height: 100px;
            background: #05c84c;
            top: 10%;
            right: 15%;
            animation-delay: 2.5s;
        }

        @keyframes blobFloat {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            33% {
                transform: translateY(-20px) scale(1.04);
            }

            66% {
                transform: translateY(10px) scale(0.97);
            }
        }

        /* Floating particles */
        .particles {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(34, 197, 94, 0.25);
            animation: particleDrift linear infinite;
        }

        @keyframes particleDrift {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-10vh) scale(1);
                opacity: 0;
            }
        }

        /* ===== CARD ===== */
        .reset-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 0.5px solid var(--border);
            box-shadow: 0 24px 64px rgba(190, 24, 93, 0.12), 0 4px 16px rgba(0, 0, 0, .06);
            width: 100%;
            max-width: 440px;
            padding: 2.5rem 2.25rem;
            position: relative;
            z-index: 10;
            animation: cardIn .5s cubic-bezier(.22, .61, .36, 1) both;
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(24px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ===== CARD TOP ===== */
        .card-top {
            text-align: center;
            margin-bottom: 2rem;
        }

        .icon-circle {
            width: 64px;
            height: 64px;
            background: var(--pk-soft);
            border: 2px solid var(--pk-mid);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            font-size: 24px;
            color: var(--pk);
            animation: iconPulse 3s ease-in-out infinite;
        }

        @keyframes iconPulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, .0);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(34, 197, 94, .1);
            }
        }

        .badge-rs {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--pk-mid);
            color: var(--pk-deep);
            font-size: 10px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 999px;
            letter-spacing: 0.07em;
            margin-bottom: 10px;
        }

        .card-top h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 6px;
        }

        .card-top p {
            font-size: 13px;
            color: var(--gray-500);
            line-height: 1.6;
            max-width: 320px;
            margin: 0 auto;
        }

        /* ===== STEPS INDICATOR ===== */
        .steps {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            margin-bottom: 1.75rem;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .step-dot {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            border: 2px solid var(--gray-200);
            color: var(--gray-400);
            background: #fff;
            transition: all .3s;
        }

        .step-dot.active {
            border-color: var(--pk);
            background: var(--pk);
            color: #fff;
        }

        .step-dot.done {
            border-color: var(--pk);
            background: var(--pk-soft);
            color: var(--pk);
        }

        .step-label {
            font-size: 10px;
            color: var(--gray-400);
            white-space: nowrap;
        }

        .step-label.active {
            color: var(--pk);
            font-weight: 600;
        }

        .step-line {
            width: 40px;
            height: 2px;
            background: var(--gray-200);
            margin: 0 4px;
            margin-bottom: 14px;
            border-radius: 99px;
        }

        /* ===== ALERTS ===== */
        .alert-box {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 1.25rem;
            animation: fadeIn .3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .alert-error {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
        }

        .alert-box i {
            margin-top: 1px;
            flex-shrink: 0;
        }

        /* ===== FORM GROUP ===== */
        .form-group {
            margin-bottom: 1.1rem;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: var(--gray-700);
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 6px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            border: 1.5px solid var(--gray-200);
            border-radius: 11px;
            overflow: hidden;
            transition: border-color .25s, box-shadow .25s;
            background: #fff;
        }

        .input-wrapper:focus-within {
            border-color: var(--pk);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.12);
        }

        .input-wrapper.is-invalid {
            border-color: #f43f5e;
        }

        .input-icon {
            width: 44px;
            height: 48px;
            background: var(--pk-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1.5px solid var(--border);
            flex-shrink: 0;
            color: var(--pk);
            font-size: 14px;
            transition: background .2s;
        }

        .input-wrapper:focus-within .input-icon {
            background: var(--pk-mid);
        }

        .input-wrapper input {
            flex: 1;
            height: 48px;
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

        .toggle-btn {
            width: 44px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--gray-400);
            font-size: 14px;
            background: none;
            border: none;
            transition: color .2s;
        }

        .toggle-btn:hover {
            color: var(--pk);
        }

        .hint-text {
            font-size: 11px;
            color: var(--gray-400);
            margin-top: 5px;
            padding-left: 2px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .invalid-feedback {
            font-size: 12px;
            color: #f43f5e;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ===== PASSWORD STRENGTH ===== */
        .strength-wrap {
            margin-top: 8px;
        }

        .strength-bars {
            display: flex;
            gap: 4px;
            margin-bottom: 5px;
        }

        .s-bar {
            flex: 1;
            height: 4px;
            border-radius: 99px;
            background: var(--gray-200);
            transition: background .3s, transform .2s;
        }

        .s-bar.weak {
            background: #f97316;
        }

        .s-bar.fair {
            background: #eab308;
        }

        .s-bar.good {
            background: #22c55e;
        }

        .s-bar.strong {
            background: #15803d;
        }

        .strength-label {
            font-size: 11px;
            color: var(--gray-400);
            transition: color .3s;
        }

        .strength-label.weak {
            color: #f97316;
        }

        .strength-label.fair {
            color: #eab308;
        }

        .strength-label.good {
            color: #22c55e;
        }

        .strength-label.strong {
            color: #15803d;
        }

        /* ===== SUBMIT BUTTON ===== */
        .btn-submit {
            width: 100%;
            background: var(--pk);
            color: #fff;
            border: none;
            border-radius: 11px;
            padding: 14px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background .2s, transform .1s, box-shadow .2s;
            letter-spacing: 0.01em;
            box-shadow: 0 4px 14px rgba(34, 197, 94, .3);
            margin-top: 1.5rem;
        }

        .btn-submit:hover {
            background: var(--pk-dark);
            box-shadow: 0 6px 20px rgba(34, 197, 94, .4);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

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
            border: 2px solid rgba(255, 255, 255, .35);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin .65s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ===== BACK LINK ===== */
        .back-row {
            text-align: center;
            margin-top: 1.25rem;
        }

        .back-row a {
            font-size: 13px;
            color: var(--pk);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color .2s;
        }

        .back-row a:hover {
            color: var(--pk-dark);
        }

        /* ===== FOOTER ===== */
        .card-footer-note {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 0.5px solid var(--pk-mid);
            font-size: 11px;
            color: var(--gray-400);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }

            .reset-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .card-top h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Animated Background -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div>
    <div class="blob blob-5"></div>
    <div class="particles" id="particles"></div>

    <!-- ===== CARD ===== -->
    <div class="reset-card">

        <!-- Top -->
        <div class="card-top">
            <div class="icon-circle">
                <i class="fas fa-lock-open"></i>
            </div>
            <div class="badge-rs">
                <i class="fas fa-hospital" style="font-size:9px;"></i>
                RSD KALISAT JEMBER
            </div>
            <h1>Reset Kata Sandi</h1>
            <p>Verifikasi identitas Anda untuk mengatur ulang kata sandi akun Helpdesk IT</p>
        </div>

        <!-- Alerts -->
        @if (session('success'))
            <div class="alert-box alert-success">
                <i class="fas fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="alert-box alert-error">
                <i class="fas fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('password.email') }}" method="POST" id="resetForm" novalidate>
            @csrf

            {{-- USERNAME --}}
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-user" style="margin-right:4px;"></i>Username
                </label>
                <div class="input-wrapper {{ $errors->has('name') ? 'is-invalid' : '' }}">
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" id="name" name="name" placeholder="Masukkan username akun Anda"
                        value="{{ old('name') }}" autocomplete="username" required>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                        <i class="fas fa-circle-exclamation" style="font-size:11px;"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- NOMOR WA --}}
            <div class="form-group">
                <label for="nomor_hp" class="form-label">
                    <i class="fab fa-whatsapp" style="margin-right:4px;"></i>Nomor WhatsApp
                </label>
                <div class="input-wrapper {{ $errors->has('nomor_hp') ? 'is-invalid' : '' }}">
                    <div class="input-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <input type="tel" id="nomor_hp" name="nomor_hp" placeholder="0812xxxxxxxx"
                        value="{{ old('nomor_hp') }}" maxlength="14" inputmode="numeric" pattern="[0-9]*" required>
                </div>
                <div class="hint-text">
                    <i class="fas fa-circle-info" style="font-size:10px; color: var(--pk);"></i>
                    Awali dengan 0, contoh: 08123456789
                </div>
                @error('nomor_hp')
                    <div class="invalid-feedback">
                        <i class="fas fa-circle-exclamation" style="font-size:11px;"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- PASSWORD BARU --}}
            <div class="form-group">
                <label for="new_password" class="form-label">
                    <i class="fas fa-lock" style="margin-right:4px;"></i>Kata Sandi Baru
                </label>
                <div class="input-wrapper {{ $errors->has('new_password') ? 'is-invalid' : '' }}">
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" id="new_password" name="new_password" placeholder="Min. 8 karakter"
                        autocomplete="new-password" minlength="8" required>
                    <button type="button" class="toggle-btn" id="togglePwd" title="Tampilkan sandi">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>
                </div>

                <!-- Password Strength -->
                <div class="strength-wrap" id="strengthWrap" style="display:none;">
                    <div class="strength-bars">
                        <div class="s-bar" id="bar1"></div>
                        <div class="s-bar" id="bar2"></div>
                        <div class="s-bar" id="bar3"></div>
                        <div class="s-bar" id="bar4"></div>
                    </div>
                    <span class="strength-label" id="strengthLabel">Terlalu pendek</span>
                </div>

                <div class="hint-text">
                    <i class="fas fa-circle-info" style="font-size:10px; color: var(--pk);"></i>
                    Minimal 8 karakter, kombinasikan huruf & angka
                </div>
                @error('new_password')
                    <div class="invalid-feedback">
                        <i class="fas fa-circle-exclamation" style="font-size:11px;"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-submit" id="btnSubmit">
                <span class="btn-text">
                    <i class="fas fa-rotate-right" style="font-size:13px;"></i>
                    Reset Kata Sandi
                </span>
                <span class="btn-spinner">
                    <span class="spinner-ring"></span>
                    Memproses...
                </span>
            </button>
        </form>

        <!-- Back to login -->
        <div class="back-row">
            <a href="{{ route('login') }}">
                <i class="fas fa-arrow-left" style="font-size:11px;"></i>
                Kembali ke halaman login
            </a>
        </div>

        <!-- Footer note -->
        <div class="card-footer-note">
            <i class="fas fa-shield-halved" style="color:var(--pk); font-size:12px;"></i>
            Sistem Helpdesk IT — RSD Kalisat Jember &copy; {{ date('Y') }}
        </div>

    </div>

    <script>
        /* ===== Generate floating particles ===== */
        (function() {
            const container = document.getElementById('particles');
            const count = 18;
            for (let i = 0; i < count; i++) {
                const p = document.createElement('div');
                p.classList.add('particle');
                const size = Math.random() * 10 + 5;
                p.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    left: ${Math.random() * 100}%;
                    animation-duration: ${Math.random() * 12 + 10}s;
                    animation-delay: ${Math.random() * 10}s;
                    opacity: ${Math.random() * 0.3 + 0.1};
                `;
                container.appendChild(p);
            }
        })();

        /* ===== Toggle password ===== */
        const togglePwd = document.getElementById('togglePwd');
        const pwdInput = document.getElementById('new_password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePwd.addEventListener('click', function() {
            const hidden = pwdInput.type === 'password';
            pwdInput.type = hidden ? 'text' : 'password';
            eyeIcon.classList.toggle('fa-eye', !hidden);
            eyeIcon.classList.toggle('fa-eye-slash', hidden);
        });

        /* ===== Password strength checker ===== */
        const bars = [document.getElementById('bar1'), document.getElementById('bar2'), document.getElementById('bar3'),
            document.getElementById('bar4')
        ];
        const strengthWrap = document.getElementById('strengthWrap');
        const strengthLabel = document.getElementById('strengthLabel');

        const levels = [{
                label: 'Terlalu pendek',
                cls: 'weak',
                fill: 1
            },
            {
                label: 'Lemah',
                cls: 'weak',
                fill: 1
            },
            {
                label: 'Sedang',
                cls: 'fair',
                fill: 2
            },
            {
                label: 'Bagus',
                cls: 'good',
                fill: 3
            },
            {
                label: 'Kuat',
                cls: 'strong',
                fill: 4
            },
        ];

        function checkStrength(pwd) {
            let score = 0;
            if (pwd.length >= 8) score++;
            if (/[A-Z]/.test(pwd)) score++;
            if (/[0-9]/.test(pwd)) score++;
            if (/[^A-Za-z0-9]/.test(pwd)) score++;
            return score;
        }

        pwdInput.addEventListener('input', function() {
            const val = this.value;
            if (!val) {
                strengthWrap.style.display = 'none';
                return;
            }
            strengthWrap.style.display = 'block';

            const score = val.length < 8 ? 0 : checkStrength(val);
            const level = levels[score];

            bars.forEach((b, idx) => {
                b.className = 's-bar';
                if (idx < level.fill) b.classList.add(level.cls);
            });

            strengthLabel.className = `strength-label ${level.cls}`;
            strengthLabel.textContent = level.label;
        });

        /* ===== Only allow numeric input for WA field ===== */
        document.getElementById('nomor_hp').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });

        /* ===== Loading state on submit ===== */
        document.getElementById('resetForm').addEventListener('submit', function() {
            const btn = document.getElementById('btnSubmit');
            btn.classList.add('loading');
            btn.disabled = true;
        });
    </script>

</body>

</html>
