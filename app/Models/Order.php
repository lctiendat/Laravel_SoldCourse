<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'address',
        'phoneNumber',
        'email',
        'note',
        'status',
        'course_id'
    ];
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function user(){
        return $this->belongsTo(Course::class,'user_id');
    }
}
