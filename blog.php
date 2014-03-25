<?php
include ("site.conf");
include("header.php"); 
?> 
   
         
    <body>
        <h1>Projets</h1>
        <center><p>Tout les projets que j'ai pu r&eacutealiser en centre de formation ou en stage</p></center>
 
<?php
/**
 * Max News
 * 
 * This is the Max News front end. 
 * For more details please read the readme.txt
 */

?>

<?php 
   require_once("maxNews.class.php"); 
   $newsHandler = new maxNews(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LoOL3x News</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<div id="header"><div id="header_left"></div>
	<div id="header_main">LoOL3x News</div><div id="header_right"></div></div>
    <div id="content">
         <?php $newsHandler->displayNews(); ?>
    </div>
    <div id="footer"><a href="http://www.phpf1.com" target="_blank">Powered by pro LoOL3x</a></div>
	</div>
	 <?php 
include("footer.php"); 
?>
</body>

</html> 
