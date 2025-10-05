<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    use HasFactory;
    public function Department(){
        return $this->belongsTo(Department::class);
    }
    protected $fillable =[
        'user_id',
        'is_head'
    ];
    protected $casts = [
        'is_head' => 'boolean'
    ];

}
