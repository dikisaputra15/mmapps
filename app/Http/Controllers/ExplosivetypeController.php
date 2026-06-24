<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExplosivetypeController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $violences = DB::table('hk673_postmeta')
            ->join('hk673_posts', 'hk673_posts.ID', '=', 'hk673_postmeta.post_id')
            ->join('hk673_w2gm_locations_relationships', 'hk673_w2gm_locations_relationships.post_id', '=', 'hk673_postmeta.post_id')
            ->select('hk673_postmeta.post_id', 'hk673_postmeta.meta_value', 'hk673_posts.post_date', 'hk673_w2gm_locations_relationships.id')
            ->whereDate(DB::raw('DATE(hk673_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(hk673_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where('hk673_postmeta.meta_key', '_content_field_97')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 1){
                    $viol = 'Air Strike';
                }elseif($violence->meta_value == 3){
                    $viol = 'Artillery';
                }elseif($violence->meta_value == 5){
                    $viol = 'Car Bomb/VBIED';
                }elseif($violence->meta_value == 6){
                    $viol = 'Commercial Explosives';
                }elseif($violence->meta_value == 2){
                    $viol = 'Drone Strike';
                }elseif($violence->meta_value == 7){
                    $viol = 'Firebomb';
                }elseif($violence->meta_value == 8){
                    $viol = 'Fish Bomb';
                }elseif($violence->meta_value == 9){
                    $viol = 'Grenade Launchers';
                }elseif($violence->meta_value == 10){
                    $viol = 'Grenades';
                }elseif($violence->meta_value == 11){
                    $viol = 'Homemade Explosives';
                }elseif($violence->meta_value == 4){
                    $viol = 'Improvised Explosive Devices (IEDs)';
                }elseif($violence->meta_value == 12){
                    $viol = 'Landmine';
                }elseif($violence->meta_value == 13){
                    $viol = 'MANPAD';
                }elseif($violence->meta_value == 14){
                    $viol = 'Military-grade Explosives';
                }elseif($violence->meta_value == 15){
                    $viol = 'Naval Bombardment';
                }elseif($violence->meta_value == 16){
                    $viol = 'Paraglider/Gyrocopter strike';
                }elseif($violence->meta_value == 17){
                    $viol = 'Unconfirmed/Unclear';
                }else{
                    $viol = NULL;
                }
                DB::table('mmstatistiks')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'sub_weapon' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
