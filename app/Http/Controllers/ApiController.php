<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index()
    {
        $datas = DB::table('tbl_barang')->get();
        return response()->json($datas);
    }
    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required|string|max:255',
            'deskripsiBarang' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ]);

        // Create a new record using the validated data
        $newData = barang::create([
            'namaBarang' => $request->namaBarang,
            'deskripsiBarang' => $request->deskripsiBarang,
            'harga' => $request->harga,
        ]);

        return response()->json(['message' => 'Data barang berhasil ditambahkan', 'data' => $newData]);
    }
    public function update(Request $request, barang $barang)
    {

        // Validasi data JSON yang masuk
        $validasi = $request->validate([
            'namaBarang' => 'required|string|max:255',
            'deskripsiBarang' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        // Perbarui data barang sesuai dengan data yang validasi
        $barang->namaBarang = $validasi['namaBarang'];
        $barang->deskripsiBarang = $validasi['deskripsiBarang'];
        $barang->harga = $validasi['harga'];
        $barang->save();

        // Kembalikan respons dengan pesan sukses
        return response()->json(['message' => 'Data barang berhasil diperbarui', 'data' => $barang]);
    }
    public function destroy(barang $barang)
    {
        // Jika data barang tidak ditemukan, kembalikan respons dengan status 404
        if (!$barang) {
            return response()->json(['message' => 'Data barang tidak ditemukan'], 404);
        }

        // Hapus data barang
        $barang->delete();

        // Kembalikan respons dengan pesan sukses
        return response()->json(['message' => 'Data barang berhasil dihapus']);
    }
}
