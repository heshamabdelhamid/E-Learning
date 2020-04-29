<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
    protected $table= 'reservations';
    protected $fillable = [
        "student_id",
		"book_id",
		"status",
		"evaluation",

    ];


    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y h:m:s', strtotime($value));;
    }

 

  public function getUpdatedAtAttribute($value)
  
    {
        return date('d-m-Y h:m:s', strtotime($value));;
    }


   public function student(){

    	return $this->belongsTo(Student::class,'student_id','id');
    } 

  public function book(){

    	return $this->belongsTo(Book::class,'book_id','id');
    } 


}
