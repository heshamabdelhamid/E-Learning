<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

 protected $table = "categories";
 protected $fillable = [
              "name",
              "description",
   ];



public function books(){

	return $this->hasMany(Book::class,'category_id','id');
}


    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y h:m:s', strtotime($value));
    }

 

  public function getUpdatedAtAttribute($value)
  
    {
        return date('d-m-Y h:m:s', strtotime($value));

       } 
    

}
