<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datas.halaman');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after_or_equal:dateFrom',
            'groupBy' => 'required|in:total,tahun,bulan,hari',
            'orderBy' => 'required|in:asc,desc',
        ]);

        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $groupBy = $request->input('groupBy');
        $orderBy = $request->input('orderBy');

        $data = [];

        switch ($groupBy) {
            case 'tahun':
                $data = $this->getDataGroupedByYear($dateFrom, $dateTo, $orderBy);
                break;
            case 'bulan':
                $data = $this->getDataGroupedByMonth($dateFrom, $dateTo, $orderBy);
                break;
            case 'hari':
                $data = $this->getDataGroupedByDay($dateFrom, $dateTo, $orderBy);
                break;
            case 'total':
            default:
                $data = $this->getDataTotal($dateFrom, $dateTo);
                break;
        }

        return view('datas.halaman', compact('data', 'dateFrom', 'dateTo', 'groupBy', 'orderBy'));
    }

    /**
     * Retrieve data grouped by year.
     */
    private function getDataGroupedByYear($dateFrom, $dateTo, $orderBy)
    {
        return data::selectRaw('YEAR(tanggal) as periode, SUM(jumlah_pengunjung_dewasa) as total_dewasa, SUM(jumlah_pengunjung_anak) as total_anak')
            ->whereBetween('tanggal', [$dateFrom, $dateTo])
            ->groupBy(DB::raw('YEAR(tanggal)'))
            ->orderBy(DB::raw('YEAR(tanggal)'), $orderBy)
            ->get();
    }

    /**
     * Retrieve data grouped by month.
     */
    private function getDataGroupedByMonth($dateFrom, $dateTo, $orderBy)
    {
        return data::selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as periode, SUM(jumlah_pengunjung_dewasa) as total_dewasa, SUM(jumlah_pengunjung_anak) as total_anak')
            ->whereBetween('tanggal', [$dateFrom, $dateTo])
            ->groupBy(DB::raw('DATE_FORMAT(tanggal, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(tanggal, "%Y-%m")'), $orderBy)
            ->get();
    }

    /**
     * Retrieve data grouped by day.
     */
    private function getDataGroupedByDay($dateFrom, $dateTo, $orderBy)
    {
        return data::selectRaw('tanggal as periode, SUM(jumlah_pengunjung_dewasa) as total_dewasa, SUM(jumlah_pengunjung_anak) as total_anak')
            ->whereBetween('tanggal', [$dateFrom, $dateTo])
            ->groupBy('tanggal')
            ->orderBy('tanggal', $orderBy)
            ->get();
    }

    /**
     * Retrieve total data.
     */
    private function getDataTotal($dateFrom, $dateTo)
    {
        return data::selectRaw('"Total" as periode, SUM(jumlah_pengunjung_dewasa) as total_dewasa, SUM(jumlah_pengunjung_anak) as total_anak')
            ->whereBetween('tanggal', [$dateFrom, $dateTo])
            ->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(data $data)
    {
        //
    }


   
}
