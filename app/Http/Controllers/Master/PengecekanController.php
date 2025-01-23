<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kartupengecekan;
use App\Models\KartuPengecekanItm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PengecekanController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'tanggal' => 'required|date',
                'security' => 'required|string|max:255',
                'checker' => 'nullable|string|max:255',
                'nopol' => 'nullable|string|max:255',
                'driver1' => 'nullable|string|max:255',
                'driver2' => 'nullable|string|max:255',
                'forklift1' => 'nullable|string|max:255',
                'forklift2' => 'nullable|string|max:255',
                'jammuat' => 'nullable|date_format:H:i',
                'jamselesai' => 'nullable|date_format:H:i',
                'personel1' => 'nullable|string|max:255',
                'personel2' => 'nullable|string|max:255',
                'personel3' => 'nullable|string|max:255',
                'personel4' => 'nullable|string|max:255',
                'items' => 'required|array'
            ]);

            $user = Auth::user();

            $today = now();
            $prefix = 'BR';
            $datePart = $today->format('dmY');
            $lastKartuPengecekan = KartuPengecekan::where('idmuat', 'like', $prefix . $datePart . '%')
                ->orderBy('idmuat', 'desc')
                ->first();
            $nextNumber = 1;

            if ($lastKartuPengecekan) {
                $lastNumber = (int)substr($lastKartuPengecekan->idmuat, -4);
                $nextNumber = $lastNumber + 1;
            }

            $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            $idmuat = $prefix . $datePart . $formattedNumber;

            $totbale = 0;
            foreach ($validated['items'] as $item) {
                $totbale += (float) $item['bale'];
            }

            $kartuPengecekan = KartuPengecekan::create([
                'idmuat' => $idmuat,
                'tanggal' => $validated['tanggal'],
                'security' => $validated['security'],
                'checker' => $validated['checker'],
                'nopol' => $validated['nopol'],
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
                'totbale' => $totbale,
            ]);

            foreach ($validated['items'] as $item) {
                $kartuPengecekan->items()->create([
                    'tujuan' => $item['tujuan'],
                    'nama' => $item['nama'],
                    'lot' => $item['lot'],
                    'jenis' => $item['jenis'],
                    'val_jenis' => $item['val_jenis'],
                    'cones' => $item['cones'],
                    'bale' => $item['bale'],
                    'dibuat' => $user->name
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Data berhasil disimpan', 'idmuat' => $idmuat], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Terjadi kesalahan', 'message' => $e->getMessage()], 500);
        }
    }

    public function getLatestId()
    {
        $latestRecord = DB::table('kartupengecekan')
            ->whereNotNull('idmuat')
            ->orderByDesc('idmuat')
            ->first();

        if (!$latestRecord) {
            return response()->json(['latestId' => $this->generateNewId()]);
        }

        $newId = $this->generateNextId($latestRecord->idmuat);

        return response()->json(['latestId' => $newId]);
    }

    private function generateNewId()
    {
        $datePart = Carbon::now()->format('ymd');
        return 'BR' . $datePart . '0001';
    }

    private function generateNextId($latestId)
    {
        $datePart = substr($latestId, 2, 6);
        $numberPart = substr($latestId, 8);

        $newNumber = str_pad((int)$numberPart + 1, 4, '0', STR_PAD_LEFT);

        return 'BR' . $datePart . $newNumber;
    }
}
