<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $posts = Post::when($cari, function ($query) use ($cari) {
            $query->where('judul', 'like', '%' . $cari . '%')
                  ->orWhere('penulis', 'like', '%' . $cari . '%');
        })->latest()->paginate(5)->withQueryString();

        return view('posts.index', compact('posts', 'cari'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5|max:255',
            'penulis' => 'required|max:100',
            'kategori' => 'required',
            'isi' => 'required|min:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'judul.min' => 'Judul minimal 5 karakter',
            'penulis.required' => 'Nama penulis wajib diisi',
            'kategori.required' => 'Pilih kategori dulu',
            'isi.required' => 'Isi artikel tidak boleh kosong',
            'isi.min' => 'Isi artikel minimal 20 karakter',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        try {
            $data = $request->only(['judul', 'penulis', 'kategori', 'isi']);

            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('posts', 'public');
            }

            Post::create($data);

            return redirect()->route('posts.index')->with('sukses', 'Artikel berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', 'Artikel gagal disimpan, coba lagi.');
        }
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required|min:5|max:255',
            'penulis' => 'required|max:100',
            'kategori' => 'required',
            'isi' => 'required|min:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'judul.min' => 'Judul minimal 5 karakter',
            'penulis.required' => 'Nama penulis wajib diisi',
            'kategori.required' => 'Pilih kategori dulu',
            'isi.required' => 'Isi artikel tidak boleh kosong',
            'isi.min' => 'Isi artikel minimal 20 karakter',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        try {
            $data = $request->only(['judul', 'penulis', 'kategori', 'isi']);

            // kalau upload gambar baru, gambar lama dihapus
            if ($request->hasFile('gambar')) {
                if ($post->gambar) {
                    Storage::disk('public')->delete($post->gambar);
                }
                $data['gambar'] = $request->file('gambar')->store('posts', 'public');
            }

            $post->update($data);

            return redirect()->route('posts.show', $post)->with('sukses', 'Artikel berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', 'Artikel gagal diupdate.');
        }
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete(); // soft delete, masuk ke sampah
            return redirect()->route('posts.index')->with('sukses', 'Artikel dipindah ke sampah.');
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('gagal', 'Artikel gagal dihapus.');
        }
    }

    // ===== bonus soft delete =====

    public function sampah()
    {
        $posts = Post::onlyTrashed()->latest('deleted_at')->paginate(5);
        return view('posts.sampah', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('posts.sampah')->with('sukses', 'Artikel berhasil dikembalikan.');
    }

    public function hapusPermanen($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        if ($post->gambar) {
            Storage::disk('public')->delete($post->gambar);
        }
        $post->forceDelete();

        return redirect()->route('posts.sampah')->with('sukses', 'Artikel dihapus permanen.');
    }
}
