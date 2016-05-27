<?php
include('session.php');

if(isset($_GET["nomination_receiving"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
else
{
$FLN=$_POST['fln']; // file name	
$TON=$_POST['ton']; //Type of Nominee
$PT=$_POST['des']; //Designation
$TI=$_POST['ti']; // mr/mrs/miss
$PC=$_POST['fn']; //name 
$CD=$_POST['cont1']; //Contact No 1
$CD2=$_POST['cont2']; //Contact No 2
$ORG=$_POST['org']; //Organization name
$BD=$_POST['bd'];//Bio data recieved
$DR=$_POST['dr'];//Declaration recieved



mysql_select_db("nomination",$r);


if ($_POST['ton']=="Via Organization" or $_POST['ton']=="Personally"){
	
	$s21="SELECT * FROM nom_rec_c ORDER BY pers_id DESC limit 1";

							$a1=mysql_query($s21,$r);

									while($q1 = mysql_fetch_array($a1))
									{	$Q1=$q1['pers_id'];
									$z1=$Q1+1;	}	

$s2="INSERT INTO `nom_rec_c`(`pro_id`, `pers_id`, `type`, `designation`, `title`, `name`, `cont_1`, `cont_2`, `cname`, `bio_data`, `declaration`) VALUES ('$_POST[fln]','$z1','$_POST[ton]','$_POST[des]','$_POST[ti]','$_POST[fn]','$_POST[cont1]','$_POST[cont2]','$_POST[org]','$_POST[bd]','$_POST[dr]')";

$a2=mysql_query($s2,$r);
echo "<script>alert('Done');window.location='nomination_receiving.php';</script>";
			

		mysql_close($r); 
}
else { echo "<script>alert('plz select Type of Nominee	');window.location='nomination_receiving.php';</script>"; };
		
} }
else {
?>
 <html>
<head>

<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/navigation.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<title>Nomination Receiving Form</title>


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
   <li class='active'><a href='nomination_receiving.php'>Nomination Receiving</a></li>
   <li><a href='apo_sending.php'>APO Sending</a></li>
   <li><a href='ticketing.php'>Ticketing</a></li>
   <li><a href='reimbursement_form.php'>Reimbursment</a></li>
   <li><a href='report.php'>Report Submition</a></li>
   <li><a href='file_closing.php'>File Closing</a></li>
</ul>
</div>

<div id="wrapper">

<form name="nomination_receiving" class="form" action="?nomination_receiving" method="post">

    <div class="header">
    <center><h1>Nomination Receiving</h1></center>
    </div>
	
    <div class="content">
	<table>

<tr>
<td width="35%" align="left">File Name </td>
<td>  
<select class="input" name="fln" required>
  <option>SELECT</option>
				  
				  <?php
					$r1 = mysql_connect("localhost","root","");
					mysql_select_db("nomination",$r1);

							$s2="SELECT pro_id FROM person WHERE pro_id NOT IN(SELECT pro_id FROM file_closing) GROUP BY pro_id";

							$a1=mysql_query($s2,$r1);

									while($q1 = mysql_fetch_array($a1))
									{	$Q1=$q1['pro_id'];
										echo "<option>$Q1</option>";			
													}
				  ?>
  
</select></td>
</tr>
	
<tr>
<td align="left">Type of Nominee</td>
<td>  
<select class="input" name="ton" placeholder="SELECT" required>
  <option >SELECT</option>
  <option >Personally</option>
  <option >Via Organization</option>
</select></td>
</tr>
	

</table>
<table>
		
<tr>
<td  width="33.2%" align="left">Name</td>
<td >  
<select name="ti" class="input4" required>
  <option name="Mr">Mr.</option>
  <option name="Mrs">Mrs.</option>
  <option name="Miss">Miss.</option>
 </select></td>
 
 <td><input type="text" name="fn"  class="input2" size="20" placeholder="Full Name" required></td>
 </tr>
 
 </table>
 <table>
 
<tr>
<td  width="35%" align="left">Designation</td>
<td><input type="text" name="des"  class="input" size="40" placeholder="" required></td>
</tr>

<tr>
<td align="left">Organization</td>
<td>  
<select class="input" name="org" required>
  <option>SELECT</option>
  
   <?php
					$r = mysql_connect("localhost","root","");
					mysql_select_db("nomination",$r);

							$s1="SELECT * FROM person WHERE pro_id NOT IN(SELECT pro_id FROM file_closing) GROUP BY pro_id";
							$s2="SELECT * FROM company WHERE pro_id NOT IN(SELECT pro_id FROM file_closing) GROUP BY pro_id";

							$a=mysql_query($s1,$r);
							$a1=mysql_query($s2,$r);

									while($q = mysql_fetch_array($a))
									{	$Q=$q['cname'];
										echo "<option>$Q</option>";
													
									while($q = mysql_fetch_array($a1))
									{	$Q2=$q['c_cname'];
										if($Q!=$Q2){
										echo "<option>$Q2</option>";}
									else{};
									}}
				  ?>
</select></td>
</tr>

</table>
<table>
<tr>
<td  width="35%" align="left">Contact No</td>
<td><input type="text"  name="cont1"   class="input3" size="16" maxlength="10"  placeholder="Ex: 0112187096" required></td>
<td><input type="text" name="cont2"  class="input3" maxlength="10" size="16" placeholder="Ex: 0112187096" required></td>
</tr>

</table>

<table>

<tr>
<td align="left" width="65%">Bio data received</td>
<td><input type ="radio" name = "bd" value = "Yes"> Yes
<input type ="radio" name = "bd" value = "No" checked="checked"> No
</td>
</tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

<tr>
<td align="left">Declaration received</td>
<td><input type ="radio" name = "dr" value = "Yes" > Yes
<input type ="radio" name = "dr" value = "No" checked="checked"> No
</td>
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