<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Class Specialist
 * @package App
 */
class Specialist extends Model
{


    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'description',
        'link_vk',
        'link_instagram',
        'link_fb'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Images', 'specialist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function meta()
    {
        return $this->belongsToMany('App\Meta_tags', 'spec_meta_tags', 'specialist_id', 'meta_tags_id');
    }

    /**
     * @param $tags
     */
    public function setMetatagsAttribute($tags)
    {
        $this->meta()->detach();
        if (!$tags) {
            return;
        }
        if (!$this->exists) {
            $this->save();
        }
        $this->meta()->attach($tags);
    }

    /**
     * @param $tags
     * @return array
     */
    public function getMetatagsAttribute($tags)
    {
        return array_pluck($this->meta()->get(['id'])->toArray(), 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function city()
    {
        return $this->belongsToMany('App\City', 'spec_city', 'specialist_id', 'city_id');
    }

    /**
     * @param $citys
     */
    public function setCitysAttribute($citys)
    {
        $this->city()->detach();
        if (!$citys) {
            return;
        }
        if (!$this->exists) {
            $this->save();
        }
        $this->city()->attach($citys);
    }

    /**
     * @param $citys
     * @return array
     */
    public function getCitysAttribute($citys)
    {
        $citymodel = new City();
        $ss = array_pluck($this->city()->get(['id'])->toArray(), 'id');
        foreach ($ss as $key) {
            $city[] = $citymodel->getNameCity($key);
        }
        return $city[0] . ', ' . $city[1] . ', ' . $city[2];
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * @param $id
     * @return array
     */
    public function getCityForSpec($id)
    {
        $spec = Specialist::find($id);
        $array_city =$spec->city;
        return $array_city;
    }




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function specialitys()
    {
        return $this->belongsToMany('App\Speciality', 'spec_speciality', 'specialist_id', 'speciality_id');
    }

    /**
     * @param $specialitys
     */
    public function setSpecialitysAttribute($specialitys)
    {
        $this->specialitys()->detach();
        if (!$specialitys) {return;        }
        if (!$this->exists) {$this->save();        }
        $this->specialitys()->attach($specialitys);
    }

    /**
     * @param $specialitys
     * @return array
     */
    public function getSpecialitysAttribute($specialitys)
    {
        return array_pluck($this->specialitys()->get(['id'])->toArray(), 'id');
    }

    public function getSpecialityForSpec($id)
    {
        $specialitymodel= new Speciality();
        $spec = Specialist::find($id);
        foreach ($spec->specialitys as $key){
            $array_spec[] = $specialitymodel->getNameSpeciality($key);
        }
        return $array_spec;
    }

    public function getAllcity($filter2_id)
    {
        if (isset($filter2_id) && !empty($filter2_id)) {
            $specialist = DB::table('spec_city')->where('city_id', '=', $filter2_id)->get();
            if (count($specialist) > 1) {
                foreach ($specialist as $item) {
                    $array[] = $item->specialist_id;
                }
                return $array;
            } else {
                return null;
            }
        }
    }

    /**
     * @param $filter1_id
     * @param $filter3_id
     * @param $city
     * @return mixed
     */
    public function filter($filter1_id, $filter3_id, $filter2_id)
    {
        $specialists = Specialist::latest('last_name')
            ->when($filter1_id, function ($query) use ($filter1_id) {
                return $query->where('last_name', $filter1_id);
            })
            ->when($filter3_id, function ($query) use ($filter3_id) {
                return $query->where('specialty_name', $filter3_id);
            })
            ->when($filter2_id, function ($query) use ($filter2_id) {
                return $query->whereIn('id', $filter2_id);
            })
            ->get();
        return $specialists;
    }

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            Session::set('array_image', $model->image);  //add image in session
            unset($model->image);                        //delete image on array model
        });
        static::created(function ($model) {
            $array_image = Session::get('array_image'); //get image with session
            if ($array_image) {
                foreach ($array_image as $item) {            //add image with id in field specialist_id
                    $img = new Images($array_image);
                    list($parent_folder, $child_folder, $nameImage,) = explode("/", $item);
                    $img['originalName'] = $nameImage;
                    $img['specialist_id'] = $model->id;
                    $img['pathName'] = $parent_folder . '/' . $child_folder . '/';
                    $img->save();
                }
            }
        });
        static::updating(function ($model) {
            if (!empty($array_image)) {
                foreach ($model->image as $item) {
                    $img = new Images($model->image);
                    list($parent_folder, $child_folder, $nameImage,) = explode("/", $item);
                    $img['originalName'] = $nameImage;
                    $img['specialist_id'] = $model->id;
                    $img['pathName'] = $parent_folder . '/' . $child_folder . '/';
                    $img->save();
                }
                unset($model->image);
            }
        });
    }

}
