<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10);
        $berita = Berita::latest()->paginate(min($perPage, 50));

        if ($request->wantsJson()) {
            return $berita;
        }

        return view('admin.beritaadmin', ['berita' => $berita]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'judul_berita' => 'required|max:255',
            'deskripsi' => 'required',
            'penulis' => 'nullable|max:255',
            'tanggal' => 'required|date',
            'jenis_berita' => 'required|in:pengumuman-akademik,beasiswa-karir,events,prestasi,aktivitas,lainnya',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $filename);
            $data['foto'] = '/uploads/berita/' . $filename;
        }

        Berita::create($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Berita berhasil ditambahkan.']);
        }

        return redirect('/admin/beritaadmin')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function ubah(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $validated = $request->validate([
            'judul_berita' => 'required|max:255',
            'deskripsi' => 'required',
            'penulis' => 'nullable|max:255',
            'tanggal' => 'required|date',
            'jenis_berita' => 'required|in:pengumuman-akademik,beasiswa-karir,events,prestasi,aktivitas,lainnya',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $filename);
            $data['foto'] = '/uploads/berita/' . $filename;
        }

        $berita->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Berita berhasil diubah.']);
        }

        return redirect('/admin/beritaadmin')->with('success', 'Berita berhasil diubah.');
    }

    public function hapus(Request $request, $id)
    {
        Berita::findOrFail($id)->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Berita berhasil dihapus.']);
        }

        return redirect('/admin/beritaadmin')->with('success', 'Berita berhasil dihapus.');
    }
}
