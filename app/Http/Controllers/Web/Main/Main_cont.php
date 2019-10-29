<?php

namespace App\Http\Controllers\Web\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Section;
class Main_cont extends Controller
{
    public function index(){
      $section=Section::all();
      $arr['sections']=$section;
    
      return view('Web.Main.Main_view',$arr);
    }
}
