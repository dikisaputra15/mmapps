<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SocialconflictController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $sconflicts = DB::table('hk673_w2gm_locations_relationships')
            ->join('hk673_term_relationships', 'hk673_term_relationships.object_id', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->join('hk673_term_taxonomy', 'hk673_term_taxonomy.term_taxonomy_id', '=', 'hk673_term_relationships.term_taxonomy_id')
            ->join('hk673_terms', 'hk673_terms.term_id', '=', 'hk673_term_taxonomy.term_id')
            ->join('hk673_posts', 'hk673_posts.ID', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->select('hk673_w2gm_locations_relationships.id', 'hk673_terms.name')
            ->whereDate(DB::raw('DATE(hk673_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(hk673_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where(function($query) {
                $query->where('hk673_terms.term_id', 1963)
                        ->orWhere('hk673_terms.term_id', 1964)
                        ->orWhere('hk673_terms.term_id', 1965)
                        ->orWhere('hk673_terms.term_id', 1966)
                        ->orWhere('hk673_terms.term_id', 1967)
                        ->orWhere('hk673_terms.term_id', 1968)
                        ->orWhere('hk673_terms.term_id', 1969)
                        ->orWhere('hk673_terms.term_id', 1970)
                        ->orWhere('hk673_terms.term_id', 1971)
                        ->orWhere('hk673_terms.term_id', 1973)
                        ->orWhere('hk673_terms.term_id', 1972);
                     })
            ->get();

            if($sconflicts->isNotEmpty()){
                foreach ($sconflicts as  $sconflict){
                    DB::table('mmstatistiks')
                        ->where('id_listing', $sconflict->id)
                        ->update([
                            'sub_incident_type' => $sconflict->name
                        ]);
                }
                echo "sukses";
            }else{
                echo "empty";
            }

    }
}
