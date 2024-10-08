<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kartupengecekan;
use App\Models\KartuPengecekanItm;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getLaporan()
    {
        // Ambil data pengecekan dengan relasi item
        $pengecekan = Kartupengecekan::with('items')->get();

        // Siapkan array untuk menyimpan hasil
        $result = [];

        foreach ($pengecekan as $item) {
            $result[] = [
                'id' => $item->id,
                'tanggal' => $item->tanggal,
                'nopol' => $item->nopol,
                'security' => $item->security,
                'driver1' => $item->driver1,
                'driver2' => $item->driver2,
                'forklift1' => $item->forklift1,
                'forklift2' => $item->forklift2,
                'jammuat' => $item->jammuat,
                'jamselesai' => $item->jamselesai,
                'personel1' => $item->personel1,
                'personel2' => $item->personel2,
                'personel3' => $item->personel3,
                'personel4' => $item->personel4,
                'totbale' => $item->totbale,
                'items' => $item->items, // Mengambil item terkait
            ];
        }

        // Mengembalikan data sebagai JSON
        return response()->json($result);
    }
}
