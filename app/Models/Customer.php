<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    public function setAttributes($data)
    {
      $this->name   =  $data['name'];
      $this->email  =  $data['email'];
      $this->phone  =  $data['phone'];
      $this->postal =  $data['postal'];
      $this->city   =  $data['city'];
      $this->street =  $data['street'];
      $this->house  =  $data['house'];

      if(isset($data['password']) && $data['password']) {
        $this->password = \Hash::make($data['password']);
      }
    }

    public function orders()  {
      return $this->hasMany(Orders::Class);
    }

}
