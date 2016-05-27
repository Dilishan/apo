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

<form class="form" method="POST" action="pro_wise.php">


    <div class="content">
    </div>
    
    <div class="footer">
	
<table style="margin-left:auto; margin-right:auto; margin-top:100px">
<caption><h1 style="color:white;">Project Details - <?php echo $_POST['cnt'] ; ?> </h1></caption>
<thead>

<th>Project Code</th>
<th>Project Title</th>
<th>Venue</th>
<th>Project Duration</th>
<th>Closing date</th>

</thead>

<tbody>

<?php
$r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("nomination",$r);

$result=mysql_query("SELECT * FROM project_details WHERE project_details.venue='$_POST[cnt]' GROUP BY project_details.pro_id ORDER BY project_details.pro_id ASC");

while($r=mysql_fetch_array($result))
{
	
echo "<tr>";
	   
echo '<td>'.$r['pro_code'].'</td>';	
echo '<td>'.'<input type = "submit" name= "pt" class = "clk" value="'.$r['pro_title'].'" title="Click here to see full details.">'.'</td>';
echo '<td>'.$r['venue'].'</td>';
echo '<td>'.$r['pro_duration'].'</td>';
echo '<td>'.$r['pro_close_date'].'</td>';

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