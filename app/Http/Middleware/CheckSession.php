<?php

namespace App\Http\Middleware;

use App\MySession;
use Carbon\Carbon;
use Closure;
use PhpParser\JsonDecoder;

class CheckSession
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

        if (empty($cookieVal) == true) {
            return redirect('/login');
        }

        $list_sess = MySession::where('token', $cookieVal)->get()->toArray();

        if (count($list_sess) < 1) {
            return redirect('/login');
        }
        $sess = $list_sess[0];

        $sess_ts = new Carbon($sess['updated_at']);
        $selisih = $skrg->diffInMinutes($sess_ts);

        if ($selisih > 10) {
            MySession::where('id', $sess['id'])->update(['updated_at' => $skrg]);
        }

        $sess2 = json_decode($sess['extra'], true);
        $sess2['id_user'] = $sess['id_user'];
        $sess2['token'] = $sess['token'];

        $request->merge(['sess' => $sess2]);

        return $next($request);
    }
}
