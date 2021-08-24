<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
    public function userLogin(Request $request) {

        $data = $request->input();
        $request->session()->put('email', $data['email']);
        echo session('email');
    }
}
