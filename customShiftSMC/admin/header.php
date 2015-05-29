<?php
require_once '../includes/dbConfig.php';
$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME) or die("Error " . mysqli_error($link));
$link->query("SET CHARACTER SET utf8");
$link->query("SET NAMES utf8");
	ini_set('display_errors',1);
        session_start()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<html  dir="rtl" lang="ar" xml:lang="ar" xmlns="http://www.w3.org/1999/xhtml">-->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="../extensions/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custome styles -->
        <link rel="stylesheet" type="text/css" href="../styles/custom-styles.css">
        <!-- jquery validateion plugin styles-->
        <link rel="stylesheet" href="../extensions/jquery-form-validation-engine/css/validationEngine.jquery.css" type="text/css"/>
        <!--font awesome styles-->
        <link rel="stylesheet" href="../extensions/font-awesome/css/font-awesome.min.css" type="text/css"/>
        <link rel="stylesheet" href="../extensions/datatables/css/jquery.dataTables.min.css" type="text/css"/>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../extensions/admin-lte/css/AdminLTE.css" rel="stylesheet" type="text/css" />   

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
jQuery(document).ready(function($) {
  $('.date-picker').datepicker({ dateFormat: 'yy-mm-dd'});
  
  $('.delete_row').on('click', function(event) {
        if (window.confirm('Do u really want to delte the record'))
        {
            var action = $(this).data('action');
            var category = $(this).data('category');
            var post_id = $(this).data('post_id');
            var post_type = $(this).data('post_type');
            $.ajax({
                url: 'processData.php',
                type: 'POST',
                data: {'action': action, 'category': category, 'post_id': post_id, 'post_type': post_type},
                cache: false,
                success: function(data) {
                    //alert(data);
                    //$('body').load('signin.php');
                    document.location.reload(true);
                }
            });
        }
    });
	
	
});
</script>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="signin.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="../images/logo.png" style="width: 220px; height: 50px" class="img-responsive" />
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					<span class="icon-bar"></span>
                  
                </a>
				<a href="./signin.php" class="btn btn-danger" style="margin-top:10px;"> Back to Home </a>
			<?php
			if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
			if($language == 1)
			$lang = 'العربية';
			else
			$lang = 'English';
        }
		?>
				
            </nav>
			<p align="right"><span><a href="#" class="btn btn-danger" style="margin-top:20px; margin-right:10px;"><?php echo $lang ?></a></span></p>
        </header>


