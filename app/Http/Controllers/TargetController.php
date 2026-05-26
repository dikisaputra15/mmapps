<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TargetController extends Controller
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
            ->where('hk673_postmeta.meta_key', '_content_field_124')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 1){
                    $viol = 'Activist Group';
                }elseif($violence->meta_value == 2){
                    $viol = 'Business Entity';
                }elseif($violence->meta_value == 3){
                    $viol = 'Central government (Junta)';
                }elseif($violence->meta_value == 4){
                    $viol = 'Child/Youth/Student';
                }elseif($violence->meta_value == 5){
                    $viol = 'Civilian/Local Resident/Individual';
                }elseif($violence->meta_value == 6){
                    $viol = 'Crime Group';
                }elseif($violence->meta_value == 7){
                    $viol = 'EAOs';
                }elseif($violence->meta_value == 8){
                    $viol = 'Ethnic/Cultural Group';
                }elseif($violence->meta_value == 9){
                    $viol = 'Foreign Government';
                }elseif($violence->meta_value == 10){
                    $viol = 'Foreign National';
                }elseif($violence->meta_value == 11){
                    $viol = 'Government (Military Regime)';
                }elseif($violence->meta_value == 12){
                    $viol = 'Hard-line/Radicalized group';
                }elseif($violence->meta_value == 13){
                    $viol = 'International Activist Group/Organization';
                }elseif($violence->meta_value == 14){
                    $viol = 'Local Community Group';
                }elseif($violence->meta_value == 15){
                    $viol = 'Local Criminal/Gang/Group';
                }elseif($violence->meta_value == 16){
                    $viol = 'Local government';
                }elseif($violence->meta_value == 17){
                    $viol = 'Martial Arts Group';
                }elseif($violence->meta_value == 18){
                    $viol = 'Mass Organization';
                }elseif($violence->meta_value == 19){
                    $viol = 'Motorcycle Gang';
                }elseif($violence->meta_value == 20){
                    $viol = 'NGO';
                }elseif($violence->meta_value == 21){
                    $viol = 'Organized Crime Group';
                }elseif($violence->meta_value == 22){
                    $viol = "People's Defense Force (PDFs)/Militia";
                }elseif($violence->meta_value == 23){
                    $viol = 'Political Party';
                }elseif($violence->meta_value == 24){
                    $viol = 'Political Party Supporter';
                }elseif($violence->meta_value == 25){
                    $viol = 'Political Party Wing Group';
                }elseif($violence->meta_value == 26){
                    $viol = 'Regional government';
                }elseif($violence->meta_value == 27){
                    $viol = 'Religious Group';
                }elseif($violence->meta_value == 28){
                    $viol = 'Separatist Group';
                }elseif($violence->meta_value == 29){
                    $viol = 'Terrorist Group';
                }elseif($violence->meta_value == 30){
                    $viol = 'Union/Labor Group';
                }elseif($violence->meta_value == 31){
                    $viol = 'Vested Interest - Stakeholder';
                }elseif($violence->meta_value == 32){
                    $viol = 'Unconfirmed/Unclear';
                }else{
                    $viol = NULL;
                }
                DB::table('mmstatistiks')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'target' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
