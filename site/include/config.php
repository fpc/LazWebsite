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

//---- Website basic information ----
define("WEBSITE_NAME", 'Lazarus', true);
define("WEBSITE_FULLNAME", 'Lazarus IDE', true);
define("WEBSITE_AUTHOR", 'Lazarus Team', true);

$error_webmaster_email = 'lazarus@freepascal.org';

// the homepage filename (formerly 'home.php')
$home_php_name = 'index.php';


//------ Download Information (Link/version/mirror...) -----//
//--- versions ---
$dl_latest_version_lazarus = '1.0.10';
// the FPC version that is required by the latest lazarus
$dl_latest_version_fpc = '2.6.2';

//--- Direct URLs ---
// TODO: Get the direct download file path (with mirror recognition)
// Resources that could be used:
// http://www.miscdebris.net/blog/2010/04/06/use-curl-to-download-a-file-from-sourceforge-mirror/
// http://www.google.com/url?q=http%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Ffunction.curl-getinfo.php&sa=D&sntz=1&usg=AFQjCNEtR7MVQB4n7Q1b3u5iwZOFQgHyYQ

$dl_win32_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Windows%2032%20bits/Lazarus%201.0.8/lazarus-1.0.8-fpc-2.6.2-win32.exe/download';
$dl_win64_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Windows%2064%20bits/Lazarus%201.0.8/lazarus-1.0.8-fpc-2.6.2-win64.exe/download';
$dl_deb32_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Linux%20i386%20DEB/Lazarus%201.0.8/';
$dl_deb64_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Linux%20amd64%20DEB/Lazarus%201.0.8/';
$dl_rpm32_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Linux%20i386%20RPM/Lazarus%201.0.8/';
$dl_rpm64_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Linux%20x86_64%20RPM/Lazarus%201.0.8/';
$dl_mac32_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Mac%20OS%20X%20i386/Lazarus%201.0.8/';
$dl_macppc_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Mac%20OS%20X%20powerpc/Lazarus%201.0.8/';
$dl_sources_url	= 'http://sourceforge.net/projects/lazarus/files/Lazarus%20Zip%20_%20GZip/Lazarus%201.0.8/';


//---- SMF Board Number / Index ----//

$smf_announcements_board = 18;
// This is for post/thread/topic links
// This is if, someday the index.php changes its name!
// (Maybe unncessary because SSI.php automatically detects
// the post/thread urls containing index.php)
// TODO: implement (if required)
$smf_index = 'http://www.lazarus.freepascal.org/index.php';
// This is for the forum home page link
$smf_home = 'http://www.lazarus.freepascal.org/index.php?action=forum';
// the path for SMF's SSI.php
$smf_ssi = 'forum/SSI.php';

// We don't need this for an international site
// Let the server return the time as it is
//date_default_timezone_set('Asia/Dhaka');


// -- Absolute path to the Software directory. -- //
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(dirname(__FILE__)) . '/');

// Which theme do we want to use?
// theme directory is located on themes
$cms_theme_dir = "default";

// Get the website domain
$website_domain = 'http://' . $_SERVER['HTTP_HOST'];

// ----: ACP Settings :---- //

// --- Pagination --- //
//$items_per_page = 10; // in case of pagination

?>