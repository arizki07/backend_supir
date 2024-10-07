<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kartupengecekan;
use App\Models\KartuPengecekanItm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PengecekanController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validasi untuk tabel kartupengecekan
            'idmuat' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'nopol' => 'nullable|string',
            'security' => 'nullable|string',
            'checker' => 'nullable|string',
            'driver1' => 'nullable|string',
            'driver2' => 'nullable|string',
            'forklift1' => 'nullable|string',
            'forklift2' => 'nullable|string',
            'jammuat' => 'nullable|string',
            'jamselesai' => 'nullable|string',
            'personel1' => 'nullable|string',
            'personel2' => 'nullable|string',
            'personel3' => 'nullable|string',
            'personel4' => 'nullable|string',
            'totbale' => 'nullable|numeric',

            // Validasi untuk kartupengecekanitm
            'items.*.tujuan' => 'nullable|string',
            'items.*.nama' => 'nullable|string',
            'items.*.lot' => 'nullable|string',
            'items.*.jenis' => 'nullable|string',
            'items.*.val_jenis' => 'nullable|numeric',
            'items.*.bale' => 'nullable|numeric',
            'items.*.cones' => 'nullable|numeric',
            'items.*.dibuat' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // Simpan data utama (kartupengecekan)
            $pengecekan = KartuPengecekan::create([
                'idmuat' => $validatedData['idmuat'],
                'tanggal' => $validatedData['tanggal'],
                'nopol' => $validatedData['nopol'],
                'security' => $validatedData['security'],
                'checker' => $validatedData['checker'],
                'driver1' => $validatedData['driver1'],
                'driver2' => $validatedData['driver2'],
                'forklift1' => $validatedData['forklift1'],
                'forklift2' => $validatedData['forklift2'],
                'jammuat' => $validatedData['jammuat'],
                'jamselesai' => $validatedData['jamselesai'],
                'personel1' => $validatedData['personel1'],
                'personel2' => $validatedData['personel2'],
                'personel3' => $validatedData['personel3'],
                'personel4' => $validatedData['personel4'],
                'totbale' => $validatedData['totbale'],
            ]);

            // Simpan item pengecekan (kartupengecekanitm)
            foreach ($validatedData['items'] as $itemData) {
                $itemData['pengecekan_id'] = $pengecekan->id;
                KartuPengecekanItm::create($itemData);
            }

            DB::commit();

            return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }

    public function getPengecekan()
    {
        $pengecekan = Kartupengecekan::all();
        return response()->json($pengecekan);
    }
}
