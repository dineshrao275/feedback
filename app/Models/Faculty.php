<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $table='faculties';
    use HasFactory;
    protected $fillable = ['id','name','email','gender','designation','department','doj'];
    public $timestamps =false;
}
