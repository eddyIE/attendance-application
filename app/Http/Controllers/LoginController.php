<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function loginView(Request $request){
        if ($request->session()->has('id') && $request->session()->has('name')){
            return redirect()->route('index');
        } else {
            return view('login');
        }
    }

    public function authenticate(Request $request) {
        $username = $request->get('username');
        $password = md5($request->get('password'));

        $user = Login::authenticate($username, $password); //calling query from Model: Login

        if (count($user) == 1) { //check if query returns 1 record
            $request->session()->put('id',$user[0]->id);
            $request->session()->put('name',$user[0]->name);

            return redirect()->route('index');
        }
        return view('login');
    }

    public function logOut(Request $request) {
        $request->session()->flush();

        return redirect()->route('login');
    }
}
