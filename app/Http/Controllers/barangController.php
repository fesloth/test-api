<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class barangController extends Controller
{
    public function index()
    {
        $datas = DB::table('tbl_barang')->get();
        return view('layout/app')->with('datas', $datas);
    }
    public function apiIndex()
    {
        $datas = DB::table('tbl_barang')->get();
        return response()->json($datas);
    }
    public function apiStore(Request $request)
    {
        // Validate the incoming JSON data
        $validatedData = $request->validate([
            'namaBarang' => 'required|string|max:255',
            'deskripsiBarang' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        // Create a new record using the validated data
        $newData = barang::create([
            'namaBarang' => $validatedData['namaBarang'],
            'deskripsiBarang' => $validatedData['deskripsiBarang'],
            'harga' => $validatedData['harga'],
        ]);

        // Return a JSON response with the newly created data and a 201 status code
        return response()->json(['message' => 'Data barang berhasil ditambahkan', 'data' => $newData], 201);
    }
    public function apiUpdate(Request $request, $idBarang)
    {
        // Temukan data barang berdasarkan ID
        $barang = barang::find($idBarang);

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
    public function apiDelete($idBarang)
    {
        // Temukan data barang berdasarkan ID
        $barang = barang::find($idBarang);

        // Jika data barang tidak ditemukan, kembalikan respons dengan status 404
        if (!$barang) {
            return response()->json(['message' => 'Data barang tidak ditemukan'], 404);
        }

        // Hapus data barang
        $barang->delete();

        // Kembalikan respons dengan pesan sukses
        return response()->json(['message' => 'Data barang berhasil dihapus']);
    }
    public function login()
    {
        return view('layout/login');
    }
    public function tambah()
    {
        return view('layout/tambah');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaBarang' => 'required|string|max:255',
            'deskripsiBarang' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        // Membuat data barang baru
        barang::create([
            'namaBarang' => $validatedData['namaBarang'],
            'deskripsiBarang' => $validatedData['deskripsiBarang'],
            'harga' => $validatedData['harga'],
        ]);

        // Kembalikan respons dengan pesan sukses (teks biasa atau respons JSON, sesuai kebutuhan Anda)
        return redirect('/barang')->with('success', 'Data barang berhasil ditambahkan');
    }
    public function edit($idBarang)
    {
        $data = DB::table('tbl_barang')->where('idBarang', $idBarang)->first();
        return view('layout/edit', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaBarang' => 'required|string|max:255',
            'deskripsiBarang' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        DB::table('tbl_barang')
            ->where('idBarang', $id)
            ->update([
                'namaBarang' => $validatedData['namaBarang'],
                'deskripsiBarang' => $validatedData['deskripsiBarang'],
                'harga' => $validatedData['harga'],
            ]);

        return redirect()->back()->with('success', 'Data barang berhasil diperbarui.');
    }
    public function delete($idBarang)
    {
        $barang = DB::table('tbl_barang')->where('idBarang', $idBarang)->first();

        if (!$barang) {
            return redirect()->route('barang')->with('error', 'Data tidak ditemukan.');
        }

        DB::table('tbl_barang')->where('idBarang', $idBarang)->delete();

        return redirect()->route('barang')->with('success', 'Data berhasil dihapus.');
    }
}
