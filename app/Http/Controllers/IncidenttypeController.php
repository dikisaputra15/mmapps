<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncidenttypeController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];

        $itypes = DB::table('wp_w2gm_locations_relationships')
            ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
            ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
            ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
            ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
            ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name', 'wp_posts.post_date')
            ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(wp_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where(function($query) {
                $query->where('wp_terms.term_id', 434)
                      ->orWhere('wp_terms.term_id', 435)
                      ->orWhere('wp_terms.term_id', 8065)
                      ->orWhere('wp_terms.term_id', 6829)
                      ->orWhere('wp_terms.term_id', 16127)
                      ->orWhere('wp_terms.term_id', 480)
                      ->orWhere('wp_terms.term_id', 438)
                      ->orWhere('wp_terms.term_id', 479)
                      ->orWhere('wp_terms.term_id', 437)
                      ->orWhere('wp_terms.term_id', 18064)
                      ->orWhere('wp_terms.term_id', 18065)
                      ->orWhere('wp_terms.term_id', 18066)
                      ->orWhere('wp_terms.term_id', 18067)
                      ->orWhere('wp_terms.term_id', 18068)
                      ->orWhere('wp_terms.term_id', 18069)
                      ->orWhere('wp_terms.term_id', 18070)
                      ->orWhere('wp_terms.term_id', 18071)
                      ->orWhere('wp_terms.term_id', 18072)
                      ->orWhere('wp_terms.term_id', 18073)
                      ->orWhere('wp_terms.term_id', 18074)
                      ->orWhere('wp_terms.term_id', 18075)
                      ->orWhere('wp_terms.term_id', 18076)
                      ->orWhere('wp_terms.term_id', 18077)
                      ->orWhere('wp_terms.term_id', 18078)
                      ->orwhere('wp_terms.term_id', 460)
                      ->orwhere('wp_terms.term_id', 459)
                      ->orwhere('wp_terms.term_id', 16741)
                      ->orwhere('wp_terms.term_id', 16742)
                      ->orwhere('wp_terms.term_id', 464)
                      ->orwhere('wp_terms.term_id', 465)
                      ->orwhere('wp_terms.term_id', 458)
                      ->orwhere('wp_terms.term_id', 16190)
                      ->orwhere('wp_terms.term_id', 16189)
                      ->orwhere('wp_terms.term_id', 462)
                      ->orwhere('wp_terms.term_id', 16744)
                      ->orwhere('wp_terms.term_id', 16745)
                      ->orwhere('wp_terms.term_id', 16746)
                      ->orwhere('wp_terms.term_id', 16747)
                      ->orwhere('wp_terms.term_id', 17723)
                      ->orwhere('wp_terms.term_id', 17755)
                      ->orwhere('wp_terms.term_id', 16748)
                      ->orwhere('wp_terms.term_id', 461)
                      ->orwhere('wp_terms.term_id', 16191)
                      ->orwhere('wp_terms.term_id', 18650)
                      ->orwhere('wp_terms.term_id', 5418)
                      ->orwhere('wp_terms.term_id', 7196)
                      ->orwhere('wp_terms.term_id', 18605)
                      ->orwhere('wp_terms.term_id', 467)
                      ->orwhere('wp_terms.term_id', 16770)
                      ->orwhere('wp_terms.term_id', 466)
                      ->orwhere('wp_terms.term_id', 16772)
                      ->orwhere('wp_terms.term_id', 16773)
                      ->orwhere('wp_terms.term_id', 16776)
                      ->orwhere('wp_terms.term_id', 16777)
                      ->orwhere('wp_terms.term_id', 16778)
                      ->orwhere('wp_terms.term_id', 17725)
                      ->orwhere('wp_terms.term_id', 17756)
                      ->orwhere('wp_terms.term_id', 17757)
                      ->orwhere('wp_terms.term_id', 16779)
                      ->orwhere('wp_terms.term_id', 16780)
                      ->orwhere('wp_terms.term_id', 16781)
                      ->orwhere('wp_terms.term_id', 16207)
                      ->orwhere('wp_terms.term_id', 18626)
                      ->orwhere('wp_terms.term_id', 23077)
                      ->orwhere('wp_terms.term_id', 23212)
                      ->orwhere('wp_terms.term_id', 23210)
                      ->orwhere('wp_terms.term_id', 23214)
                      ->orwhere('wp_terms.term_id', 23211)
                      ->orwhere('wp_terms.term_id', 24804);
            })
            ->get();


            if($itypes->isNotEmpty()){
                foreach ($itypes as $itype){
                    DB::table('indostatistiknews')
                        ->where('id_listing', $itype->id)
                        ->update([
                            'incident_category' => $itype->name
                        ]);
                }
                echo "sukses";
            }else{
                echo "empty";
            }

    }
}
