<?php
/**
 * Created by PhpStorm.
 * User: Elzahaby
 * Date: 07/19/2018
 * Time: 08:47 ص
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Functions
{

    public function shorter($input, $length)
    {
        return  str_replace('&nbsp;', ' ', substr(preg_replace('#<[^>]+>#', ' ', $input), 0, $length))."...";
    }

    public static function search($in, $data = array()){
        $input = preg_quote($in, '~'); // don't forget to quote input string!
        if(in_array($in,$data)){
            $result = $in;
        }else{
            $result = preg_grep('~' . $input . '~', $data);
        }
        return $result;
    }

    // content:

    public static function getImgFromString($html){
        preg_match_all('/<img[^>]+>/i',$html, $result);
        $imgs = array();
        $i = 0;
        foreach( $result[0] as $img_tag)
        {
            preg_match_all('/(src|data-filename)="([^"]+)"/i',$img_tag, $imgs[$i]);
            $i++;
        }
        $res = [];
        foreach ($imgs as $i => $img){
            unset($img[0]);
            unset($img[1]);
            // dd($img);
            if (count($img[2]) <2):
                [$key,$value] = array_divide(['src'=>$img[2][0]]);
                $res[] = array("src"=>$img[2][0]);
            else:
                $res[] = array("src"=>$img[2][0],"data-filename"=>$img[2][1]);
            endif;
        }
        return $res;
    }

    public static function upload($thepath,$imgsArray) {
        $urls = [];
        foreach ($imgsArray as $imgs){
            if(count($imgs) < 2 || filter_var($imgs['src'],FILTER_VALIDATE_URL)):
                $urls[] = $imgs['src'];
            else:
                $path = $thepath.rand(100,9999).'_'.$imgs['data-filename'];
                $img = preg_replace("#data:image/[^;]+;base64,#",'',$imgs['src']);
                $img = str_replace(' ','+',$img);
                $img = base64_decode($img);
                Storage::disk('public')->put($path,$img,'public');
                $urls[] = asset('storage/'.$path);
            endif;
        }
        return $urls;
    }


    public static function userTimezone()
    {
        $api_url = config("app.timezone_api") . Request::ip() . '/json/';
        $ipInfo = file_get_contents($api_url);

        $ipInfo = json_decode($ipInfo);
        $userTimeZone = $ipInfo->timezone;
        return $userTimeZone;
    }

    // DB:
    public function user($id){
        $usr = User::find($id);
        return $usr;
    }

    public static function xss_clean($data){
    // Fix &entity\n;
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do
        {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

    // we are done...
        return $data;
    }
    public static function get($in,$by,$val,$items = 1){
        if ($items > 1):
            $data = $in::where($by,$in)->get();
        else:
            $data = $in::where($by,$in)->get();
        endif;
        return $data;
    }
}

