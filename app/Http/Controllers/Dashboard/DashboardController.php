<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;
use App\Book;
use App\Category;


class DashboardController extends Controller
{
    

  public function index(){

  	$admin = Admin::role('admin')->get()->count();
  	$staff = Admin::role('staff')->get()->count();
  	$books = Book::get()->count();
  	$categories = Category::get()->count();


  	  return view('dashboard.welcome',compact(['admin','staff','books','categories']));
  }


}
