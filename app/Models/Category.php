<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'name',
        'is_active',
    ];
    protected $casts =[
        'created_at' =>'datetime:Y-m-d H:i',
        'updated_at' =>'datetime:Y-m-d H:i'
    ];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($category) {
            $category->courses()->delete();
        });
    }
}
