<?php
include('session.php');

if(isset($_GET["com_app"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
else
{ 

$AD=$_POST['ad'];


mysql_select_db("nomination",$r);

$s1="INSERT INTO `com_app`(`pro_id`, `app_date`) VALUES ('$_POST[fln]','$_POST[ad]')";

$a=mysql_query($s1,$r);

 echo "<script>alert('Done');window.location='com_app.php';</script>";
			

		mysql_close($r);
}
} else {
?>
 

<html>
<head>

<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/navigation.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<title>Committee Approval</title>


</head>
<body>

<div id='banner'></div>

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>

<div id='cssmenu'>
<ul>
   <li><a href='project_details_form.php'>New Project</a></li>
   <li class='active'><a href='com_app.php'>Committee Approval</a></li>
   <li><a href='nomination_calling_person.php'>Nomination Calling</a></li>
   <li><a href='nomination_receiving.php'>Nomination Receiving</a></li>
   <li><a href='apo_sending.php'>APO Sending</a></li>
   <li><a href='ticketing.php'>Ticketing</a></li>
   <li><a href='reimbursement_form.php'>Reimbursment</a></li>
   <li><a href='report.php'>Report Submition</a></li>
   <li><a href='file_closing.php'>File Closing</a></li>
</ul>
</div>

<div id="wrapper">

<form name="com_app" class="form" action="?com_app" method="post">

    <div class="header">
    <center><h1>Committee Approval</h1></center>
    </div>
	
    <div class="content">
	<table>

<tr>
<td  width="27%">File Name </td>
<td>  
<select name="fln" class="input">
  <option>SELECT</option>
  
  <?php
					$r = mysql_connect("localhost","root","");
					mysql_select_db("nomination",$r);

							$s1="SELECT * FROM project_details WHERE pro_id NOT IN(SELECT pro_id FROM com_app) AND pro_id NOT IN(SELECT pro_id FROM file_closing) GROUP BY pro_id";

							$a=mysql_query($s1,$r);

									while($q = mysql_fetch_array($a))
									{	$Q=$q['pro_id'];
										echo "<option>$Q</option>";			
													}
				  ?>
</select></td>
</tr>

<tr>
<td align = "left">Approval Date  </td>
<td><input type="date" name="ad"  class="input" size="40" required></td>
</tr>

</table>
    </div>
    
    <div class="footer">
    <input type="submit" name="ok" value="OK" class="button" />
    <input type="reset" name="reset" value="RESET" class="clk" />
    </div>

</form>

</div>

<div id='footer'>Address- 10th floor Sethsiripaya Second Stage Battaramulla | Telephones: +94 11 2186031 | Fax Nos: +94 11 2186025 | Email: nposl@nps.lk</div>

</body>
</html>
<?php
}
?>