<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TargeteaosController extends Controller
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
            ->where('hk673_postmeta.meta_key', '_content_field_126')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 1){
                    $viol = 'All-Burma Students Democratic Front (ABSDF)';
                }elseif($violence->meta_value == 2){
                    $viol = 'Arakan Army (AA)';
                }elseif($violence->meta_value == 3){
                    $viol = 'Arakan Liberation Army (ALA)';
                }elseif($violence->meta_value == 4){
                    $viol = 'Arakan Rohingya Salvation Army (ARSA)';
                }elseif($violence->meta_value == 5){
                    $viol = 'Bamar People’s Liberation Army (BPLA)';
                }elseif($violence->meta_value == 6){
                    $viol = 'Chin National Army (CNA)';
                }elseif($violence->meta_value == 7){
                    $viol = 'Danu People Liberation Front (DPLF)';
                }elseif($violence->meta_value == 8){
                    $viol = 'Democratic Karen Buddhist Army (DKBA)';
                }elseif($violence->meta_value == 9){
                    $viol = 'Democratic Karen Buddhist Army-5 (DKBA-5)';
                }elseif($violence->meta_value == 10){
                    $viol = 'Kachin Independence Army (KIA)';
                }elseif($violence->meta_value == 11){
                    $viol = 'Karen National Army (KNA)/Karen Border Guard Force (Karen BGF)';
                }elseif($violence->meta_value == 12){
                    $viol = 'Karen National Defense Organization (KNDO)';
                }elseif($violence->meta_value == 13){
                    $viol = 'Karen National Liberation Army (KNLA)';
                }elseif($violence->meta_value == 14){
                    $viol = 'Karenni Army (KA)';
                }elseif($violence->meta_value == 15){
                    $viol = "Karenni National People's Liberation Front (KNPLF)";
                }elseif($violence->meta_value == 16){
                    $viol = 'Karenni National Solidarity Organization (KNSO)';
                }elseif($violence->meta_value == 17){
                    $viol = 'Kawthoolei Army (KTLA)';
                }elseif($violence->meta_value == 18){
                    $viol = 'Kayan New Land Army (KYNLA)';
                }elseif($violence->meta_value == 19){
                    $viol = 'KlHtoBaw Karen Organization (KKO)';
                }elseif($violence->meta_value == 20){
                    $viol = 'KNU/KNLA-PC (KPC)';
                }elseif($violence->meta_value == 21){
                    $viol = 'Kuki National Army-Burma (KNA-B)';
                }elseif($violence->meta_value == 22){
                    $viol = 'Lahu Democratic Union (LDU)';
                }elseif($violence->meta_value == 23){
                    $viol = 'Mon National Liberation Army (MNLA)';
                }elseif($violence->meta_value == 24){
                    $viol = 'Myanmar National Democratic Alliance (MNDAA)';
                }elseif($violence->meta_value == 25){
                    $viol = 'National Democratic Alliance Army (NDAA)';
                }elseif($violence->meta_value == 26){
                    $viol = 'National Socialist Council of Nagaland - Khaplang (NSCN-K)';
                }elseif($violence->meta_value == 27){
                    $viol = 'Pa-National Army (PNA)';
                }elseif($violence->meta_value == 28){
                    $viol = 'Pa-National Liberation Army (PNLA)';
                }elseif($violence->meta_value == 29){
                    $viol = 'Rohingya Solidarity Organization (RSO)';
                }elseif($violence->meta_value == 30){
                    $viol = 'Shan State Army - North (SSA-N)';
                }elseif($violence->meta_value == 31){
                    $viol = 'Shan State Army - South (SSA-S)';
                }elseif($violence->meta_value == 32){
                    $viol = 'Shanni Nationalities Army (SNA)';
                }elseif($violence->meta_value == 33){
                    $viol = "Ta'ang National Liberation Army (TNLA)";
                }elseif($violence->meta_value == 34){
                    $viol = 'United Wa State Army (UWSA)';
                }elseif($violence->meta_value == 35){
                    $viol = 'WA National Army (WNA)';
                }elseif($violence->meta_value == 36){
                    $viol = 'Zomi Revolutionary Army (ZRA)';
                }else{
                    $viol = NULL;
                }
                DB::table('mmstatistiks')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'sub_target' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
