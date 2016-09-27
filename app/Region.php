<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function getNameRegion($id)
    {
        $region=$this->where('id','=', $id)->first();
        $region_name=$region->id;
        return $region_name;
    }

}
