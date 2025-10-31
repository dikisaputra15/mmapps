<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActorController extends Controller
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
            ->where('wp_postmeta.meta_key', '_content_field_152')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 32){
                    $viol = 'Business Entity';
                }elseif($violence->meta_value == 27){
                    $viol = 'Foreign Government (A)';
                }elseif($violence->meta_value == 6){
                    $viol = 'Terrorist Group';
                }elseif($violence->meta_value == 3){
                    $viol = 'Central Government (A)';
                }elseif($violence->meta_value == 4){
                    $viol = 'Government Security Agency';
                }elseif($violence->meta_value == 9){
                    $viol = 'Vested Interest/Stakeholder Group';
                }elseif($violence->meta_value == 7){
                    $viol = 'Civilian';
                }elseif($violence->meta_value == 1){
                    $viol = 'Local Government (A)';
                }elseif($violence->meta_value == 20){
                    $viol = 'Unknown/Unclaimed Responsibility';
                }elseif($violence->meta_value == 31){
                    $viol = 'Community Group';
                }elseif($violence->meta_value == 2){
                    $viol = 'Provincial Government (A)';
                }elseif($violence->meta_value == 19){
                    $viol = 'Other';
                }elseif($violence->meta_value == 8){
                    $viol = 'Crime Group';
                }elseif($violence->meta_value == 5){
                    $viol = 'Separatist Group';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'actor' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
