<?php

namespace App\Http\Controllers;

use App\MySession;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    public function index(Request $req)
    {
        if($req->sess == null)
        {
            return view('admin.auth.login');
        }
        return redirect('/admin/home');
    }

    public function keluar(Request $req)
    {
        $sess = $req->sess;
        MySession::where('token', $sess['token'])->delete();

        return redirect('/admin');
    }

    public function do_login(Request $req)
    {
        $email = $req->post('email');
        $password = $req->post('password');

        $list_user = User::where([
            'email' => $email,
            'role' => 'admin'
        ])->get()->toArray();

        if(count($list_user) < 1)
        {
            return redirect()->back()->with('errmsg', 'user tidak ditemukan')->withInput();
        }

        $user = $list_user[0];

        if($user['password'] != $password){
            return redirect()->back()->with('errmsg', 'password tidak cocok')->withInput();
        }

        $ts = Carbon::now();
        $token = Str::random(10);

        MySession::insert([
            'created_at' => $ts,
            'updated_at' => $ts,
            'id_user' => $user['id'],
            'extra' => json_encode($user),
            'token' => $token,
        ]);

        $cki = cookie('admin-sess', $token, 60 * 24 * 2);
        return redirect('/admin/home')->cookie($cki);
    }
}
