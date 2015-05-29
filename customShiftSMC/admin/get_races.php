<?php
session_start();
require_once '../includes/dbConfig.php';
$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME) or die("Error " . mysqli_error($link));

require '../api/general.php';	
require 'calendar/utils.php';
$range_start = parseDateTime($_GET['start']);
$range_end = parseDateTime($_GET['end']);
if(!empty($range_start)){
// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
	$timezone = new DateTimeZone($_GET['timezone']);
}

 $general = new General();
        if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
        else
        {
            $language = 0;
        }
        if ($language == 1)
        {
            $sql   = 'SELECT  race_title,race_start_time,race_end_time, race_held_date FROM race_a order by race_held_date desc';
        }
        else
        {
             $sql   = 'SELECT  race_title,race_start_time,race_end_time, race_held_date FROM race order by race_held_date desc';
        }
		   $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
     $races = $link->query($sql);
       if ($races->num_rows > 0)
                {
$json_response = array();  
// fetch data in array format  
    foreach ($races as $row) {
/*	$date = strtotime($row['race_start_time']);
    $timfrom =  date('H', $date);	
	echo $timfrom;*/
		
// Fetch data of Fname Column and store in array of row_array  
$row_array['title']  =  $row['race_title']; 
$row_array['start']  =  $row['race_held_date'];//."T".$row['race_start_time']; 
$row_array['end']    = $row['race_held_date'];//."T".$row['race_end_time'];  
////push the values in the array  13T07:00:00'
array_push($json_response,$row_array);  
}  
//  
echo json_encode($json_response);  
				}
}
?>  

