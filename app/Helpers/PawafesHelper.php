<?php

namespace App\Helpers;

class PawafesHelper
{
    public static function getUrlForPosition($current, $position){
        $data = parse_url($current);

        // query 配列化
        $queryArray = isset($data['query']) ? explode('&', $data['query']) : array();
        $newQueryArray = array();
        foreach ($queryArray as $queryData) {
            $newQueryArray[explode('=', $queryData)[0]] = explode('=', $queryData)[1];
        }
        $newQueryArray['p'] = $position;

        return self::makeUrl($data['path'], $newQueryArray);
    }

    public static function makeUrl($path, $query){
        $ret = '';
        $ret .= $path;
        if(!empty($query)){
            $tmp = array();
            foreach($query as $key => $value){
                array_push($tmp,$key . '=' . $value);
            }
            $ret .= '?' . implode('&', $tmp);
        }
        return $ret;
    }
}
