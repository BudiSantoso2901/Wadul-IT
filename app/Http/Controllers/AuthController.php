<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('laporan.view')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Login Gagal, error name atau password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPasswordPage()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'name' => 'required|exists:users,name',
            'nomor_hp' => [
                'required',
                'string',
                'min:9',
                'max:14',
                'regex:/^[0-9]+$/',
                function ($attribute, $value, $fail) use ($request) {
                    // Hapus semua karakter non-angka
                    $cleaned = preg_replace('/[^0-9]/', '', $value);

                    // Jika nomor dimulai dengan 0, ganti dengan 62
                    if (substr($cleaned, 0, 1) === '0') {
                        $cleaned = '62' . substr($cleaned, 1);
                    }

                    // Jika nomor tidak dimulai dengan 62, tambahkan
                    if (substr($cleaned, 0, 2) !== '62') {
                        $cleaned = '62' . $cleaned;
                    }

                    // Update nilai request dengan nomor yang sudah diformat
                    $request->merge(['nomor_hp' => $cleaned]);
                }
            ],
            'new_password' => 'required|min:8'
        ], [
            'nomor_hp.max_digits' => 'Nomor WhatsApp maksimal 14 digit (termasuk awalan 62)',
            'nomor_hp.regex' => 'Nomor WhatsApp hanya boleh berisi angka',
            'new_password.required' => 'Password baru harus diisi',
            'new_password.min' => 'Password minimal 8 karakter'
        ]);

        $user = User::where('name', $request->name)->first();

        // Update nomor HP user
        $user->nomor_hp = $request->nomor_hp;

        // Generate token reset password
        $token = Str::random(64);
        $user->password_reset_token = $token;
        $user->password_reset_expires_at = now()->addHours(24);
        $user->save();

        // Gunakan password yang diinginkan admin
        $newPassword = $request->new_password;
        $user->password = Hash::make($newPassword);
        $user->save();

        // Format nomor telepon dan grup
        $formattedUserPhone = $this->formatWhatsAppNumber($user->nomor_hp);
        $groupId = $this->getGroupWhatsAppId();

        // Generate pesan untuk admin dan user
        $adminMessage = $this->generateWhatsAppMessageForAdmin($user, $newPassword);
        $userMessage = $this->generateWhatsAppMessageForUser($user, $newPassword);

        // Kirim pesan admin ke grup dan pesan user ke nomor tujuan
        $this->sendWhatsAppMessage($groupId, $adminMessage);
        $this->sendWhatsAppMessage($formattedUserPhone, $userMessage);

        return back()->with('success', 'Password baru telah dikirim ke WhatsApp Anda');
    }

    public function resetPasswordPage($token)
    {
        $user = User::where('password_reset_token', $token)
            ->where('password_reset_expires_at', '>', now())
            ->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Token reset password tidak valid atau sudah kadaluarsa');
        }

        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::where('password_reset_token', $request->token)
            ->where('password_reset_expires_at', '>', now())
            ->first();

        if (!$user) {
            return back()->with('error', 'Token reset password tidak valid atau sudah kadaluarsa');
        }

        $user->password = Hash::make($request->password);
        $user->password_reset_token = null;
        $user->password_reset_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diubah');
    }

    private function formatWhatsAppNumber($phoneNumber)
    {
        // Format nomor telepon untuk WhatsApp
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);
        if (substr($cleaned, 0, 1) === '0') {
            $cleaned = '62' . substr($cleaned, 1);
        }
        return $cleaned . '@c.us';
    }

    private function sendWhatsAppMessage($phoneNumber, $message)
    {
        $SECRET_TOKEN = 'mnsve3hD8m9qLLq6gW8n';

        Http::withHeaders([
            'Authorization' => $SECRET_TOKEN
        ])->post('https://api.fonnte.com/send', [
            'target' => $phoneNumber,
            'message' => $message,
        ]);
    }

    private function getGroupWhatsAppId()
    {
        return '628976346064-1500892951@g.us';
    }

    private function generateWhatsAppMessageForAdmin($user, $newPassword)
    {
        return "==Reset Password==\n" .
            "Username: {$user->name}\n" .
            "No. WA: {$user->nomor_hp}\n" .
            "Password Baru: {$newPassword}";
    }

    private function generateWhatsAppMessageForUser($user, $newPassword)
    {
        // salam berdasarkan waktu
        $currentHour = now()->hour;
        $salam = 'Selamat ';
        if ($currentHour >= 3 && $currentHour < 11) {
            $salam .= 'Pagi! 🌞';
        } elseif ($currentHour >= 11 && $currentHour < 15) {
            $salam .= 'Siang! 🌤️';
        } elseif ($currentHour >= 15 && $currentHour < 18) {
            $salam .= 'Sore! 🌥️';
        } else {
            $salam .= 'Malam! 🌜️';
        }

        return "==Wadul IT RSD Kalisat ==\n\n" .
            "$salam, Password baru Anda adalah: *_{$newPassword}_*.\n" .
            "Silakan login menggunakan password baru ini.\n\n" .
            "Pesan ini dikirim otomatis oleh sistem.";
    }
}
