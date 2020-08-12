<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User; //需要继承Auth认证

class Admin extends User
{
    protected $rememberTokenName = '';
}
