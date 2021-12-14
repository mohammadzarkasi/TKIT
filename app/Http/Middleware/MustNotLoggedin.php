<?php

namespace App\Http\Middleware;

use App\MySession;
use Carbon\Carbon;
use Closure;

class MustNotLoggedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cookieName = 'mysession';
        $cookieVal = $request->cookie($cookieName);

        $skrg = Carbon::now();
        $exp = Carbon::now()->addDays(-2);
        MySession::where('updated_at', '<', $exp)->delete();
        MySession::where('updated_at', null)->delete();

        $list_sess = MySession::where('token', $cookieVal)->get()->toArray();

        if (count($list_sess) > 0) {
            // $sess = $list_sess[0];
            // $sess2 = json_decode($sess['extra'], true);
            // $sess2['id_user'] = $sess['id_user'];
            // $sess2['token'] = $sess['token'];

            // $request->merge(['sess' => $sess2]);

            return redirect('/')->with('msg', 'Anda telah login');
        } else {
            // $request->merge(['sess' => null]);
        }
        return $next($request);
    }
}
