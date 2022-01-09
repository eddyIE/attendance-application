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
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->get('username');
        $password = md5($request->get('password'));

        $user = Login::authenticate($username, $password); //calling query from Model: AdminAuthenticate

        if (count($user) == 1) {
            $request->session()->put('id',$user[0]->id);
            $request->session()->put('name',$user[0]->name);
            $request->session()->put('role',$user[0]->role);

            switch ($user[0]->role) {
                case 0:
                    return redirect()->route('index');
                    break;
                case 1:
                    return redirect()->route('admin');
                    break;
            }
        }
        return view('login');
    }

    public function logOut(Request $request) {
        $request->session()->flush();

        return redirect()->route('login');
    }
}
