<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domain;
use App\Models\Prof;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'prof_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'selling_price',
        'image',
        'duration',
        'language',
        'certified',
        'trend',
        'map_keywords',
    ];

    public function domain(){
        return $this->belongsTo(Domain::class,'domain_id','id');
    }

    public function prof(){
        return $this->belongsTo(Prof::class,'prof_id','id');
    }
}
