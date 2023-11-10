<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContracts
{
    use Authenticatable;   
    use HasFactory;
    public $timestamps = false;
    protected $fillable =['id','username','contact','email','password','deleted_at'];
}
