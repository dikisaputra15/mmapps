<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncidentdetailController extends Controller
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
            ->where('hk673_postmeta.meta_key', '_content_field_130')
            ->get();

        //    $no = 1;
        //     foreach ($tanggals as $tanggal) {
        //         echo $no++ . " " . $tanggal->id . "<br>";
        //     }


        if($violences->isNotEmpty()){
            foreach($violences as $violence){
                if($violence->meta_value == 1){
                    $viol = 'Conflict';
                }elseif($violence->meta_value == 2){
                    $viol = 'Security/Crime';
                }else{
                    $viol = NULL;
                }
                DB::table('mmstatistiks')
                    ->where('id_listing', $violence->id)
                    ->update([
                        'incident_detail' => $viol
                    ]);
            }

            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
