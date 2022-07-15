<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes\Helper;

class Ads extends Model
{
    protected $fillable = [
        'title', 'price', 'photo', 'photos', 'description',
    ];

    protected $appends = [
        'photosArr', 'fullPrice',
    ];

    public function getPhotosArrAttribute()
    {
        return $this->photos ? explode(',', $this->photos) : null;
    }

    public function getFullPriceAttribute()
    {
        return Helper::get_number_with_letters($this->price) . '₽';
    }

    public function scopeAll($q)
    {
        return $q->select('id', 'title', 'price', 'photo', 'photos', 'description');
    }

    public function scopeShort($q)
    {
        return $q->select('id', 'title', 'price', 'photo');
    }
}
