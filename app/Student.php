<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $tabel = 'Students';
    protected $fillable = [
        'full_name',
        'student_id',
        'password',
        'level',
        'can_reservation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
