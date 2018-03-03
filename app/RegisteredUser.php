<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisteredUser extends Model
{
	use SoftDeletes;
    protected $fillable = ['user_name','user_phone_number','user_email','user_password','user_image','user_type'];

    protected $dates = ['deleted_at'];
}
