<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{
    public function getDaftar()
    {
        $data = DB::table('daftar')->get();
        return response()->json($data);
    }

    public function getNoPol()
    {
        $data = DB::table('no_pol')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validate->errors()
            ], 400);
        }

        $data = DB::table('daftar')->insert([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'created_at' => now(),
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditambahkan',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validate->errors()
            ], 400);
        }

        $data = DB::table('daftar')->where('id', $id)->first();

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $updated = DB::table('daftar')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'updated_at' => now(),
            ]);

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data.'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $data = DB::table('daftar')->where('id', $id)->first();

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $deleted = DB::table('daftar')->where('id', $id)->delete();

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
    }

    public function storePlat(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'plat_no' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors()
            ], 400);
        }

        $data = DB::table('no_pol')->insert([
            'plat_no' => $request->plat_no,
            'created_at' => now(),
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil di tambahkan',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }
    }

    public function updatePlat(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'plat_no' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 400);
        }

        $data = DB::table('no_pol')->where('id', $id)->first();
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $updated = DB::table('no_pol')
            ->where('id', $id)
            ->update([
                'plat_no' => $request->plat_no,
                'updated_at' => now()
            ]);

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil di update'
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengupdate data'
            ], 500);
        }
    }

    public function destroyPlat($id)
    {
        $data = DB::table('no_pol')->where('id', $id)->first();

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak di temukan'
            ], 404);
        }

        $deleted = DB::table('no_pol')->where('id', $id)->delete();

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil di hapus'
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menghapus data'
            ], 500);
        }
    }
}
