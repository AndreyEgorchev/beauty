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
        $array_city = $spec->city;
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
        if (!$specialitys) {
            return;
        }
        if (!$this->exists) {
            $this->save();
        }
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
        $specialitymodel = new Speciality();
        $spec = Specialist::find($id);
        foreach ($spec->specialitys as $key) {
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
        if ($filter3_id !== 0) {
            $speciality = DB::table('spec_speciality')->where('speciality_id', '=', $filter3_id)->get();
            foreach ($speciality as $key) {
                $array_speciality_id[] = $key->specialist_id;
            }
        }
        if ($filter2_id !== 0) {
            $city = DB::table('spec_city')->where('city_id', '=', $filter2_id)->get();
            foreach ($city as $key) {
                $array_city_id[] = $key->specialist_id;
            }
        }
        if (!empty($array_speciality_id) && !empty($array_city_id)) {
            $temp = array();
            foreach ($array_speciality_id as $v) {
                if (in_array($v, $array_city_id) && !in_array($v, $temp)) {
                    array_push($temp, $v);
                }
            }
            foreach ($temp as $key) {
                $result[] = Specialist::query('last_name')->where('id', '=', $key)->get();
            }
        } elseif (!empty($array_speciality_id)) {
            foreach ($array_speciality_id as $key) {
                $result[] = Specialist::query('last_name')->where('id', '=', $key)->get();
            }
        } else {
            if (!empty($array_city_id)) {
                foreach ($array_city_id as $key) {
                    $result[] = Specialist::query('last_name')->where('id', '=', $key)->get();
                }
            }
            return null;
        }

        foreach ($result as $item) {
            foreach ($item as $key) {
                $array_spec[] = $key;
            }
        }

        return $array_spec;
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
