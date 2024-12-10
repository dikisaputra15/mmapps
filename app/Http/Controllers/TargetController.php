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

        $targets = DB::table('wp_w2gm_locations_relationships')
        ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_w2gm_locations_relationships.post_id')
        ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
        ->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id')
        ->join('wp_posts', 'wp_posts.ID', '=', 'wp_w2gm_locations_relationships.post_id')
        ->select('wp_w2gm_locations_relationships.id', 'wp_terms.name')
        ->whereDate(DB::raw('DATE(wp_posts.post_date)'), $tgl_now)
        // ->whereBetween(DB::raw('DATE(wp_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
        ->where(function($query) {
            $query->where('wp_terms.term_id', 16223)
                ->orWhere('wp_terms.term_id', 16211)
                ->orWhere('wp_terms.term_id', 16216)
                ->orWhere('wp_terms.term_id', 16217)
                ->orWhere('wp_terms.term_id', 16227)
                ->orWhere('wp_terms.term_id', 16209)
                ->orWhere('wp_terms.term_id', 16221)
                ->orWhere('wp_terms.term_id', 16220)
                ->orWhere('wp_terms.term_id', 16213)
                ->orWhere('wp_terms.term_id', 16219)
                ->orWhere('wp_terms.term_id', 16224)
                ->orWhere('wp_terms.term_id', 16228)
                ->orWhere('wp_terms.term_id', 16212)
                ->orWhere('wp_terms.term_id', 16225)
                ->orWhere('wp_terms.term_id', 16226)
                ->orWhere('wp_terms.term_id', 16210)
                ->orWhere('wp_terms.term_id', 16214)
                ->orWhere('wp_terms.term_id', 16215)
                ->orWhere('wp_terms.term_id', 16229)
                ->orWhere('wp_terms.term_id', 16218)
                ->orWhere('wp_terms.term_id', 16403)
                ->orWhere('wp_terms.term_id', 16222)
                ->orWhere('wp_terms.term_id', 16787)
                ->orWhere('wp_terms.term_id', 16788)
                ->orWhere('wp_terms.term_id', 16789)
                ->orWhere('wp_terms.term_id', 16790)
                ->orWhere('wp_terms.term_id', 16791)
                ->orWhere('wp_terms.term_id', 16794)
                ->orWhere('wp_terms.term_id', 16795)
                ->orWhere('wp_terms.term_id', 16796)
                ->orWhere('wp_terms.term_id', 16797)
                ->orWhere('wp_terms.term_id', 16798)
                ->orWhere('wp_terms.term_id', 16799)
                ->orWhere('wp_terms.term_id', 16800)
                ->orWhere('wp_terms.term_id', 16801)
                ->orWhere('wp_terms.term_id', 16802)
                ->orWhere('wp_terms.term_id', 16803)
                ->orWhere('wp_terms.term_id', 16804)
                ->orWhere('wp_terms.term_id', 16805)
                ->orWhere('wp_terms.term_id', 16806)
                ->orWhere('wp_terms.term_id', 16807)
                ->orWhere('wp_terms.term_id', 16808)
                ->orWhere('wp_terms.term_id', 16809)
                ->orWhere('wp_terms.term_id', 16810)
                ->orWhere('wp_terms.term_id', 16811)
                ->orWhere('wp_terms.term_id', 16954)
                ->orWhere('wp_terms.term_id', 16959)
                ->orWhere('wp_terms.term_id', 16933)
                ->orWhere('wp_terms.term_id', 16934)
                ->orWhere('wp_terms.term_id', 16932)
                ->orWhere('wp_terms.term_id', 16965)
                ->orWhere('wp_terms.term_id', 16966)
                ->orWhere('wp_terms.term_id', 17789)
                ->orWhere('wp_terms.term_id', 16151)
                ->orWhere('wp_terms.term_id', 17136)
                ->orWhere('wp_terms.term_id', 16160)
                ->orWhere('wp_terms.term_id', 17138)
                ->orWhere('wp_terms.term_id', 17137)
                ->orWhere('wp_terms.term_id', 16181)
                ->orWhere('wp_terms.term_id', 16159)
                ->orWhere('wp_terms.term_id', 18158)
                ->orWhere('wp_terms.term_id', 18159)
                ->orWhere('wp_terms.term_id', 18160)
                ->orWhere('wp_terms.term_id', 18161)
                ->orWhere('wp_terms.term_id', 18162)
                ->orWhere('wp_terms.term_id', 18163)
                ->orWhere('wp_terms.term_id', 18164)
                ->orWhere('wp_terms.term_id', 18165)
                ->orWhere('wp_terms.term_id', 18166)
                ->orWhere('wp_terms.term_id', 18167)
                ->orWhere('wp_terms.term_id', 18168)
                ->orWhere('wp_terms.term_id', 18169)
                ->orWhere('wp_terms.term_id', 18131)
                ->orWhere('wp_terms.term_id', 18237)
                ->orWhere('wp_terms.term_id', 18238)
                ->orWhere('wp_terms.term_id', 18239)
                ->orWhere('wp_terms.term_id', 18240)
                ->orWhere('wp_terms.term_id', 18241)
                ->orWhere('wp_terms.term_id', 18242)
                ->orWhere('wp_terms.term_id', 18243)
                ->orWhere('wp_terms.term_id', 18244)
                ->orWhere('wp_terms.term_id', 18245)
                ->orWhere('wp_terms.term_id', 19308)
                ->orWhere('wp_terms.term_id', 16935);
            })
        ->get();

        if($targets->isNotEmpty()){
            foreach ($targets as $target){
                DB::table('indostatistiknews')
                    ->where('id_listing', $target->id)
                    ->update([
                        'target' => $target->name
                    ]);
            }
            echo "sukses";
        }else{
            echo "empty";
        }

    }
}
