<?php
require_once '../includes/dbConfig.php';
$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME) or die("Error " . mysqli_error($link));
$link->query("SET CHARACTER SET utf8");
$link->query("SET NAMES utf8");
	ini_set('display_errors',1);
$title = 'Welcome Admin in Aladiyat';
require '../api/general.php';
$general=new General();
$trueMsg="";
$falseMsg="";
$lan = isset($_POST['language']) ? $_POST['language'] : "";
if($lan==0){
$sql  = "SELECT EmailTo, EmailCC, EmailBack FROM emailsettings";
}else{
	$sql  = "SELECT EmailTo, EmailCC, EmailBack FROM emailsettings_a";
}
$news = $link->query($sql);
foreach ($news as $single_news)
                                {
								$to=$single_news['EmailTo']	;
								$trueMsg=$single_news['EmailCC'];
								$falseMsg=$single_news['EmailBack'];
								}
$name       = isset($_POST['name']) ? $_POST['name'] : "";
$c_email       = isset($_POST['email']) ? $_POST['email'] : "";
$contact       = isset($_POST['contact']) ? $_POST['contact'] : "";
$title       = isset($_POST['title']) ? $_POST['title'] : "";
$text       = isset($_POST['text']) ? $_POST['text'] : "";
$text  = "Hello \n\n" . $text . "\n\n Name :" . $name . "\n\n Contact number : " . $contact;
//$to = 'syed.fahad@visualsparks.com';
$headers = "From: ". $c_email . "\r\n" .
"CC: " . $c_email;

$var = mail($to, $title, $text, $headers);

if($var==true)
echo "$trueMsg";
else
echo '$falseMsg';
?>