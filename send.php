<?php

//connect to DB
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "meetingsched";

$connection = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//insert registration
$q = "INSERT INTO people (first, last, email, department, selected_meeting) VALUES(
	 '".$_POST['firstname']."', 
	'".$_POST['lastname']."', 
	'".$_POST['email']."',
	'".$_POST['department']."', 
	'".$_POST['selected_meeting']."'
	 )";

//update the meeting count
$q2 = "UPDATE meetings SET meetings.`seats` = meetings.`seats`-1 where meetings.`id` =".$_POST['selected_meeting'] ;
	
mysqli_query($connection, $q) or die ("Error in query: $q. ".mysqli_error($connection));

mysqli_query($connection, $q2) or die ("Error in query: $q2. ".mysqli_error($connection));
