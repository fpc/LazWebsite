<?php
/*
----
The Lazarus Homepage script is created by Adnan Shameem Sunny (Email: needadnan [at] gmail [dot] com Website: http://adnan360.blogspot.com http://lazplanet.blogspot.com)
----
- The script is provided as free and open source given that the following conditions are met and understood:
- The above message and this license should be retained in its original form derived from the author. A simple acknowledgement of the author's name in a credits page or elsewhere in the website would be nice but not required.
- You can create derivative work (new project) by informing the author.
- You cannot use this software (or part of it) in a commercial project/product.
- You can re-license the source with the permission from the author.
- The third party projects used in this project would retain their respective license.

For further clarification of the license, please contact the author.
*/

//for enabling utf-8 correctly
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_CTYPE, 'C'); ?>
<?php
// Error handling
function handle_errors ($error, $message, $filename, $line) {

//----- For reference ----//
//Value							Meaning
//---------------------------------------------
//E_ERROR =1					Runtime errors
//E_WARNING =2					Runtime warnings
//E_PARSE =4					Compile-time parse errors
//E_NOTICE =8					Runtime notices
//E_CORE_ERROR =16				Errors generated internally by PHP
//E_CORE_WARNING =32			Warnings generated internally by PHP
//E_COMPILE_ERROR =64			Errors generated internally by the Zend scripting engine
//E_COMPILE_WARNING =128		Warnings generated internally by the Zend scripting engine
//E_USER_ERROR =256				Runtime errors generated by a call to trigger_error( ) 
//E_USER_WARNING =512			Runtime warnings generated by a call to trigger_error( ) 
//E_USER_NOTICE =1024			Runtime warnings generated by a call to trigger_error( ) 
//E_ALL =30719					All of the above options

  if ($error != 8 && $error != 2 && $error != 2048 && $error != 8192) {
   ob_end_clean( );
   echo "Sorry, an error has occured. If you are the admin, please check the reason for this error.<br />";
   $msg = "Error $error : <b>$message</b> in line $line of <i>$filename</i><br />\n".$_SERVER['REQUEST_URI']."</body></html>";
      //error_log($msg, 1,
      //         "needadnan@gmail.com");
   echo "Error occured: Please let the administrator know about this issue. Email to: $error_webmaster_email";
   echo "<br /><br />".$msg;
   exit; 
  }
}
// We set the error handler function
set_error_handler('handle_errors');
ob_start( );


/* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
This is for common purpose. Every page will call it.
Prerequisite:

//////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
$cms_root_path = (defined('ABSPATH')) ? ABSPATH : './';

	// common constants for integer values (or any other type of value ;) )
	include $cms_root_path . 'home_files/include/constants.php';

	// common functions that almost every page needs
	include $cms_root_path . 'home_files/include/functions.php';

// usage:
// $mypath = CMS_ROOT . $cms_theme_path;
// $mypath = $rootdir . "/" . $cms_theme_path;
	$cms_theme_path = "home_files/themes/" . $cms_theme_dir . "/";
	include ABSPATH . "home_files/themes/" . $cms_theme_dir . "/theme_functions.php";

require(ABSPATH . "home_files/include/template_lite/class.template.php");
$tpl = new Template_Lite;
$tpl->force_compile = true;
$tpl->compile_check = true;
$tpl->cache = false;
$tpl->cache_lifetime = 3600;
$tpl->config_overwrite = false;

// chmod 700 the dir
$tpl->compile_dir = ABSPATH . "home_files/include/cache/";
$tpl->template_dir = ABSPATH . $cms_theme_path ;

$tpl->assign("page_author", WEBSITE_AUTHOR);
$tpl->assign("theme_path", $cms_theme_path);
$tpl->assign("website_domain", $website_domain);


include_once(ABSPATH . "home_files/include/constants.php");

?>