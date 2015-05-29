<?php
header("Content-Type: text/html;charset=UTF-8");
error_reporting(1);
ini_set('display_errors', 1);
require_once '../includes/dbConfig.php';
require_once '../api/general.php';
session_start();
// print_r($_FILES);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//die();
$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME) or die("Error " . mysqli_error($link));

	global $link;
	$id        = $_POST['post_id'];
	
	
	$lan = $_SESSION['language'];
	
		if($lan==0){
			
			$sql1 = 'Select is_active from race WHERE id ="'.$_POST['post_id'].'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0"){
			$mainsql = 'UPDATE  race SET is_active='1' WHERE id ="'.$_POST['post_id'].'"';
			$result    = $link->query($mainsql);}
			else{
			$mainsql = 'UPDATE  race SET is_active='0' WHERE id ="'.$_POST['post_id'].'"';
			$result    = $link->query($mainsql);}
			
		}
		else
		{
			$sql1 = 'Select is_active from race_a WHERE id ="'.$_POST['post_id'].'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0")
			{
			$mainsql = 'UPDATE  race_a SET is_active='1' WHERE id ="'.$_POST['post_id'].'"';
			$result    = $link->query($mainsql);
			}
			else{
			$mainsql = 'UPDATE  race_a SET is_active='0' WHERE id ="'.$_POST['post_id'].'"';
			$result    = $link->query($mainsql);
			}
			
			}
			
			$result    = $link->query($mainsql);
	

?>
