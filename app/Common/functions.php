<?php

if (!function_exists('callback')) {
    function callback($code)
    {
        $callback = config('returnCode.callback');

        return array('code' => $code, 'message' => $callback[$code]);
    }
}

if (!function_exists('clean_xss')) {
    function clean_xss(&$string, $low=true)
    {
        if (!is_array($string)) {
            $string = trim($string);
            //$string = strip_tags ( $string );
            $string = htmlspecialchars($string);
            if ($low) {
                return true;
            }
            $string = str_replace(array('"', "\\", "'", "/", "..", "../", "./", "//"), '', $string);
            $no = '/%0[0-8bcef]/';
            $string = preg_replace($no, '', $string);
            $no = '/%1[0-9a-f]/';
            $string = preg_replace($no, '', $string);
            $no = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
            $string = preg_replace($no, '', $string);

            return true;
        }
        $keys = array_keys($string);
        foreach ($keys as $key) {
            clean_xss($string[$key]);
        }
    }
}

//fsocket模拟get提交
if (!function_exists('async_sock_get')) {
    function async_sock_get($url, $query=array())
    {
        $query_str = http_build_query($query);

        $info = parse_url($url);
        $port = isset($info['port']) ? $info['port'] : 80;
        $query_str = empty($info["query"]) ? $query_str : $info["query"] . '&' . $query_str;

        $fp = fsockopen($info["host"], $port, $errno, $errstr, 8);
        if (!$fp) {
            return false;
        }
        //$head = "GET ".$info['path']."?".$info["query"]." HTTP/1.0\r\n";
        $head = "GET " . $info['path'] . "?" . $query_str . " HTTP/1.0\r\n";
        $head .= "Host: " . $info['host'] . "\r\n";
        $head .= "Connection: Close\r\n\r\n";
        stream_set_blocking($fp, true);
        stream_set_timeout($fp, 1);
        fwrite($fp, $head);
        usleep(1000);
        fclose($fp);

        return true;
    }
}

//fsockopen模拟POST
if (!function_exists('async_sock_post')) {
    function async_sock_post($url, $data=array())
    {
        $query = http_build_query($data);
        $info = parse_url($url);
        $fp = fsockopen($info["host"], 80, $errno, $errstr, 8);
        $head = "POST " . $info['path'] . "?" . $info["query"] . " HTTP/1.0\r\n";
        $head .= "Host: " . $info['host'] . "\r\n";
        $head .= "Referer: http://" . $info['host'] . $info['path'] . "\r\n";
        $head .= "Content-type: application/x-www-form-urlencoded\r\n";
        $head .= "Content-Length: " . strlen(trim($query)) . "\r\n";
        $head .= "Connection: Close\r\n\r\n";
        stream_set_blocking($fp, true);
        stream_set_timeout($fp, 1);
        fwrite($fp, $head);
        usleep(1000);
        fclose($fp);

        return true;
    }
}


/**
 * XML编码
 * @param mixed $data 数据
 * @param string $root 根节点名
 * @param string $item 数字索引的子节点名
 * @param string $attr 根节点属性
 * @param string $id 数字索引子节点key转换的属性名
 * @param string $encoding 数据编码
 * @return string
 */
if (!function_exists('data_to_xml')) {
    function data_to_xml($data, $item='item', $id='id')
    {
        $xml = $attr = '';
        foreach ($data as $key => $val) {
            if (is_numeric($key)) {
                $id && $attr = " {$id}=\"{$key}\"";
                $key = $item;
            }
            $xml .= "<{$key}{$attr}>";
            $xml .= (is_array($val) || is_object($val)) ? data_to_xml($val, $item, $id) : $val;
            $xml .= "</{$key}>";
        }

        return $xml;
    }
}

/**
 * 数据XML编码
 * @param mixed $data 数据
 * @param string $item 数字索引时的节点名称
 * @param string $id 数字索引key转换为的属性名
 * @return string
 */
if (!function_exists('xml_encode')) {
    function xml_encode($data, $root='think', $item='item', $attr='', $id='id', $encoding='utf-8')
    {
        if (is_array($attr)) {
            $_attr = array();
            foreach ($attr as $key => $value) {
                $_attr[] = "{$key}=\"{$value}\"";
            }
            $attr = implode(' ', $_attr);
        }
        $attr = trim($attr);
        $attr = empty($attr) ? '' : " {$attr}";
        $xml = "<?xml version=\"1.0\" encoding=\"{$encoding}\"?>";
        $xml .= "<{$root}{$attr}>";
        $xml .= data_to_xml($data, $item, $id);
        $xml .= "</{$root}>";

        return $xml;
    }
}


/**
 * 获得客户端IP
 * @return array|string
 * @author Kenn
 */
if (!function_exists('get_ip_address')) {
    function get_ip_address()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ipAddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $ipAddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $ipAddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")) {
                $ipAddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $ipAddress = getenv("HTTP_CLIENT_IP");
            } else {
                $ipAddress = getenv("REMOTE_ADDR");
            }
        }

        return $ipAddress;
    }
}

/**
 *
 * 根据php的$_SERVER['HTTP_USER_AGENT'] 中各种浏览器访问时所包含各个浏览器特定的字符串来判断是属于PC还是移动端
 * @return  BOOL
 * @author           discuz3x
 * @lastmodify    2014-04-09
 */
if (!function_exists('check_mobile')) {
    function check_mobile()
    {
        //各个触控浏览器中$_SERVER['HTTP_USER_AGENT']所包含的字符串数组
        static $touchbrowser_list = array(
            'iphone',
            'android',
            'phone',
            'mobile',
            'wap',
            'netfront',
            'java',
            'opera mobi',
            'opera mini',
            'ucweb',
            'windows ce',
            'symbian',
            'series',
            'webos',
            'sony',
            'blackberry',
            'dopod',
            'nokia',
            'samsung',
            'palmsource',
            'xda',
            'pieplus',
            'meizu',
            'midp',
            'cldc',
            'motorola',
            'foma',
            'docomo',
            'up.browser',
            'up.link',
            'blazer',
            'helio',
            'hosin',
            'huawei',
            'novarra',
            'coolpad',
            'webos',
            'techfaith',
            'palmsource',
            'alcatel',
            'amoi',
            'ktouch',
            'nexian',
            'ericsson',
            'philips',
            'sagem',
            'wellcom',
            'bunjalloo',
            'maui',
            'smartphone',
            'iemobile',
            'spice',
            'bird',
            'zte-',
            'longcos',
            'pantech',
            'gionee',
            'portalmmm',
            'jig browser',
            'hiptop',
            'benq',
            'haier',
            '^lct',
            '320x320',
            '240x320',
            '176x220'
        );
        //window手机浏览器数组【猜的】
        static $mobilebrowser_list = array('windows phone');
        //wap浏览器中$_SERVER['HTTP_USER_AGENT']所包含的字符串数组
        static $wmlbrowser_list = array(
            'cect',
            'compal',
            'ctl',
            'lg',
            'nec',
            'tcl',
            'alcatel',
            'ericsson',
            'bird',
            'daxian',
            'dbtel',
            'eastcom',
            'pantech',
            'dopod',
            'philips',
            'haier',
            'konka',
            'kejian',
            'lenovo',
            'benq',
            'mot',
            'soutec',
            'nokia',
            'sagem',
            'sgh',
            'sed',
            'capitel',
            'panasonic',
            'sonyericsson',
            'sharp',
            'amoi',
            'panda',
            'zte'
        );
        $pad_list = array('pad', 'gt-p1000');
        $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (dstrpos($useragent, $pad_list)) {
            return false;
        }
        if (($v = dstrpos($useragent, $mobilebrowser_list, true))) {
            return '1';
        }
        if (($v = dstrpos($useragent, $touchbrowser_list, true))) {
            return '2';
        }
        if (($v = dstrpos($useragent, $wmlbrowser_list))) {
            return '3'; //wml版
        }
        $brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
        if (dstrpos($useragent, $brower)) {
            return false;
        }
    }
}

if (!function_exists('dstrpos')) {
    function dstrpos($string, $arr, $returnvalue=false)
    {
        if (empty($string)) return false;
        foreach ((array)$arr as $v) {
            if (strpos($string, $v) !== false) {
                $return = $returnvalue ? $v : true;

                return $return;
            }
        }

        return false;
    }
}

/**
 * 过滤表情
 * @param $str
 * @return mixed
 */
if (!function_exists('filterEmoji')) {
    function filterEmoji($str)
    {
        $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str
        );

        return $str;
    }
}


/**
 * 格式化钱，
 * @param $fen // 单位为分
 * @return mixed
 * @version 2.6.0
 * @author Lux
 * @date 2022-09-21 15:03:28
 */
if (!function_exists('fen_format')) {
    function fen_format($fen)
    {
        if($fen == null or $fen == '') return $fen;
        return number_format($fen / 100, 2, '.', '');
    }
}
