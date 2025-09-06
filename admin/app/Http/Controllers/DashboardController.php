<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangTua;
use App\Models\Instansi;
use App\Models\TamuUmum;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total per kategori
        $totalOrangtua = OrangTua::count();
        $totalInstansi = Instansi::count();
        $totalUmum = TamuUmum::count();

        $totalTamu = $totalOrangtua + $totalInstansi + $totalUmum;
        $totalKunjungan = $totalTamu; // Bisa disesuaikan jika ada logika berbeda

        // --- Hitung jumlah per bulan untuk grafik ---
        $dataPerBulan = [];
        $labelsPerBulan = [];

        // Ambil 6 bulan terakhir
        for ($i = 5; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subMonths($i);
            $bulan = $tanggal->format('M Y');
            $labelsPerBulan[] = $tanggal->format('M');

            $countOrtu = OrangTua::whereMonth('tanggal', $tanggal->month)
                ->whereYear('tanggal', $tanggal->year)
                ->count();

            $countInstansi = Instansi::whereMonth('tanggal_kunjungan', $tanggal->month)
                ->whereYear('tanggal_kunjungan', $tanggal->year)
                ->count();

            $countUmum = TamuUmum::whereMonth('tanggal_kunjungan', $tanggal->month)
                ->whereYear('tanggal_kunjungan', $tanggal->year)
                ->count();

            $dataPerBulan[] = $countOrtu + $countInstansi + $countUmum;
        }

        // --- Data untuk pie chart distribusi tipe tamu ---
        $chartData = [
            'labels' => ['Orang Tua', 'Instansi', 'Umum'],
            'data' => [$totalOrangtua, $totalInstansi, $totalUmum],
            'colors' => ['#10b981', '#3b82f6', '#f59e0b']
        ];

        // --- Daftar tamu terbaru ---
        $latestOrangTua = OrangTua::select([
            'nama_orangtua as nama',
            'tanggal',
            'keperluan',
            \DB::raw("'Orang Tua' as tipe")
        ]);

        $latestInstansi = Instansi::select([
            'nama',
            'tanggal_kunjungan as tanggal',
            'keperluan',
            \DB::raw("'Instansi' as tipe")
        ]);

        $latestUmum = TamuUmum::select([
            'nama',
            'tanggal_kunjungan as tanggal',
            'keperluan',
            \DB::raw("'Umum' as tipe")
        ]);

        $latestGuests = $latestOrangTua
            ->unionAll($latestInstansi)
            ->unionAll($latestUmum);

        $latestGuests = \DB::table(\DB::raw("({$latestGuests->toSql()}) as combined"))
            ->mergeBindings($latestOrangTua->getQuery())
            ->orderBy('tanggal', 'desc')
            ->limit(8)
            ->get();

        return view('dashboard', compact(
            'totalTamu',
            'totalKunjungan',
            'totalOrangtua',
            'totalInstansi',
            'totalUmum',
            'latestGuests',
            'dataPerBulan',
            'labelsPerBulan',
            'chartData'
        ));
    }
}