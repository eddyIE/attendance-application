<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginView(Request $request)
    {
        dump("ĐÂY LÀ REQUEST");
        if ($request->session()->has('id') && $request->session()->has('name')) {
        // if (true) {
            dump("true");
            dump($request->session()->get('id'));

            return redirect()->route('index');
        } else {
            dump($request->session()->all());
            dump("No Session");
            return view('login');
        }
    }

    public function authenticate(Request $request)
    {
        $username = $request->get('username');
        $password = md5($request->get('password'));

        $user = Login::authenticate($username, $password); //calling query from Model: Login

        if (count($user) == 1) { //check if query returns 1 record
            $request->session()->put('id', $user[0]->id);
            $request->session()->put('name', $user[0]->name);
            $request->session()->save();

            dump("ĐÂY LÀ AUTHENTICATE");
            dump($request->session()->get('name'));
            return redirect('/index');
        } else {
            return back();
            // return redirect('/index');
        }
    }

    public function logOut(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login');
    }
}