<?php


function getInfo() {
    
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        //uncomment to test a specific ip
        //$ip_address = '8.8.8.8';

        $ip_get = 'http://ipinfo.io/' . $ip_address;
        if (isset($ip_address)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ip_get);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userInfo = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return ['full_info' => $userInfo, 
                'ip_address' => $ip_address];
    }
}
