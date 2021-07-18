<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  Illuminate\Contracts\Auth\Authenticatable as  AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $table  = 'admin_users';
    protected  $guarded = [];

    public function getName(){
        return $this->name;
    }

    public function getImage(){
        return $this->image;
    }
}
