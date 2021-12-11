<?php

namespace App\Http\Controllers;

use App\MySession;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        if ($req->sess != null) {
            return redirect('/');
        }
        return view('auths.login');
    }

    public function logout(Request $req)
    {
        if ($req->sess != null) {
            $token = $req->sess['token'];
            MySession::where('token', $token)->delete();
        }

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        if ($request->sess != null) {
            return redirect('/');
        }

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

        if ($user['password'] == $pass) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
