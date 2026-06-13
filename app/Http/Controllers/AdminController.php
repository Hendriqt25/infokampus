<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $labels = [
            'pengumuman-akademik' => 'Pengumuman & Akademik',
            'beasiswa-karir' => 'Beasiswa & Karir',
            'events' => 'Events',
            'prestasi' => 'Prestasi',
            'aktivitas' => 'Aktivitas',
            'lainnya' => 'Lainnya',
        ];

        $distribution = Berita::selectRaw('jenis_berita, COUNT(*) as total')
            ->groupBy('jenis_berita')
            ->pluck('total', 'jenis_berita');

        $categoryLabels = [];
        $categoryData = [];

        foreach ($labels as $key => $label) {
            $categoryLabels[] = $label;
            $categoryData[] = $distribution[$key] ?? 0;
        }

        return view('admin.dashboard', [
            'beritaCount' => Berita::count(),
            'galeriCount' => Galeri::count(),
            'latestBerita' => Berita::latest()->take(5)->get(),
            'categoryLabels' => $categoryLabels,
            'categoryData' => $categoryData,
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect('/login')->with('success', 'Login berhasil. Mengarahkan ke dashboard...');
        }

        return back()->withErrors(['email' => 'Username atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profil()
    {
        return view('admin.profil', ['user' => Auth::user()]);
    }

    public function updateProfil(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|max:20',
        ]);

        $user = Auth::user();
        $user->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
        ]);

        return redirect('/admin/profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
