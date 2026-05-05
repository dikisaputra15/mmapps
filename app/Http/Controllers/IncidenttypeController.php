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

        $itypes = DB::table('hk673_w2gm_locations_relationships')
            ->join('hk673_term_relationships', 'hk673_term_relationships.object_id', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->join('hk673_term_taxonomy', 'hk673_term_taxonomy.term_taxonomy_id', '=', 'hk673_term_relationships.term_taxonomy_id')
            ->join('hk673_terms', 'hk673_terms.term_id', '=', 'hk673_term_taxonomy.term_id')
            ->join('hk673_posts', 'hk673_posts.ID', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->select('hk673_w2gm_locations_relationships.id', 'hk673_terms.name', 'hk673_posts.post_date')
            ->whereDate(DB::raw('DATE(hk673_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(hk673_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where(function($query) {
                $query->where('hk673_terms.term_id', 1921)
                      ->orWhere('hk673_terms.term_id', 1922)
                      ->orWhere('hk673_terms.term_id', 1923)
                      ->orWhere('hk673_terms.term_id', 1924)
                      ->orWhere('hk673_terms.term_id', 1925)
                      ->orWhere('hk673_terms.term_id', 1926)
                      ->orWhere('hk673_terms.term_id', 1927)
                      ->orWhere('hk673_terms.term_id', 1928)
                      ->orWhere('hk673_terms.term_id', 1929)
                      ->orWhere('hk673_terms.term_id', 1930)
                      ->orWhere('hk673_terms.term_id', 1931)
                      ->orWhere('hk673_terms.term_id', 1932)
                      ->orWhere('hk673_terms.term_id', 1933)
                      ->orWhere('hk673_terms.term_id', 1934)
                      ->orWhere('hk673_terms.term_id', 1935)
                      ->orWhere('hk673_terms.term_id', 1936)
                      ->orWhere('hk673_terms.term_id', 1968)
                      ->orWhere('hk673_terms.term_id', 592)
                      ->orWhere('hk673_terms.term_id', 1944)
                      ->orWhere('hk673_terms.term_id', 779)
                      ->orWhere('hk673_terms.term_id', 1945)
                      ->orWhere('hk673_terms.term_id', 1946)
                      ->orWhere('hk673_terms.term_id', 593)
                      ->orWhere('hk673_terms.term_id', 1947)
                      ->orWhere('hk673_terms.term_id', 784)
                      ->orWhere('hk673_terms.term_id', 1948)
                      ->orWhere('hk673_terms.term_id', 1975)
                      ->orWhere('hk673_terms.term_id', 954)
                      ->orWhere('hk673_terms.term_id', 964)
                      ->orWhere('hk673_terms.term_id', 967)
                      ->orWhere('hk673_terms.term_id', 969)
                      ->orWhere('hk673_terms.term_id', 1976)
                      ->orWhere('hk673_terms.term_id', 962)
                      ->orWhere('hk673_terms.term_id', 1977)
                      ->orWhere('hk673_terms.term_id', 953)
                      ->orWhere('hk673_terms.term_id', 1978)
                      ->orWhere('hk673_terms.term_id', 1979)
                      ->orWhere('hk673_terms.term_id', 1980)
                      ->orWhere('hk673_terms.term_id', 966)
                      ->orWhere('hk673_terms.term_id', 1981)
                      ->orWhere('hk673_terms.term_id', 1982)
                      ->orWhere('hk673_terms.term_id', 1983)
                      ->orWhere('hk673_terms.term_id', 1984)
                      ->orWhere('hk673_terms.term_id', 1985)
                      ->orWhere('hk673_terms.term_id', 1986)
                      ->orWhere('hk673_terms.term_id', 1987)
                      ->orWhere('hk673_terms.term_id', 1988)
                      ->orWhere('hk673_terms.term_id', 1989)
                      ->orWhere('hk673_terms.term_id', 1990)
                      ->orWhere('hk673_terms.term_id', 1991)
                      ->orWhere('hk673_terms.term_id', 1992)
                      ->orWhere('hk673_terms.term_id', 1028)
                      ->orWhere('hk673_terms.term_id', 1993)
                      ->orWhere('hk673_terms.term_id', 1994)
                      ->orWhere('hk673_terms.term_id', 970)
                      ->orWhere('hk673_terms.term_id', 971)
                      ->orWhere('hk673_terms.term_id', 1995)
                      ->orWhere('hk673_terms.term_id', 1996)
                      ->orWhere('hk673_terms.term_id', 1997)
                      ->orWhere('hk673_terms.term_id', 963)
                      ->orWhere('hk673_terms.term_id', 1998)
                      ->orWhere('hk673_terms.term_id', 1999)
                      ->orWhere('hk673_terms.term_id', 2000)
                      ->orWhere('hk673_terms.term_id', 2001)
                      ->orWhere('hk673_terms.term_id', 972)
                      ->orWhere('hk673_terms.term_id', 2002)
                      ->orWhere('hk673_terms.term_id', 986)
                      ->orWhere('hk673_terms.term_id', 2003)
                      ->orWhere('hk673_terms.term_id', 968)
                      ->orWhere('hk673_terms.term_id', 965);
            })
            ->get();


            if($itypes->isNotEmpty()){
                foreach ($itypes as $itype){
                    DB::table('mmstatistiks')
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
