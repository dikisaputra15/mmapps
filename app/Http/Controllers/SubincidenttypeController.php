<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubincidenttypeController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];
        $sutypes = DB::table('hk673_w2gm_locations_relationships')
            ->join('hk673_term_relationships', 'hk673_term_relationships.object_id', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->join('hk673_term_taxonomy', 'hk673_term_taxonomy.term_taxonomy_id', '=', 'hk673_term_relationships.term_taxonomy_id')
            ->join('hk673_terms', 'hk673_terms.term_id', '=', 'hk673_term_taxonomy.term_id')
            ->join('hk673_posts', 'hk673_posts.ID', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->select('hk673_w2gm_locations_relationships.id', 'hk673_terms.name', 'hk673_posts.post_date')
            ->whereDate(DB::raw('DATE(hk673_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(hk673_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where(function($query) {
                $query->where('hk673_terms.term_id', 777)
                        ->orwhere('hk673_terms.term_id', 1937)
                        ->orwhere('hk673_terms.term_id', 1938)
                        ->orwhere('hk673_terms.term_id', 1939)
                        ->orwhere('hk673_terms.term_id', 778)
                        ->orwhere('hk673_terms.term_id', 1940)
                        ->orwhere('hk673_terms.term_id', 1941)
                        ->orwhere('hk673_terms.term_id', 776)
                        ->orwhere('hk673_terms.term_id', 1942)
                        ->orwhere('hk673_terms.term_id', 1948)
                        ->orwhere('hk673_terms.term_id', 1949)
                        ->orwhere('hk673_terms.term_id', 1950)
                        ->orwhere('hk673_terms.term_id', 1951)
                        ->orwhere('hk673_terms.term_id', 1952)
                        ->orwhere('hk673_terms.term_id', 1953)
                        ->orwhere('hk673_terms.term_id', 1954)
                        ->orwhere('hk673_terms.term_id', 1955)
                        ->orwhere('hk673_terms.term_id', 1956)
                        ->orwhere('hk673_terms.term_id', 1958)
                        ->orwhere('hk673_terms.term_id', 1957)
                        ->orwhere('hk673_terms.term_id', 1959)
                        ->orwhere('hk673_terms.term_id', 1960)
                        ->orwhere('hk673_terms.term_id', 1961)
                        ->orwhere('hk673_terms.term_id', 1962)
                        ->orwhere('hk673_terms.term_id', 2004)
                        ->orwhere('hk673_terms.term_id', 2005)
                        ->orwhere('hk673_terms.term_id', 2006)
                        ->orwhere('hk673_terms.term_id', 2007)
                        ->orwhere('hk673_terms.term_id', 2008)
                        ->orwhere('hk673_terms.term_id', 2009)
                        ->orwhere('hk673_terms.term_id', 2010)
                        ->orwhere('hk673_terms.term_id', 923)
                        ->orwhere('hk673_terms.term_id', 1936)
                        ->orwhere('hk673_terms.term_id', 2012)
                        ->orwhere('hk673_terms.term_id', 2013)
                        ->orwhere('hk673_terms.term_id', 2014)
                        ->orwhere('hk673_terms.term_id', 2015)
                        ->orwhere('hk673_terms.term_id', 2016)
                        ->orwhere('hk673_terms.term_id', 2017)
                        ->orwhere('hk673_terms.term_id', 2018)
                        ->orwhere('hk673_terms.term_id', 2019)
                        ->orwhere('hk673_terms.term_id', 2020)
                        ->orwhere('hk673_terms.term_id', 2021)
                        ->orwhere('hk673_terms.term_id', 2022)
                        ->orwhere('hk673_terms.term_id', 2024)
                        ->orwhere('hk673_terms.term_id', 2023);
            })
            ->get();

        if($sutypes->isNotEmpty()){
                foreach ($sutypes as $sutype){
                    DB::table('mmstatistiks')
                        ->where('id_listing', $sutype->id)
                        ->update([
                            'incident_type' => $sutype->name
                        ]);
                }
                echo "sukses";
        }else{
            echo "empty";
        }

    }
}
