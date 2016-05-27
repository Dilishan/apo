<?php
include('session.php');

if(isset($_GET["view_report"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
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
<link href="css/view_reports.css" rel="stylesheet" type="text/css" />
<title>View Reports</title>


</head>
<body>

<div id='banner'></div>

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>

<div id="wrapper">

<form class="form">

	 <div class="header">
    <center><h1>View Reports</h1></center>
    </div>
	
    <div class="content">
    </div>
    
    <div class="footer">
	<div class="button"><a href="pro_search.php"><img src="images/pro_button.jpg"/></a></div>
	<div class="button"><a href="org_search.php"><img src="images/org_button.jpg"/></a></div>
	<div class="button"><a href="pers_search.php"><img src="images/person_button.jpg"/></a></div>
    <div class="button"><a href="country_search.php"><img src="images/country_button.jpg"/></a></div>
	
    </div>

</form>

</div>

</body>

</html>

<?php
}
?>