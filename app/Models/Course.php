<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    public const Level_Options =['beginner','immediate','high'];
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'name',
        'category_id',
        'description',
        'rating',
        'views',
        'levels',
        'hours',
        'is_active',
    ];

    protected $casts =[
        'created_at' =>'datetime:Y-m-d H:i',
        'updated_at' =>'datetime:Y-m-d H:i'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
