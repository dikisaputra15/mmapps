<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlelinkController extends Controller
{
     public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $regions = DB::table('hk673_postmeta')
            ->join('hk673_posts', 'hk673_posts.ID', '=', 'hk673_postmeta.post_id')
            ->join('hk673_w2gm_locations_relationships', 'hk673_w2gm_locations_relationships.post_id', '=', 'hk673_postmeta.post_id')
            ->select('hk673_postmeta.post_id', 'hk673_postmeta.meta_value', 'hk673_posts.post_date', 'hk673_w2gm_locations_relationships.id')
            ->whereDate(DB::raw('DATE(hk673_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(hk673_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where('hk673_postmeta.meta_key', '_content_field_70')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


          if($regions->isNotEmpty()){
            foreach($regions as $region){

                $html = $region->meta_value;

                if (preg_match('/href="(https:\/\/[^"]+)"/', $html, $matches)) {
                    $link = $matches[1];
                } else {
                    $link = null;
                }

                DB::table('mmstatistiks')
                    ->where('id_listing', $region->id)
                    ->update([
                        'article_link' => $link
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
