<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\register;
use \App\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_register = \App\register::all();
        return view('auths.register2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $user = new \App\user;
        // $user->role = 'calon';
        // $user->email = $request->email;
        // $user->name = $request->name;
        // $user->password = $request->password;
        // $user->save();

        // $request->request->add(['user_id'=>$user->id]);
        // $register=\App\register::create($request->all());
        // return redirect('register.register')->with('sukses','sukses');

        return response()->json(['msg' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // \App\register::create($request->all());
        // return redirect('/');
        $ts = Carbon::now();
        $data = [
            'name'          => $req->post('nama'),
            'email'         => $req->post('email'),
            'password'      => $req->post('password'),
            'alamat'        => $req->post('alamat'),
            'nomor_hp'      => $req->post('nomor_hp'),
            'pekerjaan'     => $req->post('pekerjaan'),
            'role'          => 'user',
            'created_at'    => $ts,
            'updated_at'    => $ts,
        ];
        User::insert($data);
        // return 'hore';
        // return view('auths.register_success');
        return redirect('register-success');
    }

    public function success(Request $req)
    {
        return view('auths.register_success');
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
