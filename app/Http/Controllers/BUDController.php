<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BUDController extends Controller
{
    public function index()
    {
        // Order::truncate();

        // DB::statement("
        //     LOAD DATA INFILE 'C:/My Work/telkom_data.csv'
        //     INTO TABLE orders
        //     FIELDS TERMINATED BY ';'
        //     ENCLOSED BY '\"'
        //     ESCAPED BY ''
        //     LINES TERMINATED BY '\n'
        //     IGNORE 1 LINES
        //     (nomor_order,tanggal_order,nama_pelanggan,nama_lokasi,alamat_instalasi,region,witel,sto,bud,segment,nama_layanan,tipe_order,no_telp,no_inet,ncx_status,update_date,tgl_billcomp,usia_billcomp,kel_usia_billcomp,tanggal_billcomp,bulan_billcomp,tahun_billcomp,status)
        // ");

        $data = DB::table('orders')
            ->select(
                'bud',
                DB::raw("COUNT(CASE WHEN status LIKE 'RTP%' THEN 1 END) AS rtp"),
                DB::raw("COUNT(CASE WHEN status LIKE 'PROVISION%' THEN 1 END) AS provision"),
                DB::raw("COUNT(CASE WHEN status LIKE 'PS%' THEN 1 END) AS ps"),
                DB::raw("COUNT(CASE WHEN status LIKE 'CANCEL%' THEN 1 END) AS cancel"),
                DB::raw("COUNT(CASE WHEN status LIKE 'UNMAPPING%' THEN 1 END) AS unmapping")
            )
            ->groupBy('bud')
            ->orderBy('bud')
            ->get();


        return view('pages.bud.index', compact(['data']));
    }
}
