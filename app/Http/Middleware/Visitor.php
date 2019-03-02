<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use http\Env\Request;
use Illuminate\Support\Facades\Cookie;
use \App\Visits;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle($request, Closure $next)
    {

        if ($request->hasCookie('here') or Visits::where('ip', '=',$request->ip())->exists()):
            return $next($request);
        else:
            $response = $next($request);
            $visit = new Visits();
            $visit->ip = $request->ip();

            $client = new Client();
            $req = $client->request('GET', config('app.timezone_api') . $request->ip() . '/json/');

            //$place = json_decode($req->getBody());
//
//            if (!isset($place->error)) {
//                @$visit->location = $place->country_name . ', ' . $place->region;
//            } else {
//                $visit->location = "IP is wrong";
//            }
            $visit->save();
            return $response->withCookie(Cookie::make('here', 1, 1440));
        endif;
    }
}
