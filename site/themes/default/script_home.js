var OSName="Unknown OS";
if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
if (navigator.appVersion.indexOf("PPC Mac OS")!=-1) OSName="MacOS PowerPC";
if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";

function e(eel) {
	return document.getElementById(eel);
}

function ShowDlMenu(ev) {
  var dlmnu = e("dl_menu");

  if (dlmnu.style.display != 'none') { 
    dlmnu.style.display = 'none';
    document.onclick=null;
  } else { 
    dlmnu.style.display = ''; 
    document.onclick=HideDlMenu;
  }

  var event = ev || window.event;
  event.cancelBubble=true;
  if (event.stopPropagation){
    event.stopPropagation();
  }

  return 1;
}

function HideDlMenu() {
  e("dl_menu").style.display = 'none';
  document.onclick=null;
}

function GetDlOSName() {
document.write("| <a href=\"javascript:void(0)\" onclick=\"ShowDlMenu(arguments[0]);\" onblur=\"\">Other &#x25BC;</a>");
}


window.onload = function() {
}
