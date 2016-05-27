<?php
include('session.php');

if(isset($_GET["pro_search"])){
   $r = mysql_connect("localhost","root","");
if (!$r)
{
 die('Could not connect: ' . mysql_error());
 }
}
else {
?>
 

<html>
<head>

<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/navigation.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/search.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.min.js"></script>
<title>Program Search</title> 

<script type="text/javascript">
$(function() {
    var availableTags = <?php include('autofill/autocomplete_pers.php'); ?>;
    $("#tag").autocomplete({
        source: availableTags,
        autoFocus:true
    });
});
</script>

</head>
<body>

<div id='banner'></div>

<div id="logout"><a href="logout.php" class="button"><img src="images/logout.png" height="70" width="70"></a></div>
<div id="home"><a href="home.php"><img src="images/home.png" height="70" width="70"></a></div>
<div id="search"><a href="view_report.php"><img src="images/search.png" height="54" width="54"></a></div>

<div id="wrapper">

<form name="pro_search" class="form" action="pers_wise.php" method="post">

	 <div class="header">
    <center><h1>Enter a Person Name</h1></center>
    </div>
	
    <div class="content">
	
	<table>
	<tr>
	<td><div class="sbox"><input type="text" class="input" name="pers" id="tag" size="40" required></div></td>
	</tr>
	</table>
	
    </div>
    
    <div class="footer">
	<input type="submit" name="go" value="Go !" class="button" />
    </div>

</form>

</div>

</body>

</html>

<?php
}
?>