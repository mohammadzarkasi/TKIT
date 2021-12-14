<?php

namespace App\Http\Controllers;

use App\MySession;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        // if ($req->sess != null) {
        //     return redirect('/');
        // }
        return view('auths.login');
    }

    public function logout(Request $req)
    {
        // if ($req->sess != null) {
        $token = $req->sess['token'];
        MySession::where('token', $token)->delete();
        // }

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        // if ($request->sess != null) {
        //     return redirect('/');
        // }

        $email = $request->post('email');
        $pass = $request->post('password');

        $users = User::where([
            'email' => $email,
            'role' => 'user',
        ])->get()->toArray();

        if (count($users) < 1) {
            // return response()->json(['error' => 'username tidak ditemukan'], 401);
            return redirect()->back()->with('errmsg', 'user tidak ditemukan')->withInput();
        }
        $user = $users[0];

        if($user['is_activated'] == '0')
        {
            $msg = 'Akun Anda belum diaktivasi. Periksa petunjuk aktivasi yang telah kami kirim ke email Anda';
            return redirect()->back()->with('errmsg', $msg)->withInput();
        }

        // if ($user['password'] == $pass) {
        if (Hash::check($pass, $user['password']) == true) {
            $skrg = Carbon::now();
            $token = Str::random(10);
            MySession::insert([
                'created_at' => $skrg,
                'updated_at' => $skrg,
                'id_user' => $user['id'],
                'token' => $token,
                'extra' => json_encode($user),
            ]);

            $ck = cookie('mysession', $token, 60 * 24 * 3);
            // return response()->json(['status' => 'success'])->cookie($ck);
            return redirect('/')->withCookie($ck);
        } else {
            // return redirect()->back()->with
            return redirect('/login')->with('errmsg', 'password tidak cocok')->withInput();
        }
    }

    public function forgot_password(Request $req)
    {
        // $sess = $req->sess;
        // if ($sess != null) {
        //     return redirect('/')->with('msg', 'Anda telah login');
        // }

        return view('auths.forgot_pass');
    }

    public function do_forgot_password(Request $req)
    {
        // $sess = $req->sess;
        // if ($sess != null) {
        //     return redirect('/')->with('msg', 'Anda telah login');
        // }

        $email = $req->post('email');

        $list_users = User::where('email', $email)->get()->toArray();

        if (count($list_users) > 0) {
            $user = $list_users[0];
            $token = Str::random(5);
            $ts =  Carbon::now();
            User::where('id', $user['id'])->update([
                'updated_at' => $ts,
                'reset_pass_token' => $token,
            ]);
        }

        return redirect('/forgot-success');
    }

    public function forgot_pass_success(Request $req)
    {
        return view('auths.forgot_success');
    }

    public function reset_password(Request $req)
    {
        // $sess = $req->sess;
        // if($sess != null)
        // {
        //     return redirect('/')->with('msg', 'anda telah login');
        // }
        return view('auths.reset_password');
    }

    public function do_reset_password(Request $req)
    {
        // $sess = $req->sess;
        // if($sess != null)
        // {
        //     return redirect('/')->with('msg', 'anda telah login');
        // }

        $email = $req->post('email');
        $kode = $req->post('kode');
        $pass = $req->post('password');
        $pass2 = $req->post('password2');

        if(empty($pass) == true)
        {
            // die('password kosong');
            return redirect()->back()->with('errmsg', 'passsword tidak boleh kosong')->withInput();
        }
        if($pass != $pass2)
        {
            // die('password tidak sama');
            return redirect()->back()->with('errmsg', 'password dan ulangi password tidak cocok')->withInput();
        }

        $list_users = User::where([
            'email' => $email,
            'reset_pass_token' => $kode,
        ])->get()->toArray();

        if(count($list_users) < 1)
        {
            // die('tidak ditemukan');
            return redirect()->back()->with('errmsg', 'email dan/atau kode reset tidak ditemukan')->withInput();
        }

        $user = $list_users[0];
        $ts = Carbon::now();
        User::where('id', $user['id'])->update([
            'reset_pass_token' => '',
            'updated_at' => $ts,
            'password' => Hash::make($pass),
        ]);

        return redirect('/reset-success');
    }

    public function reset_success(Request $req)
    {
        return view('auths.reset_success');
    }

}
