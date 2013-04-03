<?php 
	  include ('../admin/class/news.php');
	  include ('../admin/class/category.php');
	  include ('../admin/class/blog.php');
	  include ('../admin/class/otherlinks.php');
	  include ('../admin/class/dataaccess.php');
  	  include ('../admin/class/includes/image.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EthioMirror.com</title>
<link rel="stylesheet" href="2col_rightNav.css" type="text/css" />
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:10px;
	top:278px;
	width:68px;
	height:96px;
	z-index:1;
}
.style9 {
	font-size: small
}
.style16 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style18 {color: #006699}
-->
</style>
</head>
<!-- The structure of this file is exactly the same as 2col_leftNav.html;
     the only difference between the two is the stylesheet they use -->
<body>
<table width="100%" height="128" border="0">
  <tr>
    <td height="124" valign="top" background="banner_bg.jpg"><img src="banner.jpg" alt="ethiomirror" width="512" height="119" align="top" />
      <div id="globalNav">
        <?php 
  $category=new Category();
  
  $category->getCategoryForTab();
  
  ?>
        <br /><hr size="1" noshade="noshade" />
      </div></td>
  </tr>
</table>

<div id="content">
  <div id="breadCrumb">
    <div align="right"><a href="index.php">	Home</a> / <a href="#">About us</a> / <a href="#">Contact us</a> / <a href="#">Site map</a></div>
    <div align="left" class="style16">
      
          <span class="style18">
<?php 
 echo $category->getCategoryName($_REQUEST['categoryid']);
 
 ?>
&gt;&gt;<?php 
			echo $category->getSubCategoryName($_REQUEST['subcategoryid']);
 
 		?>
          </span><br />
      <br />
    </div>
    <div align="left"><a href="index.php">
      <?php 
	$category=new Category();
	$category->getSubCategory($_REQUEST['categoryid'])
	?>
    </a></div>
    <div align="left"></div>
  </div>
  <div class="feature">

    <p align="justify">
      <?php 
	  $news=new News;
	  $image=new Image();
	  $news->fetchSubCategoryNews($_REQUEST['subcategoryid']);
		?>
    </p>
  </div>
  </div>
<!-- end masthead -->
<!--end content -->
<div id="navBar">
  <div id="search">
    <form action="searchresult.php" method="post">
      <label>Search</label>
      <input name="txtsearch" type="text" size="20" id="txtsearch" />
      <input name="goButton" type="submit" value="GO" />
    </form>
  </div>
  <div class="relatedLinks">
    <h3>
      <?php 
 echo $category->getSubCategoryName($_REQUEST['subcategoryid']);
 
 ?> 
    Headlines</h3>
    <span class="style9">
    <?php 
$news=new News();

$news->fetchSubCategoryHeadlines($_REQUEST['subcategoryid']);


?>
    </span>
    <h3>Blogs</h3>
    <div id="sectionLinks">
      <ul class="style9">
        <?php
        	$blog=new Blog();
			
			$blog->getBlog();
		
		?>
      </ul>
      </div>
          <h3>Otherlinks</h3>
          <div id="sectionLinks">
            <ul class="style9">
              <?php
        	$otherlinks=new OtherLinks();
			
			$otherlinks->getOtherLink();
		
		?>
            </ul>
      </div>

    <div id="headlines">
      <h3 class="style9">Headlines</h3>
      <span class="style9">
      <?php 
$news=new News();

$news->fetchHeadlines();


?></span>
      <h3 class="style9">Other Headlines/Stories</h3>
      <span class="style9">
      <?php 
$news=new News();

$news->fetchOtherHeadlines();


?>
      </span></div>
    <p>&nbsp;</p>
  </div>
  <p>&nbsp;</p>
</div>
<!--end navBar div -->
<div id="siteInfo"> Page Designed by <img src="Clear Logo small.jpg" width="85" height="40" /> <a href="#">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact Us</a> | &copy;2007 EthioMirror.com </div>
<br />
</body>
</html>
