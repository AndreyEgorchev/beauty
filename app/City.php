<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function getCity($city){

        return City::query('city_ua')->where('region', '=', $city)->get();
    }
    public function getNameCity($id)
    {
        $city=$this->where('id','=', $id)->first();
        $city_name=$city->city_ua;
        return $city_name;
    }
    public function specialists()
    {
        return $this->belongsToMany('App\Specialist')->withTimestamps();
    }
    public function setSpecialistsAttribute($specialists)
    {
        $this->specialists()->detach();
        if ( ! $specialists)
            return;
        if ( ! $this->exists)
            $this->save();
        $this->specialists()->attach($specialists);
    }

    public function getSpecialistsAttribute($specialists)
    {
        return array_pluck($this->specialists()->get(['id'])->toArray(), 'id');
    }
}
