<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Department extends Model
{
    use HasFactory;
    public function Teacher(){
        return $this->hasMany(Teacher::class);
    }
}
