<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\NewsComment;
use App\NewsVisit;
use App\Ppdb\Ppdb;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiBackendController extends Controller
{
    public function pengunjungNews($id)
    {
        $data = [
            'visitor'   => NewsVisit::selectRaw('LEFT(created_at,10) as tanggal,  count(id) as jumlah')->where('news_id', $id)->groupBy('tanggal')->get(),
            'komentar'  => NewsComment::selectRaw('LEFT(created_at,10) as tanggal,  count(id) as jumlah')->where('news_id', $id)->groupBy('tanggal')->get(),
            'perangkat' => NewsVisit::selectRaw('count(id) as jumlah, perangkat')->where('news_id', $id)->groupBy('perangkat')->get(),
        ];

        return $data;
    }

    public function adminDashboard($param1)
    {
        $accept = Ppdb::where('status', 'diterima')->count();
        $reject = Ppdb::selectRaw('LEFT(created_at,7) as tanggal,  count(id) as jumlah')->where('status', 'ditolak')->groupBy('tanggal')->get();
        $all    = Ppdb::count();
        if ($param1 == 'thisyear') {
            $data = [
                'ppdbaccept' => Ppdb::selectRaw('LEFT(created_at,7) as tanggal,  count(id) as jumlah')->where('status', 'diterima')->groupBy('tanggal')->get(),
                'ppdbreject' => $reject,
                'ppdball' => Ppdb::selectRaw('LEFT(created_at,10) as tanggal,  count(id) as jumlah')->groupBy('tanggal')->get(),
                'ppdbyear' => Ppdb::selectRaw('LEFT(created_at,7) as tanggal,  count(id) as jumlah')->groupBy('tanggal')->get(),
                'percentase' => array([
                    'jumlah'    => $accept / $all * 100,
                ]),
            ];
            return $data;
        }
    }
}
