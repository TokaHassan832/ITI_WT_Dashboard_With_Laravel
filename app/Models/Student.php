<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=['id','name','email','phone','department_id'];
    //protected $guarded=[]
    public function department(){  //object => student
        return $this->belongsTo(Department::class);
    }
}
