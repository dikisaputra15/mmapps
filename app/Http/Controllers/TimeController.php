<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimeController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $tanggals = DB::table('wp_postmeta as end_date')
                    ->join('wp_posts', 'wp_posts.ID', '=', 'end_date.post_id')
                    ->join('wp_w2gm_locations_relationships', 'wp_w2gm_locations_relationships.post_id', '=', 'end_date.post_id')
                    ->leftJoin('wp_postmeta as hour', function ($join) {
                        $join->on('hour.post_id', '=', 'end_date.post_id')
                            ->where('hour.meta_key', '_content_field_89_hour');
                    })
                    ->leftJoin('wp_postmeta as minute', function ($join) {
                        $join->on('minute.post_id', '=', 'end_date.post_id')
                            ->where('minute.meta_key', '_content_field_89_minute');
                    })
                    ->select(
                        'end_date.post_id',
                        'end_date.meta_value as date_end',
                        'wp_posts.post_date',
                        'wp_w2gm_locations_relationships.id',
                        DB::raw("CONCAT(LPAD(hour.meta_value, 2, '0'), ':', LPAD(minute.meta_value, 2, '0')) as jam_menit")
                    )
                    ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
                    // ->whereBetween(DB::raw('DATE(wp_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
                    ->where('end_date.meta_key', '_content_field_89_date_end')
                    ->get();

        if ($tanggals->isNotEmpty()) {
                foreach ($tanggals as $tanggal) {
                    // langsung ambil hasil join CONCAT jam:menit
                    $jam_menit = $tanggal->jam_menit; // contoh: "08:30"

                    DB::table('indostatistiknews')
                        ->where('id_listing', $tanggal->id)
                        ->update([
                            'time_incident' => $jam_menit // pastikan kolom ini ada di tabel
                        ]);
                }

                echo "sukses";
            }


    }
}
