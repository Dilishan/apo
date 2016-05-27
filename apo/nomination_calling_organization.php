<?php
include('session.php');

if(isset($_GET["nomination_calling_organization"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
else
{ 
$FLN=$_POST['fln']; // file name
$CN=$_POST['cn']; //Organization name
$CALLD=$_POST['calld']; //Calling Date

/*
echo $FLN;
echo $TI;
echo $PC;
echo $DE;
echo $CN;
echo $CALLD;
*/ 

mysql_select_db("nomination",$r);

$s1="INSERT INTO `nom_calling`(`pro_id`, `calling_date`) VALUES ('$_POST[fln]','$_POST[calld]')";
$s2="INSERT INTO `company`(`pro_id`, `c_cname`) VALUES ('$_POST[fln]','$_POST[cn]')";

$a=mysql_query($s1,$r);
$a2=mysql_query($s2,$r);


 echo "<script>alert('Done');window.location='nomination_calling_organization.php';</script>";
			

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
<title>Nomination Calling Form</title>

</head>
<body>

<div id='banner'></div>

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>

<div id='cssmenu'>
<ul>
   <li><a href='project_details_form.php'>New Project</a></li>
   <li><a href='com_app.php'>Committee Approval</a></li>
   <li class='active'><a href='nomination_calling_person.php'>Nomination Calling</a></li>
   <li><a href='nomination_receiving.php'>Nomination Receiving</a></li>
   <li><a href='apo_sending.php'>APO Sending</a></li>
   <li><a href='ticketing.php'>Ticketing</a></li>
   <li><a href='reimbursement_form.php'>Reimbursment</a></li>
   <li><a href='report.php'>Report Submition</a></li>
   <li><a href='file_closing.php'>File Closing</a></li>
</ul>
</div>

<div id="wrapper">

<form name="nomination_calling_organization" class="form" action="?nomination_calling_organization" method="post">

    <div class="header">
    <h1>Nomination Calling - <div id="b1"><input type ="radio" name = "nom" value = "person" id="p">Person<br>
<input type ="radio" name = "nom" value = "organization" checked="checked" id="o">Organization</div></h1>
	</div>
	
	
    <div class="content">
	<table>
	
<tr>
<td width="27%">File Name </td>
<td>  
<select name="fln" class="input">
  <option>SELECT</option>
  
  <?php
					$r = mysql_connect("localhost","root","");
					mysql_select_db("nomination",$r);

							$s1="SELECT pro_id FROM com_app WHERE pro_id NOT IN(SELECT pro_id FROM file_closing) GROUP BY pro_id";

							$a=mysql_query($s1,$r);

									while($q = mysql_fetch_array($a))
									{	$Q=$q['pro_id'];
										echo "<option>$Q</option>";			
													}
				  ?>
</select></td>
</tr>

<tr>
<td align = "left">Organization</td>
<td><input type="text" name="cn"  class="input" size="40" placeholder="National Productivity Secretariat" required></td>
</tr>

<tr>
<td align = "left">Calling Date  </td>
<td><input type="date" name="calld"  class="input" size="40" required></td>
</tr>


</table>
    </div>
    
    <div class="footer">
    <input type="submit" name="ok" value="OK" class="button" />
    <input type="reset" name="reset" value="RESET" class="clk" />
	
    </div>

</form>

</div>

<script>	

document.getElementById('p').onclick = function() {
    if ( this.checked ) {
        window.location = 'nomination_calling_person.php';
    } else {
		window.location = 'nomination_calling_organization.php';
    }
};
	
</script>

<div id='footer'>Address- 10th floor Sethsiripaya Second Stage Battaramulla | Telephones: +94 11 2186031 | Fax Nos: +94 11 2186025 | Email: nposl@nps.lk</div>

</body>

</html>
<?php
}
?>