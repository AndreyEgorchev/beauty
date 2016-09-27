<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'specialty_name'
    ];
    public function getNameSpeciality($id)
    {
        $speciality=$this->latest('specialty_name')->where('id','=', $id)->first();
        return $speciality;

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
