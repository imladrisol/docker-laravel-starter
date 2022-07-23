<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const SUBJECTS_PER_PAGE = 5;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @param $value
     * @return string
     */
    public function getIsActiveAttribute($value)
    {
        return $value ? 'Active' : 'Inactive';
    }

    /**
     * @param $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return date("d F Y H:i", strtotime($value));
    }
}
