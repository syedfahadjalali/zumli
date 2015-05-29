<?php

if ( $_SERVER['HTTP_HOST'] == 'localhost' )
{
    define('DATABASE_USER', 'aladiyat_db');
    define('DATABASE_PASS', 'vst@al@234$$');
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_NAME', 'aladiyat_db');
    define('THUMBNAILS', 'http://213.136.68.168:8888/aladiyat/trunk/AladiyatCMS/images/thumbnails/');
	define('IMAGE', 'http://213.136.68.168:8888/aladiyat/trunk/AladiyatCMS/images/');
    define('API_URL', 'http://localhost/AlAdiyatNew/trunk/AladiyatCMS/index.php');
    define('base_url', 'http://localhost/AlAdiyatNew/trunk/AladiyatCMS/admin/');
}
else
{
    define('DATABASE_USER', 'aladiyat_db');
    define('DATABASE_PASS', 'vst@al@234$$');
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_NAME', 'aladiyat_db');
    define('THUMBNAILS', 'http://213.136.68.168:8888/aladiyat/trunk/AladiyatCMS/images/thumbnails/');
	define('IMAGE', 'http://213.136.68.168:8888/aladiyat/trunk/AladiyatCMS/images/');
    define('API_URL', 'http://localhost/AlAdiyatNew/trunk/AladiyatCMS/index.php');
    define('base_url', 'http://localhost/AlAdiyatNew/trunk/AladiyatCMS/admin/');
}

?>