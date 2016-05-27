<?php
include('session.php');


if(isset($_GET["project_details_form"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
else
{ 
$Fln=$_POST['fln'];
$PC=$_POST['pc'];
$PT=$_POST['pt'];
$Vn=$_POST['vn'];
$Du=$_POST['du'];
$CD=$_POST['cd'];

/*
echo $Fln ."<br/>"; 
echo $PC ."<br/>";
echo $PT ."<br/>";
echo $Vn ."<br/>";
echo $Du ."<br/>";
echo $CD ."<br/>";
*/

mysql_select_db("nomination",$r);

$s1="INSERT INTO `project_details`(`pro_id`, `pro_code`, `pro_title`, `venue`, `pro_duration`, `pro_close_date`) VALUES ('$_POST[fln]','$_POST[pc]','$_POST[pt]','$_POST[vn]','$_POST[du]','$_POST[cd]')";

$a=mysql_query($s1,$r);

 echo "<script>alert('Done');window.location='project_details_form.php';</script>";
			
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
<title>Project details Form</title>

</head>
<body>

<div id='banner'></div>

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='project_details_form.php'>New Project</a></li>
   <li><a href='com_app.php'>Committee Approval</a></li>
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

<form name="pro_details_form" class="form" action="?project_details_form" method="post">

    <div class="header">
    <center><h1>Project Details</h1></center>
    </div>
	
    <div class="content">
	<table>

<tr>
<td align = "left" width="27%">File Name </td>
<td>  <input type="text" name="fln" class="input" size="40" placeholder="Ex: NPO/SL/03/01/978"  required></td>
</tr>


<tr>
<td align = "left">Project Code </td>
<td>  <input type="text" name="pc" class="input" size="40" placeholder="Ex: 15-AG-05-GE-TRC-B/C" required></td>
</tr>


<tr>
<td align = "left">Project Title  </td>
<td><input type="text" name="pt"  class="input" size="40" placeholder="Ex: Training Course on Food Safty Management System"  required> </td>
</tr>

<tr>
<td align = "left">Venue  </td>
<td><input type="text" name="vn"  class="input" size="40" placeholder="Ex: Pakistan" required></td>
</tr>



<tr>
<td align = "left">Duration  </td>
<td><input type="text" name="du"  class="input" size="40" placeholder="Ex: 23 - 27 November 2015 (Five days)" required></td>
</tr>

<tr>
<td align = "left">Closing Date  </td>
<td><input type="date" name="cd"  class="input" size="40" required></td>
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
$r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
else
{ 
mysql_select_db("nomination",$r);
$n="select pro_close_date from project_details";

$n1=mysql_query($n,$r);

while($r=mysql_fetch_array($n1))
{
	   
echo $r['pro_close_date'];	

echo '<script>'.
'var d = new Date();
var x = d-("feb 01 2016");
document.getElementById("demo").innerHTML = x;'.
'</script>';
echo '<p id="demo">';

}

}
}
?>