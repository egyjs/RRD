<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \App\User as User;

function hasRole($roleName){
    $role = User::Find(auth()->user()->id)->hasAnyRole([$roleName]);
    return $role;
}

/**
 * Update Laravel Env file Key's Value
 * @param array $data
 * @return string
 */
 function envUpdate($data = array())
{
    $path = base_path('.env');

    if (file_exists($path)) {
        if (!count($data)) {
            return;
        }

        $pattern = '/([^\=]*)\=[^\n]*/';

        $envFile = $path;
        $lines = file($envFile);
        $newLines = [];
        foreach ($lines as $line) {
            preg_match($pattern, $line, $matches);

            if (!count($matches)) {
                $newLines[] = $line;
                continue;
            }

            if (!key_exists(trim($matches[1]), $data)) {
                $newLines[] = $line;
                continue;
            }

            $line = trim($matches[1]) . "=\"{$data[trim($matches[1])]}\"\n";
            $newLines[] = $line;
        }


        $newContent = implode('', $newLines);
        file_put_contents($envFile, $newContent);
        return 'Edit done:' . "replaced key value " ;


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
    return \Illuminate\Support\Facades\DB::table($tableName)->get(['title','slug']);

}

function http($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}


function username($url){
    $array = parse_url($url);
    return str_replace('/',"",$array['path']);
}

function shorter($input, $length){
    return  str_replace('&nbsp;', ' ', substr(preg_replace('#<[^>]+>#', ' ', $input), 0, $length))."...";
}

function execPrint($command) {
    try {
        $result = array();
        exec($command, $result);
        foreach ($result as $line) {
            print($line . "\n");
        }
    } catch (\Exception $e) {
        print($e);
    }
    http_response_code(200);
}
