<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\LaporanService;

class Laporan extends BaseController
{
    protected $laporanService;

    public function __construct()
    {
        $this->laporanService = new LaporanService();
        helper('sawit');
    }

    public function index()
    {
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        $data['laporan'] = $this->laporanService->getLaporan($startDate, $endDate);
        $data['start_date'] = $startDate;
        $data['end_date'] = $endDate;

        return view('laporan/index', $data);
    }
}
