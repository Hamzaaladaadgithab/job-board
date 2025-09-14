<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job
{
   public static function all(){

     return [
        ["title"=> " softawer engineer " , 'salarya'=> '$2000'],

        ["title"=> " makine  engineer " , 'salarya'=> '$2500']

     ];
   }

}
