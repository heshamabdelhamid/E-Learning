<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookLikes extends Model
{
    

     protected $table ='book_likes';

     protected $fillable = [

       "student_id",
       "book_id",
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
