<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JurusanController extends Controller
{
    public function index(): Response
    {
        return response()->view('jurusan.index', ['jurusans' => Jurusan::all()]);
    }
    public function create(): Response
    {
        return response()->view('jurusan.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'nama_jurusan' => 'required',
            'nama_dekan' => 'required',
            'jumlah_mahasiswa' => 'required|min:10|integer',
        ]);
        Jurusan::create($validateData);
        return redirect('/')->with('pesan', "Jurusan $request->nama_jurusan berhasil ditambahkan");
    }
    public function show(Jurusan $jurusan): Response
    {
        return response()->view('jurusan.show', compact('jurusan'));
    }
    public function edit(Jurusan $jurusan): Response
    {
        return response()->view('jurusan.edit', compact('jurusan'));
    }
    public function update(Request $request, Jurusan $jurusan): RedirectResponse
    {
        $validateData = $request->validate([
            'nama_jurusan' => 'required',
            'nama_dekan' => 'required',
            'jumlah_mahasiswa' => 'required|min:10|integer',
        ]);
        $jurusan->update($validateData);
        return redirect('/jurusans/' . $jurusan->id)->with('pesan', "Jurusan $jurusan->nama_jurusan berhasil diupdate");
    }
    public function destroy(Jurusan $jurusan): RedirectResponse
    {
        $jurusan->delete();
        return redirect('/')
            ->with('pesan', "Jurusan $jurusan->nama_jurusan berhasil dihapus");
    }
}
