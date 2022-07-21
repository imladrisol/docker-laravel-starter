<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];
    public const CATEGORIES_PER_PAGE = 5;

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
