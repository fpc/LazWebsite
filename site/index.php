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

// basic configuration
include_once "./include/config.php";
// common codes to be included
include_once ABSPATH . "include/common.php";

//------------ Get the GET variables
$url_page = $_GET['page'];
if ($url_page != '') {
	if (file_exists(ABSPATH . 'pages/'.$url_page.'.html')) {
		//$url_page = $url_page;
	} else {
		$url_page = '';
	}
}

// for using the direct download links in the templates

	$tpl->assign("copyrightyear", $copyrightyear);

	$tpl->assign("dl_latest_version_lazarus", $dl_latest_version_lazarus);
	$tpl->assign("dl_latest_version_fpc", $dl_latest_version_fpc);
	
	$tpl->assign("dl_win32_url", $dl_win32_url);
	$tpl->assign("dl_win32_url_folder", $dl_win32_url_folder);
	$tpl->assign("dl_win64_url", $dl_win64_url);
	$tpl->assign("dl_win64_url_folder", $dl_win64_url_folder);
	$tpl->assign("dl_win64_url_force", $dl_win64_url_force);
	$tpl->assign("dl_deb32_url", $dl_deb32_url);
	$tpl->assign("dl_deb64_url", $dl_deb64_url);
	$tpl->assign("dl_rpi_url", $dl_rpi_url);
	$tpl->assign("dl_rpm32_url", $dl_rpm32_url);
	$tpl->assign("dl_rpm64_url", $dl_rpm64_url);
	$tpl->assign("dl_macaarch64_url", $dl_macaarch64_url);
	$tpl->assign("dl_macx86_64_url", $dl_macx86_64_url);
	$tpl->assign("dl_macppc_url", $dl_macppc_url);
	$tpl->assign("dl_sources_url", $dl_sources_url);

// Some other info from config.php

	$tpl->assign("smf_index", $smf_index);
	$tpl->assign("smf_home", $smf_home);

	$tpl->assign("home_php_name", $home_php_name);
	$tpl->assign("smf_announcements_board", $smf_announcements_board);
	$tpl->assign("smf_index", $smf_index);

	$tpl->assign("wiki_changes", $wiki_changes);


// --------- User wants homepage ------------
if ($url_page == '') {

	$tpl->assign("ishome", True);
	
	// Meta information and others
	$tpl->assign("page_title",'Lazarus Homepage');
	$tpl->assign("page_meta_description",'Lazarus is a professional open-source cross platform IDE powered by Free Pascal');
	$tpl->assign("page_meta_keywords",'free,ide,visual,programing,delphi,alternative');

	// this may add text to the body
	$mainbody = '<p>Hello!</p>';
	
	// ----------- SMF ----------------
	// we check to see if SSI.php from SMF is available
	if (file_exists($smf_ssi)) {
		require($smf_ssi);
		//re-set script url to the forum url
		$scripturl = $smf_index;
		$posts = ssi_recentPosts($num_recent = 10, $exclude_boards = null, $include_boards = null, $output_method = 'return');
		//echo '<pre>';var_dump($posts);echo '</pre>';

		$tpl->assign("recent_posts_array",$posts);

//		$posts = ssi_recentTopics($num_recent = 4, $exclude_boards = null, $include_boards = $smf_announcements_board, $output_method = 'return', $first_message = true);
        $posts = ssi_boardNews($board = $smf_announcements_board, $limit = 4, $start = null, $length = 160, $output_method = 'return');


		for ($i = 0; $i <= 3; $i++) {
//            $posts[$i]['preview'] = str_replace('  ', ' ', $posts[$i]['preview']);
            $posts[$i]['preview'] = str_replace('  ', ' ', strip_tags(strtr($posts[$i]['body'], array('<br />' => '&#10;'))));
        }

		// Assign the posts data
		$tpl->assign("recent_annc_array",$posts);

	// there is no SMF installation, so create dummy text
	} else {
		
		for ($i = 0; $i <= 9; $i++) {
			$posts[$i]['subject'] = 'Dummy announcement '.($i+1);
			$posts[$i]['short_subject'] = 'Dummy announcement '.($i+1);
			$posts[$i]['href'] = $smf_home;
			$posts[$i]['time'] = date("F d, Y, h:i:s A");
			$posts[$i]['preview'] = 'This is some dummy announcement text. This just because you do not have a SMF installation...';

		}
		
		// set the recent announcements dummy text array
		$tpl->assign("recent_annc_array",$posts);

		for ($i = 0; $i <= 3; $i++) {
			$posts[$i]['subject'] = 'Dummy post '.($i+1);
			$posts[$i]['short_subject'] = 'Dummy post '.($i+1);
			$posts[$i]['href'] = $smf_home;
			$posts[$i]['time'] = date("F d, Y, h:i:s A");
			$posts[$i]['poster'] ['name'] = "some one unknown";
			$posts[$i]['preview'] = 'This is some dummy announcement text. This just because you do not have a SMF installation...';
		
		}

		// set the recent posts dummy text array
		$tpl->assign("recent_posts_array",$posts);

	}
	
	//--------------- Random projects start
	$info_file = str_replace('\\', '/', ABSPATH . 'randproj/info.txt');
	$lines = file($info_file);
	$my_line = mt_rand(0, count($lines)-1);

	$info = explode('|', $lines[$my_line]);

	$tpl->assign("rand_proj_title",$info[0]);
	$tpl->assign("rand_proj_link",$info[1]);
	$tpl->assign("rand_proj_desc",$info[2]);
	$tpl->assign("rand_proj_img",trim($info[3]));
	//------------------ Random projects end   ///

	//-------------------- Tip of the day
	$info_file = str_replace('\\', '/', ABSPATH . 'tips.txt');
	$lines = file($info_file);
	$my_line = mt_rand(0, count($lines)-1);

	$info = explode('|', $lines[$my_line]);

	$tpl->assign("tip_of_the_day_desc",$info[0]);
	$tpl->assign("tip_of_the_day_img",$info[1]);
	//-------------------- Tip of the day end ///
	
	//---------------- Platform Detection 
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	// --- 32 bit or 64 bit detection
	if ((stripos($useragent, 'WOW64') !== false) || 
		(stripos($useragent, 'Win64') !== false) || 
		(stripos($useragent, 'x86_64') !== false) || 
		(stripos($useragent, 'x86-64') !== false) || 
		(stripos($useragent, 'x64;') !== false) || 
		(stripos($useragent, 'amd64') !== false) || //both amd64 and AMD64 are searched
		(stripos($useragent, 'x64_64') !== false) || 
		(stripos($useragent, 'ia64') !== false) || 
		(stripos($useragent, 'sparc64') !== false) || 
		(stripos($useragent, 'ppc64') !== false) || 
		(stripos($useragent, 'IRIX64') !== false)
	){
		$os_32bit = false;
		$OS_bit = '64 bit';
	} else {
		$os_32bit = true;
		$OS_bit = '32 bit';
	}

	//---- OS name detection
	$ua_osfamily = 'Unknown OS';
	$quick_download_link = $home_php_name . '?page=download';
	
	if (stripos($useragent, 'Win') !== false) {
		$ua_osfamily = 'Windows';
	} elseif (stripos($useragent, 'PPC Mac OS') !== false) {
		$ua_osfamily = 'MacOS PPC';
	} elseif (stripos($useragent, 'Mac') !== false) {
		$ua_osfamily = 'MacOS';
	} elseif (stripos($useragent, 'X11') !== false) {
		$ua_osfamily = 'Unix';
	} elseif (stripos($useragent, 'Linux') !== false) {
		$ua_osfamily = 'Linux';
	}

	// Download link and friendly OS name
	$OSName = $ua_osfamily;
	if ($ua_osfamily == 'Windows') {
		$OSName = 'Windows';
		$dl_for = $OSName;
		if ($os_32bit == true) {
			$quick_download_link = $dl_win32_url;
			$dl_for .= ' 32 bit';
		}else{
			$quick_download_link = $dl_win64_url;
			$dl_for .= ' 64 bit';
		}

/*	} elseif ($ua_osfamily == 'MacOS PPC') {
		$quick_download_link = $dl_macppc_url;
		$OSName = 'Mac OS X PowerPC';
		$dl_for = $OSName;
*/
    } elseif ($ua_osfamily == 'MacOS') {
			$quick_download_link = $dl_macaarch64_url;
			$OSName = 'macOS';
			$dl_for = $OSName;
			$dl_for .= ' 64 bit';
	} elseif (($ua_osfamily == 'Unix') || ($ua_osfamily == 'Linux')) {
		if ($os_32bit == true) 
			$quick_download_link = $dl_deb32_url;
		else
			$quick_download_link = $dl_deb64_url;

		/*if (stripos($useragent, 'Ubuntu') !== false)
			$OSName = 'Ubuntu';
		else
			$OSName = 'Unix/Linux';
*/
	}
	
	if (($ua_osfamily == 'Unix') || ($ua_osfamily == 'Linux')) {
		if (stripos($useragent, 'Debian') !== false) 
			$ua_debian = '(Debian Detected)';
		else 
			$ua_debian = '()';

		$dl_for = 'Debian ';
		if ($os_32bit == true) {
			$dl_for .= '32 bit';
			$rpm_link= $dl_deb32_url; // $dl_rpm32_url;
		} else {
			$dl_for .= '64 bit';
			$rpm_link= $dl_deb64_url; // $dl_rpm64_url;
		}
		
		$dl_for .= ' <a href="'.$rpm_link.'">Try DEB?</a>';
	/*} else if ($ua_osfamily == 'Windows') {
		
	} else {
		$dl_for = $OSName;*/
	}
	
	$tpl->assign("test", $OSName.' '.$ua_debian.'| ' . $OS_bit . ' | '. urldecode($quick_download_link).'<br />'.'For '.$dl_for);
	
	$tpl->assign("platform_download_link", $quick_download_link);
	$tpl->assign("platform_download_for", 'Version '.$dl_latest_version_lazarus.' for '.$dl_for);

	//---------------- Platform detection ///

} else {


	// General Info
	$tpl->assign("page_title",'Lazarus');
	$tpl->assign("page_meta_description",'Lazarus is a professional open-source cross platform IDE powered by Free Pascal');
	$tpl->assign("page_meta_keywords",'free,ide,visual,programing,delphi,alternative');


	$tpl->assign("ishome", False);
	$tpl->assign("page_content_file", './pages/'.$url_page.'.html');
	
}
	
$tpl->assign("doc_content",$mainbody);
//$tpl->assign("sidebar_content",$sidebarbody);

$tpl->display("main.html");

?>
