<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kartupengecekan;
use App\Models\KartuPengecekanItm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengecekanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idmuat' => 'required|string',
            'tanggal' => 'required|date',
            'nopol' => 'required|string',
            'security' => 'required|string',
            'checker' => 'required|string',
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
            'items' => 'required|array',
        ]);

        try {
            $kartuPengecekan = Kartupengecekan::create([
                'idmuat' => $validated['idmuat'],
                'tanggal' => $validated['tanggal'],
                'nopol' => $validated['nopol'],
                'security' => $validated['security'],
                'checker' => $validated['checker'],
                'driver1' => $validated['driver1'],
                'driver2' => $validated['driver2'],
                'forklift1' => $validated['forklift1'],
                'forklift2' => $validated['forklift2'],
                'jammuat' => $validated['jammuat'],
                'jamselesai' => $validated['jamselesai'],
                'personel1' => $validated['personel1'],
                'personel2' => $validated['personel2'],
                'personel3' => $validated['personel3'],
                'personel4' => $validated['personel4'],
                'totbale' => 0,
            ]);

            $totalBale = 0;
            foreach ($validated['items'] as $item) {
                $kartuItem = KartuPengecekanItm::create([
                    'id_muat' => $validated['idmuat'],
                    'tujuan' => $item['tujuan'],
                    'nama' => $item['namaBarang'],
                    'lot' => $item['lot'],
                    'jenis' => $item['jenis'],
                    'val_jenis' => $item['val_jenis'],
                    'bale' => $item['bale'],
                    'cones' => $item['cones'],
                ]);

                if ($item['jenis'] === 'bale') {
                    $totalBale += $item['bale'] ?? 1;
                }
            }

            $kartuPengecekan->update(['totbale' => $totalBale]);

            return response()->json(['message' => 'Data saved successfully'], 201);
        } catch (\Exception $e) {
            Log::error('Error saving data: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'request_headers' => $request->headers->all(),
            ]);
            return response()->json(['error' => 'An error occurred while saving data'], 500);
        }
    }
}
