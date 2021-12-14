<?php

namespace App\Http\Controllers;

use App\Mail\EmailRegistrasi;
use Illuminate\Http\Request;
use \App\register;
use \App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        // if ($req->sess != null) {
        //     return redirect('/');
        // }
        // $data_register = \App\register::all();
        return view('auths.register2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // if ($req->sess != null) {
        //     return redirect('/');
        // }
        // \App\register::create($request->all());
        // return redirect('/');
        $ts = Carbon::now();
        $token = Str::random(10);
        $data = [
            'name'              => $req->post('nama'),
            'email'             => $req->post('email'),
            'password'          => $req->post('password'),
            'alamat'            => $req->post('alamat'),
            'nomor_hp'          => $req->post('nomor_hp'),
            'pekerjaan'         => $req->post('pekerjaan'),
            'role'              => 'user',
            'created_at'        => $ts,
            'updated_at'        => $ts,
            'register_token'    => $token,
        ];

        // cek apakah email sudah dipakai atau belum
        $existing_users = User::where('email', $data['email'])->get()->toArray();
        if(count($existing_users) > 0)
        {
            return redirect()->back()->with('errmsg', 'email sudah terpakai')->withInput();
        }

        User::insert($data);
        // return 'hore';
        // return view('auths.register_success');

        // kirim email
        // Mail::to($data['email'])->send(new EmailRegistrasi([
        //     'email' => $data['email'],
        //     'token' => $token,
        // ]));

        return redirect('register-success');
    }

    public function success(Request $req)
    {
        // if ($req->sess != null) {
        //     return redirect('/');
        // }
        return view('auths.register_success');
    }

    public function aktivasi(Request $req)
    {
        $email = $req->input('email');
        $kode = $req->input('token');

        $list_users = User::where([
            'email' => $email,
            'register_token' => $kode,
        ])->get()->toArray();

        if(count($list_users) > 0)
        {
            $user = $list_users[0];
            $ts = Carbon::now();
            User::where('id', $user['id'])->update([
                'updated_at' => $ts,
                'register_token' => '',
                'is_activated' => 1,
            ]);

            return redirect('/account-activated');
        }
        return redirect('/activation-failed');
    }

    public function account_activated(Request $req)
    {
        return view('auths.account_activated');
    }

    public function activation_failed(Request $req)
    {
        return view('auths.activation_failed');
    }

}
