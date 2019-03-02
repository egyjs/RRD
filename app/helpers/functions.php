<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \App\User as User;

function hasRole($roleName){
    $role = User::Find(auth()->user()->id)->hasAnyRole([$roleName]);
    return $role;
}

/**
 * Update Laravel Env file Key's Value
 * @param string $key
 * @param string $value
 * @return string
 */
 function envUpdate($name, $value)
{
    $path = base_path('.env');

    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $name . '="' . env($name).'"', $name . '="' . $value.'"', file_get_contents($path)
        ));
        file_put_contents($path, str_replace(
            $name . '=' . env($name), $name . '=' . $value, file_get_contents($path)
        ));
        return 'Edit done:' . "replaced key value $name to $value" ;

    }

}

/**
 * @param $name
 */
function loopMenu($name){
    if (substr($name, -1) != 's') {
        $name = $name."s";
    }
    $tableName = lcfirst($name);
     \Illuminate\Support\Facades\DB::table($tableName)->get(['title','slug']);
}

function http($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
