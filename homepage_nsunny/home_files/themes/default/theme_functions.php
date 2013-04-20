<?php
// Functions that are used in the theme

// does not work on all servers
// maybe requires register_gobals
// a workaround has been created in the home.php
// so, it is obsolete
function insert_randproj($params, &$tpl) {
global $cms_theme_path, $tpl;

$info_file = str_replace('\\', '/', ABSPATH . 'home_files/themes/default/randproj/info.txt');
$lines = file($info_file);
$my_line = mt_rand(0, count($lines)-1);

$info = explode('|', $lines[$my_line]);

//echo $lines[mt_rand(0, count($lines))];
//$cms_theme_path
echo $tpl->get_template_vars('theme_path');

	$html = '<a href="'.$info[1].'" target="_blank" style="text-decoration:none">
	<div class="randproj">
		<h1>Random Project</h1>
		<img src="'.$cms_theme_path.'randproj/'.$info[3].'" />
		<p>'.$info[2].'</p>
		<div class="clear"></div>
	</div>
	</a>';
	//$html='sss';

return $html;

}

?>