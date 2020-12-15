<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class quantri extends  Authenticatable
{
    //
    protected $table ="quantri";

    use Notifiable;

    protected $fillable = [

     'username','password','truycap','created_at','updated_at',

 ];
 protected $hidden = [

    'password', 'remember_token',

];




            public function lichSuTruyCap(){
              return $this->hasManey('App\lichSuTruyCap','id_user','id');
            }

            public function hoSoTiepNhanGiaiQuyet(){
                return $this->hasManey('App\hoSoTiepNhanGiaiQuyet','canBoTiepNhan','id');
            }

            public function phongban(){
                return $this->belongsTo('App\phongBan','phongBan','id');
            }


}
