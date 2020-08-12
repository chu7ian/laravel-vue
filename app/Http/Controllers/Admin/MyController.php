<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }

    public function changePassword()
    {

    }
}
