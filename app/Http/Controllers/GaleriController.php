<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10);
        $galeri = Galeri::latest()->paginate(min($perPage, 50));

        if ($request->wantsJson()) {
            return $galeri;
        }

        return view('admin.galeriadmin', ['galeri' => $galeri]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'judul_galeri' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/galeri'), $filename);

        Galeri::create([
            'judul_galeri' => $validated['judul_galeri'],
            'foto' => '/uploads/galeri/' . $filename,
            'deskripsi' => $validated['deskripsi'],
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Galeri berhasil ditambahkan.']);
        }

        return redirect('/admin/galeriadmin')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function ubah(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'judul_galeri' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        $data = [
            'judul_galeri' => $validated['judul_galeri'],
            'deskripsi' => $validated['deskripsi'],
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $filename);
            $data['foto'] = '/uploads/galeri/' . $filename;
        }

        $galeri->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Galeri berhasil diubah.']);
        }

        return redirect('/admin/galeriadmin')->with('success', 'Galeri berhasil diubah.');
    }

    public function hapus(Request $request, $id)
    {
        Galeri::findOrFail($id)->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Galeri berhasil dihapus.']);
        }

        return redirect('/admin/galeriadmin')->with('success', 'Galeri berhasil dihapus.');
    }
}
