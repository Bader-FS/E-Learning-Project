<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','description','image','is_active','is_popular'];

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
