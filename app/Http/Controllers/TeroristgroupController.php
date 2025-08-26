<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeroristgroupController extends Controller
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
            ->where('wp_postmeta.meta_key', '_content_field_155')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 11){
                    $viol = 'Al Qaeda Indonesia (AQI)';
                }elseif($violence->meta_value == 20){
                    $viol = 'al Qaeda in the Arabian Peninsula (AQAP)';
                }elseif($violence->meta_value == 3){
                    $viol = 'Jemaah Islamiyah (JI)';
                }elseif($violence->meta_value == 17){
                    $viol = 'Mujahideen in Western Indonesia (MIB)';
                }elseif($violence->meta_value == 12){
                    $viol = 'Angkatan Mujahideen Islam Nusantara (AMIN)';
                }elseif($violence->meta_value == 5){
                    $viol = 'Khilafatul Muslimin';
                }elseif($violence->meta_value == 18){
                    $viol = 'Ring Banten';
                }elseif($violence->meta_value == 13){
                    $viol = 'Darul Islam';
                }elseif($violence->meta_value == 14){
                    $viol = 'Komando Jihad';
                }elseif($violence->meta_value == 19){
                    $viol = 'Team Hisbah';
                }elseif($violence->meta_value == 10){
                    $viol = 'Islamic State of Iraq and Syria (ISIS)';
                }elseif($violence->meta_value == 15){
                    $viol = 'Laskar Jihad';
                }elseif($violence->meta_value == 9){
                    $viol = 'Unknown/Unclaimed responsibility';
                }elseif($violence->meta_value == 1){
                    $viol = 'Jamaah Ansharut Daulah (JAD)';
                }elseif($violence->meta_value == 16){
                    $viol = 'Laskar Jundullah';
                }elseif($violence->meta_value == 8){
                    $viol = 'Other';
                }elseif($violence->meta_value == 2){
                    $viol = 'Jamaah Ansharut Tauhid (JAT)';
                }elseif($violence->meta_value == 4){
                    $viol = 'Mujahedeen in Eastern Indonesia (MIT)';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'actor_type' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
