<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SegmentController extends Controller
{
    public function index($bud)
    {
        $data = DB::table('orders')
            ->select(
                'segment',
                'bud',
                DB::raw("COUNT(CASE WHEN status LIKE 'RTP%' THEN 1 END) AS rtp"),
                DB::raw("COUNT(CASE WHEN status LIKE 'PROVISION%' THEN 1 END) AS provision"),
                DB::raw("COUNT(CASE WHEN status LIKE 'PS%' THEN 1 END) AS ps"),
                DB::raw("COUNT(CASE WHEN status LIKE 'CANCEL%' THEN 1 END) AS cancel"),
                DB::raw("COUNT(CASE WHEN status LIKE 'UNMAPPING%' THEN 1 END) AS unmapping")
            )
            ->where('bud', $bud)
            ->groupBy('segment', 'bud')
            ->orderBy('segment')
            ->get();

        return view('pages.segment.index', compact(['data', 'bud']));
    }
}
