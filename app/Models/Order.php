<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id' ,'user_id', 'qty' ,'total'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
