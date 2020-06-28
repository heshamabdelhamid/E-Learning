<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    

    protected $fillable = [
            "name",
			"email",
			"message",

    ];



    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y h:m:s', strtotime($value));
    }




  public function getUpdatedAtAttribute($value)
  
    {
        return date('d-m-Y h:i:s', strtotime($value));



     }   
    
    
}
