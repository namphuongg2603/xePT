<?php

/**
 * debug
 **/
function dd($data)
{

    echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
    echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

    $debug_backtrace = debug_backtrace();
    $debug = array_shift($debug_backtrace);

    echo '<div>File: ' . $debug['file'] . '</div>';
    echo '<div>Line: ' . $debug['line'] . '</div>';

    if (is_array($data) || is_object($data)) {
        print_r($data);
    } else {
        var_dump($data);
    }
    echo '</pre>';
    die;
}

/**
 * tao slug
 **/

function to_slug($str)
{
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}

if (!function_exists('xss_clean')) {
    function xss_clean($data)
    {
        // Fix &entity\n;
        $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
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

        do {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        } while ($old_data !== $data);

        // we are done...
        return $data;
    }
}
/**
 * get input
 */

function getInput($string)
{
    return isset($_GET[$string]) ? $_GET[$string] : '';
}


/**
 * post Input
 */

function postInput($string)
{
    return isset($_POST[$string]) ? $_POST[$string] : '';
}


function base_url()
{
    return $url = "http://localhost/ABC/xehaidang/";
}

function public_admin()
{
    return base_url() . "public/admin/";
}

function public_frontend()
{
    return base_url() . "public/frontend/";
}

function modules($url)
{
    return base_url() . "admin/modules/" . $url;
}

function uploads()
{
    return base_url() . "public/uploads/";
}

if (!function_exists('redirectStyle')) {
    function redirectStyle($url = "")
    {
        header("location: " . base_url() . "{$url}");
        exit();
    }
}


/**
 *  redirect về các trang
 */
if (!function_exists('redirectAdmin')) {
    function redirectAdmin($url = "")
    {
        header("location: " . base_url() . "admin/modules/{$url}");
        exit();
    }
}


/**
 *  redirect về các trang
 */
if (!function_exists('redirect')) {
    function redirect($url = "")
    {
        header("location: " . base_url() . $url);
        exit();
    }
}

function formatPrice($number)
{
    $number = intval($number);
    return $number = number_format($number, 0, ',', '.');
}

function formatPriceSale($number, $sale)
{
    $number = intval($number);
    $sale = intval($number);
    $price = $number - ($number * $sale) / 100;
    return formatPrice($price);
}

function cutString($string = '', $size = 600, $link = '...')
{
    $string = strip_tags(trim($string));
    $strlen = strlen($string);
    $str = substr($string, $size, 20);
    $exp = explode(" ", $str);
    $sum = count($exp);
    $yes = "";
    for ($i = 0; $i < $sum; $i++) {
        if ($yes == "") {
            $a = strlen($exp[$i]);
            if ($a == 0) {
                $yes = "no";
                $a = 0;
            }
            if (($a >= 1) && ($a <= 12)) {
                $yes = "no";
                $a;
            }
            if ($a > 12) {
                $yes = "no";
                $a = 12;
            }
        }
    }
    $sub = substr($string, 0, $size + $a);
    if ($strlen - $size > 0) {
        $sub .= $link;
    }
    return $sub;
}

function sale($number)
{
    $number = intval($number);
    if ($number < 5000000) {
        return 0;
    } else if ($number < 10000000) {
        return 5;
    } else {
        return 10;
    }

}

/**
 * @param $_SESSION
 * @param $db
 * @param $product_id
 * @return int: -1:chua login/1:fail/0:success
 */
function add_to_cart($db, $product_id, $day, $id_transaction, $datetime1, $datetime2, $code){
    if (!isset($_SESSION['name_id'])) {
        echo " <script>alert(' Bạn phải đăng nhập');location.href='index.php' </script> ";
        return false;
    };
    
    $status = 0;
    try{
        $product = $db->fetchID("product", $product_id);

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['name'] = $product['name'];
            $_SESSION['cart'][$product_id]['thunbar'] = $product['thunbar'];
            $_SESSION['cart'][$product_id]['qty'] = $day != 0 ? $day : 1;
            $_SESSION['cart'][$product_id]['price'] = ((100 - $product['sale']) * $product['price']) / 100;
            $_SESSION['cart'][$product_id]['id_transaction'] = $id_transaction;
            $_SESSION['cart'][$product_id]['datetime1'] = date("d-m-Y", strtotime($datetime1));
            $_SESSION['cart'][$product_id]['datetime2'] = date("d-m-Y", strtotime($datetime2));
            $_SESSION['cart'][$product_id]['code'] = $code;
        } else {
            $_SESSION['cart'][$product_id]['qty'] += 1;
        }
    }catch (Exception $e){
        $status = 1;
    }

    return $status;
}

function getNumberDay($dateStart, $dateEnd)
{
    $start = new DateTime($dateStart);
    $end = new DateTime($dateEnd);
    $interval = $end->diff($start);
    return $interval->d;
}

function getDay($expiryDate)
{
    $dateNow = date('Y-m-d H:i:s'); //current date
    return (strtotime($expiryDate) - strtotime($dateNow)) / (60 * 60 * 24);
}

function rand_string($db, $length){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    $str = '';
    for( $i = 0; $i < $length; $i++ ) {

        $str .= $chars[rand(0, $size - 1)];

    }
    $code = $db->fetchOne('transaction', "code = '". $str . "'");
    if ($code) {
        rand_string($db, $length);
    }
    return $str;
}

?>




