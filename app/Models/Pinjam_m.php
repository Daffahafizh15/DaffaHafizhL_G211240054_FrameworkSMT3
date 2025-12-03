<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam_m extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pinjam';

    // Primary key
    protected $primaryKey = 'ID_Pinjam';

    // Nonaktifkan timestamps
    public $timestamps = false;

    // Kolom yang boleh diisi (biar aman)
    protected $fillable = [
        'ID_Anggota',
        'ID_Buku',
        'tgl_pinjam',
        'tgl_kembali'
    ];

    /**
     * Mengambil data peminjaman + JOIN anggota & buku
     */
    public function get_records($criteria = '')
    {
        return self::select(
                'pinjam.*',
                'mst_anggota.nim',
                'mst_anggota.nama',
                'mst_buku.Judul'
            )
            ->join('mst_anggota', 'pinjam.ID_Anggota', '=', 'mst_anggota.ID_Anggota')
            ->join('mst_buku', 'pinjam.ID_Buku', '=', 'mst_buku.ID_Buku')
            ->when($criteria, function ($query, $criteria) {
                return $query->where('pinjam.ID_Pinjam', $criteria);
            })
            ->get();
    }

    /**
     * Insert data baru
     */
    public function insert_record($data)
    {
        return self::insert($data);
    }

    /**
     * DELETE berasarkan ID (INI YANG DIBUTUHKAN)
     */
    public function delete_by_id($id)
    {
        return self::where('ID_Pinjam', $id)->delete();
    }
}
