<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','name','email','phone','department_id','image'];
    //protected $guarded=[]
    public function department(){  //object => student
        return $this->belongsTo(Department::class);
    }
}
