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

        $violences = DB::table('wp_postmeta')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_postmeta.post_id')
            ->join('wp_w2gm_locations_relationships', 'wp_w2gm_locations_relationships.post_id', '=', 'wp_postmeta.post_id')
            ->select('wp_postmeta.post_id', 'wp_postmeta.meta_value', 'wp_posts.post_date', 'wp_w2gm_locations_relationships.id')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(wp_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where('wp_postmeta.meta_key', '_content_field_156')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 15){
                    $viol = 'Activist Group';
                }elseif($violence->meta_value == 30){
                    $viol = 'Military - Navy';
                }elseif($violence->meta_value == 2){
                    $viol = 'Provincial Government (T)';
                }elseif($violence->meta_value == 50){
                    $viol = 'Asset/Site/Resource';
                }elseif($violence->meta_value == 34){
                    $viol = 'Military - Navy SF';
                }elseif($violence->meta_value == 61){
                    $viol = 'Religious Group';
                }elseif($violence->meta_value == 3){
                    $viol = 'Central Government (T)';
                }elseif($violence->meta_value == 36){
                    $viol = 'Military - Special Operations Command (Koopsus)';
                }elseif($violence->meta_value == 38){
                    $viol = 'Separatist - Free Papua Organization (OPM)';
                }elseif($violence->meta_value == 14){
                    $viol = 'Child/Youth/Student';
                }elseif($violence->meta_value == 59){
                    $viol = 'Military Intelligence';
                }elseif($violence->meta_value == 78){
                    $viol = 'Separatist - West Papua National Committee (KNPB)';
                }elseif($violence->meta_value == 47){
                    $viol = 'Country State-owned Enterprise (SOE)';
                }elseif($violence->meta_value == 11){
                    $viol = 'Motorcycle Gang';
                }elseif($violence->meta_value == 37){
                    $viol = 'Separatist - West Papua National Liberation Army (TPNPB)';
                }elseif($violence->meta_value == 62){
                    $viol = 'Ethnic/Cultural Group';
                }elseif($violence->meta_value == 67){
                    $viol = 'Multinational Corporation';
                }elseif($violence->meta_value == 45){
                    $viol = 'Small or Medium Business/Firms';
                }elseif($violence->meta_value == 53){
                    $viol = 'Foreign Business/Enterprise';
                }elseif($violence->meta_value == 65){
                    $viol = 'National Conglomerate';
                }elseif($violence->meta_value == 69){
                    $viol = 'Terrorist - Al Qaeda Indonesia (AQI)';
                }elseif($violence->meta_value == 52){
                    $viol = 'Foreign Government (T)';
                }elseif($violence->meta_value == 66){
                    $viol = 'National Conglomerate - Multinational Corporation';
                }elseif($violence->meta_value == 70){
                    $viol = 'Terrorist - Angkatan Mujahideen Islam Nusantara (AMIN)';
                }elseif($violence->meta_value == 48){
                    $viol = 'Foreign National';
                }elseif($violence->meta_value == 57){
                    $viol = 'National Intelligence';
                }elseif($violence->meta_value == 71){
                    $viol = 'Terrorist - Darul Islam';
                }elseif($violence->meta_value == 19){
                    $viol = 'Hard-line/Radicalized Islamic Group';
                }elseif($violence->meta_value == 16){
                    $viol = 'NGO';
                }elseif($violence->meta_value == 39){
                    $viol = 'Terrorist - Islamic State of Iraq and Syria (ISIS)';
                }elseif($violence->meta_value == 51){
                    $viol = 'Illegal Asset/Site/Resource';
                }elseif($violence->meta_value == 49){
                    $viol = 'Organized Crime Group';
                }elseif($violence->meta_value == 40){
                    $viol = 'Terrorist - Jamaah Ansharut Daulah (JAD)';
                }elseif($violence->meta_value == 56){
                    $viol = 'Infant';
                }elseif($violence->meta_value == 68){
                    $viol = 'Other Business Entity';
                }elseif($violence->meta_value == 41){
                    $viol = 'Terrorist - Jamaah Ansharut Tauhid (JAT)';
                }elseif($violence->meta_value == 54){
                    $viol = 'International Activist Group/Organization';
                }elseif($violence->meta_value == 63){
                    $viol = 'Other community group';
                }elseif($violence->meta_value == 42){
                    $viol = 'Terrorist - Jemaah Islamiyah (JI)';
                }elseif($violence->meta_value == 46){
                    $viol = 'Large Business/Firms';
                }elseif($violence->meta_value == 6){
                    $viol = 'Other Separatist Group';
                }elseif($violence->meta_value == 44){
                    $viol = 'Terrorist - Khilafatul Muslimin';
                }elseif($violence->meta_value == 8){
                    $viol = 'Local Civilian';
                }elseif($violence->meta_value == 7){
                    $viol = 'Other Terrorist Group';
                }elseif($violence->meta_value == 72){
                    $viol = 'Terrorist - Komando Jihad';
                }elseif($violence->meta_value == 60){
                    $viol = 'Local Community Group';
                }elseif($violence->meta_value == 23){
                    $viol = 'Police - Detachment 88 (Densus 88)';
                }elseif($violence->meta_value == 73){
                    $viol = 'Terrorist - Laskar Jihad';
                }elseif($violence->meta_value == 9){
                    $viol = 'Local Criminal/Gang/Group';
                }elseif($violence->meta_value == 27){
                    $viol = 'Police - District-level Police (Polsek)';
                }elseif($violence->meta_value == 74){
                    $viol = 'Terrorist - Laskar Jundullah';
                }elseif($violence->meta_value == 1){
                    $viol = 'Local Government (T)';
                }elseif($violence->meta_value == 24){
                    $viol = 'Police - Mobile Brigade (Brimob)';
                }elseif($violence->meta_value == 43){
                    $viol = 'Terrorist - Mujahedeen in Eastern Indonesia (MIT)';
                }elseif($violence->meta_value == 13){
                    $viol = 'Martial Arts Group';
                }elseif($violence->meta_value == 26){
                    $viol = 'Police - Municipality Police (Polres)';
                }elseif($violence->meta_value == 75){
                    $viol = 'Terrorist - Mujahideen in Western Indonesia (MIB)';
                }elseif($violence->meta_value == 12){
                    $viol = 'Mass Organization';
                }elseif($violence->meta_value == 22){
                    $viol = 'Police - National Police (Polri)';
                }elseif($violence->meta_value == 76){
                    $viol = 'Terrorist - Ring Banten';
                }elseif($violence->meta_value == 29){
                    $viol = 'Military - Air Force';
                }elseif($violence->meta_value == 25){
                    $viol = 'Police - Provincial Police (Polda)';
                }elseif($violence->meta_value == 77){
                    $viol = 'Terrorist - Team Hisbah';
                }elseif($violence->meta_value == 33){
                    $viol = 'Military - Air Force SF';
                }elseif($violence->meta_value == 58){
                    $viol = 'Police Intelligence';
                }elseif($violence->meta_value == 55){
                    $viol = 'Union/Labor Group';
                }elseif($violence->meta_value == 28){
                    $viol = 'Military - Army';
                }elseif($violence->meta_value == 17){
                    $viol = 'Political Party';
                }elseif($violence->meta_value == 10){
                    $viol = 'Vested Interest - Stakeholder';
                }elseif($violence->meta_value == 32){
                    $viol = 'Military - Army SF';
                }elseif($violence->meta_value == 64){
                    $viol = 'Political Party Supporter';
                }elseif($violence->meta_value == 21){
                    $viol = 'Unknown';
                }elseif($violence->meta_value == 31){
                    $viol = 'Military - Marine';
                }elseif($violence->meta_value == 18){
                    $viol = 'Political Party Wing Group';
                }elseif($violence->meta_value == 20){
                    $viol = 'Other';
                }elseif($violence->meta_value == 35){
                    $viol = 'Military - Marine SF';
                }elseif($violence->meta_value == 79){
                    $viol = 'Terrorist - al Qaeda in the Arabian Peninsula (AQAP)';
                }else{
                    $viol = NULL;
                }
                DB::table('indostatistiknews')
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
