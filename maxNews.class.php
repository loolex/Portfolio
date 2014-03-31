<?php
/**
 * Max News
 * 
 * This is the Max News business logic class. 
 * For more details please read the readme.txt
 */
 
include ("dns/in/olympe/loolex/site.conf");
?>
<?php
class maxNews{
   var $newsDir = '/dns/in/olympe/loolex/news';
   var $newsList;
   var $newsCount = -1;
   
function getNewsList(){
	
   $this->newsList = array();
   
	// Open the actual directory
	if ($handle = @opendir($this->newsDir)) {
		// Read all file from the actual directory
		while ($file = readdir($handle))  {
		    if (!is_dir($file)) {
		       $this->newsList[] = $file;
      	}
		}
	}	
	
	rsort($this->newsList);
	
	return $this->newsList;
}   

function getNewsCount(){
   if ($this->newsCount == -1) $this->getNewsList();
   $this->newsCount = sizeof($this->newsList);
   return $this->newsCount;
}

function displayNews(){
      $list = $this->getNewsList();
      
      echo "<table class='newsList'>";
      foreach ($list as $value) {
      	$newsData = file($this->newsDir.DIRECTORY_SEPARATOR.$value);
      	$newsTitle  = $newsData[0];
         $submitDate = $newsData[1];	
         unset ($newsData['0']);
         unset ($newsData['1']);
      	
         $newsContent = "";
         foreach ($newsData as $value) {
    	       $newsContent .= $value;
         }
      	
      	echo "<tr><th align='left'>$newsTitle</th>
      	          <th class='right'>$submitDate</th></tr>";
      	echo "<tr><td colspan='2'>".$newsContent."<br/></td></tr>";
      }
      echo "</table>";
      if (sizeof($list) == 0){
         echo "<center><p>No news at the moment!</p><p>&nbsp;</p></center>";
      }
}

function displayAddForm(){
?>  
   <script language="javascript" type="text/javascript" src="js/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_align : "center",
	theme_advanced_toolbar_location : "top",

});
</script>  
  <form class="iform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    News title:<br/>
    <input type="text" name="title" size="40"/><br/><br/>
    Content:<br/>
    <textarea name="newstext" rows="15" cols="67"></textarea><br/>
    <center><input type="submit" name="submit" value="Save" /></center>
  </form> 
   
<?php   
}

function insertNews(){
   $newsTitel   = isset($_POST['title']) ? $_POST['title'] : 'Untitled';
   $submitDate  = date('Y-m-d g:i:s A');
   $newsContent = isset($_POST['newstext']) ? $_POST['newstext'] : 'No content';
   
   $filename = date('YmdHis');
   if (!file_exists($this->newsDir)){
      mkdir($this->newsDir);
   }
   $f = fopen($this->newsDir.DIRECTORY_SEPARATOR.$filename.".txt","w+");         
   fwrite($f,$newsTitel."\n");
   fwrite($f,$submitDate."\n");
   fwrite($f,$newsContent."\n");
   fclose($f);

   header('Location: ../blog.php');   //($baseurl . '/blog.php');
   
}
}
?>