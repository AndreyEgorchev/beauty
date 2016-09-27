<?php

namespace App;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Images
 * @package App
 */
class Images extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'originalName',
        'pathName',
        'mimeType',
        'size',
        'image_description',
        'specialist_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialists()
    {
        return $this->belongsTo('app\Specialist');
    }
    public function getImages($id)
    {
        $image=$this->where('specialist_id','=', $id)->get();
        return $image;
    }
}
