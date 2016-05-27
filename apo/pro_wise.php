<?php
include('session.php');
?>
<html>
<head>

<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/navigation.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/reports.css" rel="stylesheet" type="text/css" />
<title>Project Report</title>

</head>
<body>

<div id="banner"></div>

<div id="wrapper">

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>
<div id="search"><a href="view_report.php"><img src="images/search.png" height="50" width="51"></a></div>

<form class="form" method="POST" action="">


    <div class="content">
    </div>
    
    <div class="footer">
	
<table style="margin-left:auto; margin-right:auto;">
<caption><h1 style="color:white;">Project Details</h1></caption>
<thead>
<tbody>

<?php
$r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("nomination",$r);

$result=mysql_query("SELECT * FROM project_details LEFT JOIN com_app ON project_details.pro_id=com_app.pro_id LEFT JOIN apo_sending ON com_app.pro_id=apo_sending.pro_id LEFT JOIN file_closing ON project_details.pro_id = file_closing.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY project_details.pro_id ORDER BY project_details.pro_id ASC");

while($r=mysql_fetch_array($result))
{
	
echo "<tr>";	   
echo '<th>'."Project Code".'</th>'.'<td>'.$r['pro_code'].'</td>';
echo "</tr>";

echo "<tr>";	
echo '<th>'."Project Title".'</th>'.'<td>'.$r['pro_title'].'</td>';
echo "</tr>";

echo "<tr>";
echo '<th>'."Venue".'</th>'.'<td>'.$r['venue'].'</td>';
echo "</tr>";

echo "<tr>";
echo '<th>'."Project Duration".'</th>'.'<td>'.$r['pro_duration'].'</td>';
echo "</tr>";

echo "<tr>";
echo '<th>'."Closing date".'</th>'.'<td>'.$r['pro_close_date'].'</td>';
echo "</tr>";

echo "<tr>";
if ($r['app_date']!=''){ 
echo '<th>'."Approval date".'</th>'.'<td>'.$r['app_date'].'</td>';
} else {echo '<th>'."Approval date".'</th>'.'<td style="color:red">'."Not yet Approved".'</td>';}
echo "</tr>";

echo "<tr>";
if ($r['sending_date']!=''){
echo '<th>'."APO Sent Date".'</th>'.'<td>'.$r['sending_date'].'</td>';
} else {echo '<th>'."APO Sent Date".'</th>'.'<td style="color:red">'."Not yet send".'</td>';}
echo "</tr>";

echo "<tr>";
if ($r['f_closing_date']!=''){
echo '<th>'."File closed Date".'</th>'.'<td>'.$r['f_closing_date'].'</td>';
} else {echo '<th>'."APO Sent Date".'</th>'.'<td style="color:red">'."Not yet closed".'</td>';}
echo "</tr>";
	
}
?>
</tbody>
</thead>
</table>

<table style="float:left; margin-bottom:40px;">
<caption><h1 style="color:white">Nomination Called Persons</h1></caption>
<thead>

<tr>
<th>Name of the Person</th>
<th>Designation</th>
<th>Organization</th>
<th>Date of Called</th>

</tr>
</thead>

<tbody>

<?php

$result=mysql_query("SELECT * FROM project_details LEFT JOIN nom_calling ON project_details.pro_id=nom_calling.pro_id LEFT JOIN person ON nom_calling.pro_id=person.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY person.pers_id ORDER BY person.cname ASC");

while($r=mysql_fetch_array($result))
{
	
echo "<tr>";

if ($r['pers_name']!=''){ 	   
echo '<td>'.$r['title']." ".$r['pers_name'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['designation']!=''){ 	   
echo '<td>'.$r['designation'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}	

if ($r['cname']!=''){ 	   
echo '<td>'.$r['cname'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['calling_date']!=''){ 	   
echo '<td>'.$r['calling_date'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

echo "</tr>";
	
}
?>
</tbody>
</table>


<table style="float:right; margin-right:11%; margin-bottom:40px;">
<caption><h1 style="color:white">Nomination Called Organizations</h1></caption>
<thead>

<tr>
<th>Organization</th>
<th>Date of Called</th>

</tr>
</thead>

<tbody>

<?php

$result=mysql_query("SELECT * FROM project_details LEFT JOIN nom_calling ON project_details.pro_id=nom_calling.pro_id LEFT JOIN company ON nom_calling.pro_id=company.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY company.c_cname ORDER BY company.c_cname ASC");

while($r=mysql_fetch_array($result))
{
	
echo "<tr>";

if ($r['c_cname']!=''){ 	   
echo '<td>'.$r['c_cname'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['c_cname']!=''){ 	   
echo '<td>'.$r['calling_date'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

echo "</tr>";
	
}
?>
</tbody>
</table>

<table>
<caption><h1 style="color:white">Nomination Receiving</h1></caption>

<thead>

<tr>
<th>Name</th>
<th>Designation</th>
<th>Organization</th>
<th>Type of Nominee</th>
<th>Bio Data Received</th>
<th>Declaration Received</th>
</tr>
</thead>

<tbody>
<?php
$result=mysql_query("SELECT * FROM project_details LEFT JOIN nom_rec_c ON project_details.pro_id=nom_rec_c.pro_id LEFT JOIN ticketing ON nom_rec_c.pers_id = ticketing.pers_id LEFT JOIN reimbursment ON ticketing.pers_id=reimbursment.pers_id LEFT JOIN report_details ON reimbursment.pro_id=report_details.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY nom_rec_c.name ORDER BY nom_rec_c.pers_id ASC");

while($r=mysql_fetch_array($result))
{

echo "<tr>";

if ($r['name']!=''){ 
echo '<td>'.$r['title']." ".$r['name'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['designation']!=''){ 
echo '<td>'.$r['designation'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['cname']!=''){ 
echo '<td>'.$r['cname'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['type']!=''){ 	
echo '<td>'.$r['type'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['bio_data']!=''){ 
echo '<td>'.$r['bio_data'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['declaration']!=''){ 
echo '<td>'.$r['declaration'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

echo "</tr>";
}	

?>

</tbody>
</table>

<table>
<caption><h1 style="color:white">Ticketing</h1></caption>
<thead>

<tr>
<th>Name</th>
<th>Value of the Ticket (Rs.)</th>
<th>Agency</th>
</tr>
</thead>

<tbody>
<?php
$result=mysql_query("SELECT * FROM project_details LEFT JOIN nom_rec_c ON project_details.pro_id=nom_rec_c.pro_id RIGHT JOIN ticketing ON nom_rec_c.pers_id = ticketing.pers_id LEFT JOIN reimbursment ON ticketing.pers_id=reimbursment.pers_id LEFT JOIN report_details ON reimbursment.pro_id=report_details.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY nom_rec_c.name ORDER BY nom_rec_c.pers_id ASC");

while($r=mysql_fetch_array($result))
{

echo "<tr>";

if ($r['name']!=''){ 
echo '<td>'.$r['title']." ".$r['name'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['value']!=''){   
echo '<td>'.$r['value'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['agency_name']!=''){ 
echo '<td>'.$r['agency_name'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

echo "</tr>";
}	

?>
</tbody>
</table>

<table>
<caption><h1 style="color:white">Reimbursment</h1></caption>
<thead>

<tr>
<th>Name</th>
<th>Reimbursed</th>
<th>Reimbursment Value (Rs.)</th>
<th>Bank</th>
<th>Account No.</th>
<th>Cheque No.</th>
<th>Cheque Date</th>
</tr>
</thead>

<tbody>
<?php
$result=mysql_query("SELECT * FROM project_details LEFT JOIN nom_rec_c ON project_details.pro_id=nom_rec_c.pro_id RIGHT JOIN ticketing ON nom_rec_c.pers_id = ticketing.pers_id LEFT JOIN reimbursment ON ticketing.pers_id=reimbursment.pers_id LEFT JOIN report_details ON reimbursment.pro_id=report_details.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY nom_rec_c.name ORDER BY nom_rec_c.pers_id ASC");

while($r=mysql_fetch_array($result))
{

echo "<tr>";

if ($r['name']!=''){ 
echo '<td>'.$r['title']." ".$r['name'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['reimbursed']!=''){ 
echo '<td>'.$r['reimbursed'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['r_value']!=''){  
echo '<td>'.$r['r_value'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['bank']!=''){  
echo '<td>'.$r['bank'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['acc_no']!=''){  
echo '<td>'.$r['acc_no'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['cheque_no']!=''){ 
echo '<td>'.$r['cheque_no'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['cheque_date']!=''){ 
echo '<td>'.$r['cheque_date'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

echo "</tr>";
}	

?>
</tbody>
</table>

<table>
<caption><h1 style="color:white">Report Submition</h1></caption>
<thead>

<tr>
<th>Name</th>
<th>Report Submitted</th>
<th>Date of the Report Submitted</th>
</tr>
</thead>

<tbody>
<?php
$result=mysql_query("SELECT * FROM project_details LEFT JOIN nom_rec_c ON project_details.pro_id=nom_rec_c.pro_id RIGHT JOIN ticketing ON nom_rec_c.pers_id = ticketing.pers_id LEFT JOIN reimbursment ON ticketing.pers_id=reimbursment.pers_id LEFT JOIN report_details ON reimbursment.pro_id=report_details.pro_id WHERE project_details.pro_title like '$_POST[pt]' GROUP BY nom_rec_c.name ORDER BY nom_rec_c.pers_id ASC");

while($r=mysql_fetch_array($result))
{

echo "<tr>";

if ($r['name']!=''){ 
echo '<td>'.$r['title']." ".$r['name'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['submitted']!=''){ 
echo '<td>'.$r['submitted'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

if ($r['date_of_submition']!=''){ 
echo '<td>'.$r['date_of_submition'].'</td>';
} else {echo '<td style="color:red">'."No data".'</td>';}

echo "</tr>";
}	

?>
</tbody>
</table>
</div>
</form>
</div>
</body>
</html>
<?
mysql_close($r);
?>