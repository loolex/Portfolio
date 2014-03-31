<?php
/**
 * Max News
 * 
 * This is the Max News administration panel. 
 * For more details please read the readme.txt
 */
 
include ("../site.conf");
?> 

<?php
require_once ('/dns/in/olympe/loolex/maxNews.class.php'); 
$newsHandler = new maxNews();  
if (!isset($_POST['submit'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>LoOL3x News - Admin panel</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<div id="header"><div id="header_left"></div>
	<div id="header_main">LoOL3x News - Admin panel</div><div id="header_right"></div></div>
    <div id="content">
      <?php $newsHandler->displayAddForm(); ?>     
    </div>
    <div id="footer"><a href="http://www.phpf1.com" target="_blank">Powered by Pro LoOL3x</a></div>
</div>
</body>
</html> 

<?php 
} else {
   $newsHandler->insertNews();
}
?>