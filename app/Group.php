<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public static function getGroupsList () {
    	return self::get()->toArray();
    }
}
