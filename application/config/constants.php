<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

if( $_SERVER['HTTP_HOST'] == 'localhost' ) {
	$base_url = 'http://localhost/mycoinstation/';
}else {
	$base_url = 'https://mycoinstation.com/';
}

define('BASE_URL_ADMIN',$base_url.'admin/');
define('BASE_URL_SHOP',$base_url.'shop/'); 
define('BASE_URL_MERCHANT',$base_url.'merchant/');
define('BASE_URL_HOME',$base_url.'home/'); 
define('BASE_URL_HOME_ADS',$base_url.'ads/'); 
define('BASE_URL',$base_url); 

define('BASE_URL_ADS',$base_url.'Adsuser/');


define('ADMIN_VIEW','admin/');
define('SHOP_VIEW','shop/');
define('MERCHANT_VIEW','merchant/');
define('ADS_VIEW','adsuser/');
define('HOME_VIEW','home/');
define('HOME_ADS_VIEW','home/ads/');


define('HEADER_SLIDER_UPLOADS','uploads/header_slider/');
define('IMAGE_UPLOADS','uploads/image/');
define('VIDEO_UPLOADS','uploads/video/');
define('PDF_UPLOADS','uploads/pdf/');
define('GALLERY_UPLOADS','uploads/gallery/');
define('PRODUCTS_UPLOADS','uploads/image/');

//DB FIELDS - DYNAMIC SECTION 
define('HOME_INFORMATION','home_information');
define('ABOUT','about');

// Sent Mail Constant..
define('SMTP_USER','My Coin Station');
define('SMTP_FROM','mycoinstation@gmail.com');
define('SMTP_PASS','mycoin.3011');
define('SMTP_HOST','smtp.googlemail.com'); // remove ssl
define('SMTP_PORT','587'); //if not ssl then '587'

//module name in database table (module)
define('IMAGEMASTER','imagemaster');
define('VIDEOMASTER','videomaster');
define('LINKMASTER','linkmaster');
define('APPLINKMASTER','applinkmaster');
define('USERMASTER','usermaster');
define('MERCHANT','merchant');
define('ADSUSER','adsuser');
define('SHOP','shop');
define('AREA','area');
define('NOTIFICATION','notification');
define('AREA_REPORT','area_report');
define('REPORT','report');
define('ADS','ads');
define('BANNER','banner');
define('COMPANY_INFO','company_info');
define('SEND_MAIL','send_mail');
define('NON_USER','non_user');
define('DRAW','draw');

// GUJARAT STATE ID.
define('GUJARAT_STATE_ID','10');
// SMS Send Number

//define('ORDER_SMS_NUMBER',['9824229044','9099304119']);

define('ORDER_SMS_NUMBER',['9664787091','9825958214']);


// Payumoney ....
// define('MERCHANT_KEY','nB8g1kiE');
// define('SALT','LfGmdQWR3d');
// define('ACTION','https://secure.payu.in');


define('MERCHANT_KEY','QORWpKqR');
define('SALT','oqUGb5fSOR');
define('ACTION','https://secure.payu.in');

//for live change action  https://secure.payu.in https://test.payu.in

// tawk.to name : vhishpa enterprise Email : mycoinstation@gmail.com Pass : mycoin@vhishpa@98

// SMS API

define('SMS_USERNAME','9662300888');
define('SMS_PASSWORD','b126114cffa94d71bc5eceb754a5d125');
define('SMS_SENDERID','MYCOIN');
define('SMS_OTP',' is OTP for Signup. VHISHPA ENTERPRISE  www.Mycoinstation.com');

