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
        barang::create($request->except(['_token', 'submit']));
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
