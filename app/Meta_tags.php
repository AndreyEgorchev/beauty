<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta_tags extends Model
{
    public function specialists()
    {
        return $this->belongsToMany('App\Specialist');
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
