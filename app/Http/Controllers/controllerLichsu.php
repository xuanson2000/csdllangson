<?php

namespace App\Http\Controllers;
use App\lichSuTruyCap;

use Illuminate\Http\Request;


class controllerLichsu extends Controller
{
    //

    

    public function index(){

    	$lichSuTruyCaps =lichSuTruyCap::orderBy('id','DESC')->paginate(15);
 
    	return view('lichsu.index',['lichSuTruyCaps'=>$lichSuTruyCaps]);
    	unset($lichSuTruyCaps);

    }
}
