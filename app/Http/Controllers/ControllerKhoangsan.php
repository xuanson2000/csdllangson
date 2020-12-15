<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ControllerKhoangsan extends Controller
{
    //
    public function index(){
     
     return view('main.index');
      
    }
    
      public function doanhnghiep(){
     
     return view('main.congty');
      
    }

    public function phongban(){

    	return view('main.phongban');

    }
    
    public function chucvu(){

    	return view('main.chucvu');

    }

    

     public function thamdo(){

    	return view('main.thamdo');

    }

    

    public function chitietthamdo(){

    	return view('main.chitietthamdo');

    }

    
     public function addhosothamdo(){

    	return view('main.addhosothamdo');

    }
    

     public function loaikhoangsan(){

      return view('main.loaikhoangsan');

    }
    
      public function nhomkhoangsan(){

      return view('main.nhomkhoangsan');

    }

     public function pheduyettruluong(){

      return view('main.pheduyettruluong');

    }

    
    public function chitietkhaithac(){

      return view('main.chitietkhaithac');

    }


    

     public function chinhsuahosocapphepkhaithac(){

      return view('main.chinhsuahosocapphepkhaithac');

    }
    

    
    
    public function biendongkhoangsan(){

      return view('main.biendongkhoangsan');

    }



    
    public function dlmo(){

      return view('main.dlmo');

    }

    


    public function nopngansach(){

      return view('main.nopngansach');

    }
    
    public function dldongmo(){

      return view('main.dldongmo');

    }

    public function dlcamhanche(){

      return view('main.dlcamhanche');

    }

    public function dlvungquyhoachkhaithac(){

      return view('main.dlvungquyhoachkhaithac');

    }


    public function dldieutra(){

      return view('main.dldieutra');

    }

    public function coquancapphep(){

      return view('main.coquancapphep');

    }

     public function hosogiaiquyet(){

      return view('main.hosogiaiquyet');

    }
    
    
    public function thuedat(){

      return view('main.thuedat');

    }
    
    public function vanbanphapquy(){

      return view('main.vanbanphapquy');

    }

    
       public function bando(){

      return view('main.bando');

    }

}
