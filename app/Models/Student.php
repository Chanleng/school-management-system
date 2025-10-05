<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'gender',
        'grade',
        'address',
        'phone_number',
        'parent',
        'parent_phone',
        'status'
    ];
}
