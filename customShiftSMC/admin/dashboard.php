<!DOCTYPE html>

<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
if (isset($_SESSION['name']))
{
	 
            if (isset($_POST['submit']))
            {
				$_SESSION['language']=$_POST['language'];
			}
	if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
			if($language == 1)
			$lang = 'Arabic';
			else
			$lang = 'English';
        }
    ?>
<html class="login-bg">

    <!-- Mirrored from detail.herokuapp.com/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Sep 2014 09:58:42 GMT -->
    <head>
        <title>Detail Admin - Sign in</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootstrap -->
        <link href="../extensions/signin/bootstrap.css" rel="stylesheet" />
        <!-- <link href="../extensions/signin/bootstrap-overrides.css" type="text/css" rel="stylesheet" />-->

        <!-- global styles -->
        <link rel="stylesheet" type="text/css" href="../extensions/signin/layout.css" />
        <link rel="stylesheet" type="text/css" href="../extensions/signin/elements.css" />
        <link rel="stylesheet" type="text/css" href="../extensions/signin/icons.css" />

        <!-- libraries -->
        <link rel="stylesheet" type="text/css" href="../extensions/signin/font-awesome.css" />

        <!-- this page specific styles -->
        <link rel="stylesheet" href="../extensions/signin/signin.css" type="text/css" media="screen" />

        <!-- open sans font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		
   
    </head>
    <body>


        <!-- background switcher -->
    <aside class="right-side">
        
		<div class="login-wrapper">
            <a href="index-2.html">
                <img class="logo" src="../images/logo_adiyyat.png" style="width: 190px;height: 150px"  alt="logo" />
            </a>
			
		<form action="dashboard.php" method="post">
                <center></center><div class="box">
                    <div class="content-wrap">
                        your current Language is<br/><h3> <p style="color: red"> <?php echo $lang ?>. </p></h3><br/> If you want to change the Language Please select.<BR>
                        
                        <select class="form-control" name="language">
                            <option value="0">English</option>
                            <option value="1">Arabic</option>
                        </select>
                        <br/>
                        
                        <input class="btn-glow  success logi col-md-offset-9" name="submit" type="submit"/>
                    </div>
                </div></center>
            </form>
			</div>
    </aside>
	
	
	
    </div>
    <?php
    require_once 'footer.php';
}
else
{
    header('Location:index.php');
}
?>

</body>
</html>