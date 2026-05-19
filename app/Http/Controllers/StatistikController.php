<?php

namespace App\Http\Controllers;

use App\Models\Mmstatistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
    {
        // ini_set('max_execution_time', 3600);

        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        // $tgl_coba = ['2024-02-01', '2024-02-10'];
        $icats = DB::table('hk673_terms')
            ->join('hk673_term_taxonomy', 'hk673_terms.term_id', '=', 'hk673_term_taxonomy.term_id')
            ->join('hk673_term_relationships', 'hk673_term_taxonomy.term_taxonomy_id', '=', 'hk673_term_relationships.term_taxonomy_id')
            ->join('hk673_posts', 'hk673_posts.ID', '=', 'hk673_term_relationships.object_id')
            ->join('hk673_w2gm_locations_relationships', 'hk673_posts.ID', '=', 'hk673_w2gm_locations_relationships.post_id')
            ->join('hk673_lokasi', 'hk673_w2gm_locations_relationships.location_id', '=', 'hk673_lokasi.lokasi_id')
            ->select('hk673_posts.ID', 'hk673_posts.post_title', 'hk673_w2gm_locations_relationships.id', 'hk673_w2gm_locations_relationships.address_line_1', 'hk673_lokasi.lokasi_name', 'hk673_lokasi.district', 'hk673_lokasi.province_name', 'hk673_w2gm_locations_relationships.map_coords_1', 'hk673_w2gm_locations_relationships.map_coords_2', 'hk673_terms.name AS incident_category', 'hk673_w2gm_locations_relationships.number_of_incident', 'hk673_w2gm_locations_relationships.number_of_injuries', 'hk673_w2gm_locations_relationships.number_of_fatalities', 'hk673_w2gm_locations_relationships.additional_info', 'hk673_posts.post_date', 'hk673_terms.name')
            ->where('hk673_posts.post_status', 'publish')
            ->whereDate(DB::raw('DATE(hk673_posts.post_date)'), $tgl_now)
            // ->whereBetween(DB::raw('DATE(hk673_posts.post_date)'), [$tgl_coba[0], $tgl_coba[1]])
            ->where(function($query) {
                $query->where('hk673_terms.term_id', 273)
                      ->orWhere('hk673_terms.term_id', 591)
                      ->orWhere('hk673_terms.term_id', 952);
            })
            ->get();

            // $no = 1;
            // foreach ($icats as $icat) {
            //     echo $no++ . " " . $icat->ID . " " . $icat->id . " " . $icat->post_title . "<br>";
            // }

        if($icats->isNotEmpty()){
            foreach ($icats as $icat){
                $loc = $icat->map_coords_1 . "," . " " . $icat->map_coords_2;

                $category = [
                    'id_listing' => $icat->id,
                    'post_id_cat' => $icat->ID,
                    'listing_date' => NULL,
                    'time_incident' => NULL,
                    'post_title' => $icat->post_title,
                    'address' => $icat->address_line_1,
                    'regency_city' => $icat->lokasi_name,
                    'district' => $icat->district,
                    'province_name' => $icat->province_name,
                    'country' => 'Myanmar',
                    'location' => $loc,
                    'main_incident' => $icat->name,
                    'incident_category' => NULL,
                    'incident_type' => NULL,
                    'sub_incident_type' => NULL,
                    'weapon_type' => NULL,
                    'sub_weapon' => NULL,
                    'actor' => NULL,
                    'actor_type' => NULL,
                    'sub_actor_type' => NULL,
                    'actor_gender' => NULL,
                    'actor_age' => NULL,
                    'target' => NULL,
                    'sub_target' => NULL,
                    'sub_target_intel_mil' => NULL,
                    'target_type' => NULL,
                    'target_gender' => NULL,
                    'target_age' => NULL,
                    'violence' => NULL,
                    'incident_detail' => NULL,
                    'number_of_incident' => $icat->number_of_incident,
                    'number_of_injuries' => $icat->number_of_injuries,
                    'number_of_fatalities' => $icat->number_of_fatalities,
                    'article_link' => NULL,
                    'number_of_protest' => NULL,
                    'issue' => NULL,
                    'additional_info' => $icat->additional_info,
                    'date_posting' => $icat->post_date
                ];

               $criteria = ['id_listing' => $icat->id];

               Mmstatistik::firstOrCreate(
                    $criteria,
                    $category
                );

            }
            echo "sukses";
        }else{
            echo "empty";
        }
    }
}
