<?php
session_start();

require_once('includes/wdg/WDG.php');

	
	include('class/dataaccess.php');
	include('class/category.php');
	include('class/section.php');
	include('class/news.php');
	include('class/reporters.php');
	
	$category=new Category();
	$section=new Section();
	$news=new News();
	$reporter=new Reporters();
	
	
	if (isset($_SESSION['valid_user']) && $_SESSION['isadmin']==1)
	{
		$fullname = $HTTP_SESSION_VARS['fullname'];
	}
	else
	  	echo "<script>window.location.href='login.php?ermsg=You do not have permission to access this page'</script>";
	  
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content management ::: Ethiomirror ::: Reporters</title>
<style type="text/css">
<!--
.style11 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12pt;
	text-align: justify;
	font-weight: bold;
	color: #FFFFFF;
}
#apDiv1 {
	position:absolute;
	left:236px;
	top:59px;
	width:512px;
	height:122px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:309px;
	top:305px;
	width:363px;
	height:174px;
	z-index:1;
}
.style18 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}
.style19 {font-size: 12px; color: #859AD3;}
.style21 {font-size: 12pt; text-align: justify; color: #FFFFFF; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style22 {
	color: #666666;
	font-size: 12px;
}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style23 {font-size: 10px}
.style26 {font-size: 9px}
.style27 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.tableboarder {
	border: 100% dashed #999999;
}
-->
</style>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="includes/resources/calendar.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
<!--
.style33 {font-size: 12px; font-weight: bold; }
.style38 {font-size: small}
.style8 {font-family: tahoma}
.style40 {font-size: 12px; font-weight: bold; color: #0066FF; }
.style2 {color: #969685;
	font-size: 9px;
	font-family: tahoma;
}
.style24 {font-size: 12px; }
.style30 {	font-family: Verdana, Arial, Helvetica, sans-serif
}
.style7 {color: #333333; font-size: 10px; font-family: tahoma; }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
function confirmAction(delUrl)
{
  if (confirm("You are about to publish the news do you want to continiue?"))
  {
    document.location = delUrl;
  }
}

function confirmDelete(delUrl)
{
  if (confirm("Are you sure you want remove this reporter?"))
  {
    document.location = delUrl;
  }
}

function resetForm()
{

	document.form1.hidreporterid.value=0;
	document.form1.txtreportername.value="";
	document.form1.txttelephone.value="";
	document.form1.txtaddress.value="";
	document.form1.txtemail.value="";
	document.form1.txtlocation.value="";
	
	

}
</script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<?php 



if($_REQUEST['action']=="fetch")
{
	$editreporter=array($_REQUEST['reporterid'],$_REQUEST['fullname'],$_REQUEST['telephone'],$_REQUEST['address'],$_REQUEST['email'],$_REQUEST['location']);
}
if($_REQUEST['action']=="addnew")
{
	$reporter->id=$_POST['hidreporterid'];
	$reporter->fullname=$_POST['txtreportername'];
	$reporter->tel=$_POST['txttelephone'];
	$reporter->address=$_POST['txtaddress'];
	$reporter->email=$_POST['txtemail'];
	$reporter->location=$_POST['txtlocation'];
	
	

	
	$reporter->saveReporter();		
	echo "<script>window.location.href='reporters.php'</script>";
}
if($_REQUEST['action']=="remove")
{

	
	$reporter->id=$_REQUEST['id'];
	
	$reporter->deleteReporter();
	echo "<script>window.location.href='reporters.php'</script>";

	
}


?>
<body>
<table width="100%" height="644" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="122" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="19" align="left"><table width="50%" height="21" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="7%"><strong><span class="style11"><span class="style19">Welcome </span></span></strong></td>
                  <td width="8%">&nbsp;</td>
                  <td width="85%" align="left"><span class="style21"><span class="style22"> <?php echo $fullname;?></span></span></td>
                </tr>
              </table></td>
              <td align="right"><table width="200" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="123" align="right"><span class="style18 style26"><a href="logout.php">LOGOUT</a></span></td>
                    <td width="20" align="center"><span class="style18 style23">|</span></td>
                    <td width="57" align="right"><span class="style18 style26"><a href="settings.php">SETTINGS</a></span></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="122" colspan="2" align="center" background="images/banner_bg.jpg"><img src="images/banner.jpg" width="512" height="122" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="73%" height="18" align="left">&nbsp;</td>
        <td width="27%" align="right"><span class="style27"><?php echo date('jS F, Y');?></span></td>
        </tr>
      <tr>
        <td height="135" colspan="2" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14%" rowspan="2" valign="top"><?php 
			if($_SESSION['isadmin']==1)
				include('menu.php');
            else
            	include('usermenu.php');?>              &nbsp;</td>
            <td height="134">&nbsp;</td>
            <td valign="top"><form id="form1" name="form1" method="post" action="reporters.php?action=addnew">
              <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                <tr bgcolor="#CB9F94">
                  <td colspan="6" bgcolor="#B7C7F8"><div align="center"><span class="style11">Add Reporters</span></div></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="left" valign="bottom" class="style7">&nbsp;</td>
                  <td width="86%" height="17" colspan="4" align="left" valign="bottom" class="style7"><input name="hidreporterid" type="hidden" id="hidreporterid" value="<?php echo $editreporter[0]; ?>" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Full name</span><span class="style24">:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><span id="sprytextfield1">
                    <input name="txtreportername" type="text" id="txtreportername" value="<?php echo $editreporter[1]; ?>" size="40" />
                    <span class="textfieldRequiredMsg">Required value</span> </span></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Telephone:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><input name="txttelephone" type="text" id="txttelephone" value="<?php echo $editreporter[2]; ?>" size="40" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Address:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><input name="txtaddress" type="text" id="txtaddress" value="<?php echo $editreporter[3]; ?>" size="40" /></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">E-mail</span><span class="style24">:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><span id="sprytextfield2">
                  <input name="txtemail" type="text" id="txtemail" value="<?php echo $editreporter[4]; ?>" size="40" />
                  <span class="textfieldInvalidFormatMsg">Invalid e-mal format.</span></span></td>
                </tr>
                <tr>
                  <td height="17" colspan="2" align="right" valign="middle" class="style7"><span class="style24">Location</span><span class="style24">:</span></td>
                  <td height="17" colspan="4" align="left" valign="middle" class="style7"><input name="txtlocation" type="text" id="txtlocation" value="<?php echo $editreporter[5]; ?>" size="40" /></td>
                </tr>
                <tr bgcolor="f2f2f2">
                  <td width="3%" height="19" align="right" valign="middle" bgcolor="#FFFFFF"><label class="style24 style30"></label></td>
                  <td height="19" colspan="5" align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="11%"><span class="style7">
                          <input name="Button" type="button" class="style2" value="NEW REPORTER" onclick="resetForm();"/ >
                        </span></td>
                        <td width="89%" align="left"><span class="style7">
                          <input name="Submit2" type="submit" class="style2" value="SAVE REPORTER" />
                        </span></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
                        </form>
            <br />
                <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr bgcolor="#CB9F94">
                <td bgcolor="#B7C7F8"><div align="center"><span class="style11">List of Reporters </span></div></td>
              </tr>
              
              <tr>
                <td align="left" valign="bottom" class="style8"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableboarder">
                    
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="20%" height="28" align="left"><span class="style40">Full name</span></td>
                      <td width="14%" align="left" class="style40">Telephone</td>
                      <td width="13%" align="left" class="style40">Address</td>
                      <td width="19%" align="left" class="style40">e-mail</td>
                      <td width="15%" align="left" class="style40">location</td>
                      <td width="19%" align="center" class="style40"><span class="style33">Action</span></td>
                    </tr>
                    <?php $reporter->getReporter();?>
                  </table>
                    <br />
                    <br /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="1%" height="134">&nbsp;</td>
            <td width="85%" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {isRequired:false});
//-->
</script>
</body>
</html>
