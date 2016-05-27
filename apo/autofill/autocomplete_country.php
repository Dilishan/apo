<?php
    $connection = mysqli_connect("localhost","root","","nomination") or die("Error " . mysqli_error($connection));

    $sql = "select distinct venue from project_details";
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

    $dname_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $dname_list[] = $row['venue'];
    }
    echo json_encode($dname_list);
?>