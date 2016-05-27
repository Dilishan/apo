<?php
include('session.php');

if(isset($_GET["report"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
else
{ 
$FLN=$_POST['fln']; // file name
$TI=$_POST['ti']; // mr/mrs/miss
$PC=$_POST['fn']; //name 
$PC=$_POST['sub']; //name 

mysql_select_db("nomination",$r);

$x="SELECT `pers_id` FROM `nom_rec_c` WHERE `name`='$_POST[fn]'";
$x4;
$x2=mysql_query($x,$r);
while($q = mysql_fetch_array($x2))
{ $x4=$q['pers_id'];
}

$s1="INSERT INTO `report_details`(`pro_id`, `pers_id`, `submitted`, `date_of_submition`) VALUES ('$_POST[fln]','$x4','$_POST[sub]','$_POST[ds]')";

$a=mysql_query($s1,$r);

echo "<script>alert('Done');window.location='report.php';</script>";
			

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
<title>Report</title>

</head>
<body>

<div id='banner'></div>

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>

<div id='cssmenu'>
<ul>
   <li><a href='project_details_form.php'>New Project</a></li>
   <li><a href='com_app.php'>Committee Approval</a></li>
   <li><a href='nomination_calling_person.php'>Nomination Calling</a></li>
   <li><a href='nomination_receiving.php'>Nomination Receiving</a></li>
   <li><a href='apo_sending.php'>APO Sending</a></li>
   <li><a href='ticketing.php'>Ticketing</a></li>
   <li><a href='reimbursement_form.php'>Reimbursment</a></li>
   <li class='active'><a href='report.php'>Report Submition</a></li>
   <li><a href='file_closing.php'>File Closing</a></li>
</ul>
</div>

<div id="wrapper">

<form name="report" class="form" action="?report" method="post">

    <div class="header">
    <center><h1>Report Submition</h1></center>
    </div>
	
    <div class="content">
	<table>
	
<tr>
<td  width="34%">File Name </td>
<td><select name="fln" class="input" required id="sel1">
  <option>SELECT</option>
  
   				  <?php
					$r = mysql_connect("localhost","root","");
					mysql_select_db("nomination",$r);

							$s1="SELECT * FROM reimbursment WHERE pro_id NOT IN(SELECT pro_id FROM file_closing) GROUP by pro_id";


							$a=mysql_query($s1,$r);

									while($q = mysql_fetch_array($a))
									{	$Q=$q['pro_id'];
										echo "<option>$Q</option>";			
													}
				  ?>
</select></td>
</tr>
</table>

<table>	
<tr>
<td  width="34%">Name</td>
<td>  
<select name="ti" class="input4">
  <option>Mr.</option>
  <option>Mrs.</option>
  <option>Miss.</option>
 </select></td>
 
 <td><select name="fn" class="input2" required>
  <option>SELECT</option>
  
				<?php
					$r = mysql_connect("localhost","root","");
					mysql_select_db("nomination",$r);

							$z="SELECT * FROM nom_rec_c WHERE pers_id IN (SELECT pers_id FROM reimbursment) AND pro_id NOT IN (SELECT pro_id FROM file_closing) AND pers_id NOT IN (SELECT pers_id FROM report_details)";

							$y=mysql_query($z,$r);

									while($q50 = mysql_fetch_array($y))
									{	$Q50=$q50['name'];
										echo "<option>$Q50</option>";			
													}				
				  ?>
  
  
  
</select></td>
 </tr>
 </table>
 
 <table>
 <tr>
<td width="64.8%">Submitted</td>
<td><input type ="radio" name = "sub" value = "Yes"> Yes
<input type ="radio" name = "sub" value = "No" checked="checked"> No
</td>
</tr>
 
 </table>
 
 <table>
 <tr>
<td align = "left" width="34%">Date of the submition</td>
<td><input type="date" name="ds"  class="input" size="40" placeholder="" required></td>
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