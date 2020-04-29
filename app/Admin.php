<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{

use HasRoles;

    protected $table = 'admins';

    protected $fillable = [
            "name",
            "email",
			"phone",
			"password",
			"level",
    ];

      protected $hidden = [
        'password'
    ];


 public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y h:m:s', strtotime($value));
    }



  public function getUpdatedAtAttribute($value)

    {
        return date('d-m-Y h:m:s', strtotime($value));

    }

}
