var OSName="Unknown OS";
if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
if (navigator.appVersion.indexOf("PPC Mac OS")!=-1) OSName="MacOS PowerPC";
if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";

function e(eel) {
	return document.getElementById(eel);
}

function ShowDlMenu() {
var dlmnu = e("dl_menu");

 if (dlmnu.style.display != 'none') { 
 dlmnu.style.display = 'none';
 } else { 
 dlmnu.style.display = ''; 
 }

}

function HideDlMenu() {
e("dl_menu").style.display = 'none';
}

function GetDlOSName() {
document.write("| <a href=\"javascript:void(0)\" onclick=\"ShowDlMenu();\" onblur=\"\">Other &#x25BC;</a>");
}


window.onload = function() {
}
