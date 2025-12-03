<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_m;

class AnggotaController extends Controller
{
    var $data;

    public function __construct()
    {
        // Pilihan program studi
        $this->data['optprogdi'] = [
            '' => '- Pilih salah satu -',
            'TI' => 'Teknik Informatika',
            'SI' => 'Sistem Informasi',
            'IK' => 'Ilmu Komunikasi'
        ];
    }

    // Menampilkan daftar anggota
    public function index()
    {
        $data = [
            'query' => Anggota_m::Paginate(5),
            'optprogdi' => $this->data['optprogdi']
        ];
        return view('anggota.list', $data);
    }

    // Menampilkan form tambah anggota
    public function add()
    {
        $data = [
            'is_update' => 0,
            'optprogdi' => $this->data['optprogdi']
        ];
        return view('anggota.add', $data);
    }

    // Simpan atau update data anggota
    public function save(Request $request, Anggota_m $anggota)
    {
        // Validasi dengan nama field HURUF BESAR (sesuai form)
        $validated = $request->validate([
            'NIM' => 'required|max:20',
            'Nama' => 'required|max:100',
            'Progdi' => 'required',
        ]);

        // Ambil data dengan nama field HURUF BESAR
        $data['NIM']   = $request->input('NIM');
        $data['Nama']  = $request->input('Nama');
        $data['Progdi'] = $request->input('Progdi');
        $is_update     = $request->input('is_update');

        if ($is_update == 0) {
            // Tambah baru
            if ($anggota->insert_record($data)) {
                return redirect('anggota')->with('success', 'Data anggota berhasil ditambahkan');
            }
        } else {
            // Update data lama
            $id = $request->input('id');
            if ($anggota->update_by_id($data, $id)) {
                return redirect('anggota')->with('success', 'Data anggota berhasil diperbarui');
            }
        }
        
        return redirect()->back()->with('error', 'Gagal menyimpan data');
    }

    // Menampilkan form edit data anggota
    public function edit($id, Anggota_m $anggota)
    {
        $data = [
            'query' => $anggota->get_records($id)->first(),
            'is_update' => 1,
            'optprogdi' => $this->data['optprogdi']
        ];
        return view('anggota.edit', $data);
    }

    // Hapus data anggota
    public function delete($id, Anggota_m $anggota)
    {
        if ($anggota->delete_by_id($id)) {
            return redirect('anggota')->with('success', 'Data anggota berhasil dihapus');
        }
        
        return redirect()->back()->with('error', 'Gagal menghapus data');
    }
}