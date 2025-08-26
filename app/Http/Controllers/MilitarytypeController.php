<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MilitarytypeController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $violences = DB::table('wp_postmeta')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_postmeta.post_id')
            ->join('wp_w2gm_locations_relationships', 'wp_w2gm_locations_relationships.post_id', '=', 'wp_postmeta.post_id')
            ->select('wp_postmeta.post_id', 'wp_postmeta.meta_value', 'wp_posts.post_date', 'wp_w2gm_locations_relationships.id')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(wp_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where('wp_postmeta.meta_key', '_content_field_172')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 3){
                    $viol = 'Air Force';
                }elseif($violence->meta_value == 7){
                    $viol = 'Marines';
                }elseif($violence->meta_value == 6){
                    $viol = 'Navy SF';
                }elseif($violence->meta_value == 4){
                    $viol = 'Air Force SF';
                }elseif($violence->meta_value == 8){
                    $viol = 'Marines SF';
                }elseif($violence->meta_value == 9){
                    $viol = 'Special Operation Command (Koopsus)';
                }elseif($violence->meta_value == 1){
                    $viol = 'Army';
                }elseif($violence->meta_value == 5){
                    $viol = 'Navy';
                }elseif($violence->meta_value == 10){
                    $viol = 'Other';
                }elseif($violence->meta_value == 2){
                    $viol = 'Army SF';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'sub_actor_type' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
