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

// -- Absolute path to the Software directory. -- //
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(dirname(__FILE__)) . '/');

//---- Website basic information ----
define("WEBSITE_NAME", 'Lazarus', true);
define("WEBSITE_FULLNAME", 'Lazarus IDE', true);
define("WEBSITE_AUTHOR", 'Lazarus Team', true);

$error_webmaster_email = 'lazarus@freepascal.org';

// the homepage filename (formerly 'home.php')
$home_php_name = 'index.php';


$copyrightyear = '2024';

//------ Download Information (Link/version/mirror...) -----//
//--- versions ---
$dl_latest_version_lazarus = '3.8';
$dl_latest_version_dir= '3.8';  // could be 1.2, for version 1.2.0
// the FPC version that is required by the latest lazarus
$dl_latest_version_fpc = '3.2.2';

// whats new link at the bottom of main page
//$wiki_changes = 'https://wiki.lazarus.freepascal.org/Lazarus_2.0.0_release_notes';
$wiki_changes = 'https://wiki.lazarus.freepascal.org/Lazarus_3.0_fixes_branch';

//--- Direct URLs ---
// TODO: Get the direct download file path (with mirror recognition)
// Resources that could be used:
// http://www.miscdebris.net/blog/2010/04/06/use-curl-to-download-a-file-from-sourceforge-mirror/
// http://www.google.com/url?q=http%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Ffunction.curl-getinfo.php&sa=D&sntz=1&usg=AFQjCNEtR7MVQB4n7Q1b3u5iwZOFQgHyYQ

$dl_base = 'https://sourceforge.net/projects/lazarus/files/Lazarus%20'; 
$dl_folder = '/Lazarus%20' . $dl_latest_version_dir . '/';

$dl_win32_url	= $dl_base . 'Windows%2032%20bits' . $dl_folder . 'lazarus-' . $dl_latest_version_lazarus . '-fpc-' . $dl_latest_version_fpc . '-win32.exe/download';
$dl_win32_url_folder	= $dl_base . 'Windows%2032%20bits' . $dl_folder . '';
$dl_win64_url	= $dl_base . 'Windows%2064%20bits' . $dl_folder . 'lazarus-' . $dl_latest_version_lazarus . '-fpc-' . $dl_latest_version_fpc . '-win64.exe/download';
//$dl_win64_url_force	= $dl_base . 'Windows%2064%20bits' . $dl_folder . 'lazarus-' . $dl_latest_version_lazarus . '-fpc-' . $dl_latest_version_fpc . '-win64.exe/download';
$dl_win64_url_folder	= $dl_base . 'Windows%2064%20bits' . $dl_folder . '';
$dl_deb32_url	= $dl_base . 'Linux%20i386%20DEB' . $dl_folder . '';
$dl_deb64_url	= $dl_base . 'Linux%20amd64%20DEB' . $dl_folder . '';
$dl_rpm32_url	= $dl_base . 'Linux%20i386%20RPM' . $dl_folder . '';
$dl_rpm64_url	= $dl_base . 'Linux%20x86_64%20RPM' . $dl_folder . '';
$dl_mac32_url	= $dl_base . 'Mac%20OS%20X%20i386' . $dl_folder . '';
$dl_mac64_url	= $dl_base . 'macOS%20x86-64' . $dl_folder . '';
$dl_macppc_url	= $dl_base . 'Mac%20OS%20X%20powerpc' . $dl_folder . '';
$dl_sources_url	= $dl_base . 'Zip%20_%20GZip' . $dl_folder . '';


//---- SMF Board Number / Index ----//

$smf_announcements_board = 18;
// This is for post/thread/topic links in the actual forum (SSI.php will use current site url as default)
$smf_index = 'https://forum.lazarus.freepascal.org/index.php';
// This is for the forum home page link
$smf_home = 'https://forum.lazarus.freepascal.org/index.php?action=forum';
// the path for SMF's SSI.php
$smf_ssi = '/var/www/sites/smf/SSI.php';

// We don't need this for an international site
// Let the server return the time as it is
//date_default_timezone_set('Asia/Dhaka');


// Which theme do we want to use?
// theme directory is located on themes
$cms_theme_dir = "default";

// Get the website domain
$website_domain = 'http://' . $_SERVER['HTTP_HOST'];

// ----: ACP Settings :---- //

// --- Pagination --- //
//$items_per_page = 10; // in case of pagination

?>
