<?php

namespace App\Http\Controllers;

use App\City;
use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;

class RegionController extends Controller
{
    public function getRegion()
        {
//            $region=Region::all();
//            return view('region.region',['region'=>$region]);

        }
    public function getCity(Request $request)
    {

//        if (isset($_POST['id']) && !empty($_POST['id'])) {
//            $id_first = intval($_POST['id']);
//
//            $city=City::latest('city_ua')
//                ->where('region','=',$id_first)
//                ->get();
//
//            echo "<select name='specialists_city_first' class='area_first'>";
//            echo " <option>--Виберіть Місто--</option>";
//            foreach ($city as $key)
//            {
//                echo " <option>" .$key['city_ua']. "</option>";
//            }
//            echo "</select>";
//        }
//        return new Response();
    }
}
