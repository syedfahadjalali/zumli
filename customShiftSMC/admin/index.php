<!DOCTYPE html>
<?php
require_once '../includes/dbConfig.php';
$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME) or die("Error " . mysqli_error($link));
session_start();
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



        <div class="login-wrapper">
            <a href="index-2.html">
                <img class="logo" src="../images/logo_adiyyat.png" style="width: 190px;height: 150px"  alt="logo" />
            </a>
            <?php
            if (isset($_POST['submit']))
            {
                if ($_POST['email'] && $_POST['password'])
                {
                    $email    = $_POST['email'];
                    $password = $_POST['password'];
                    $sql      = "select * from admin where email='" . $email . "' and password='" . $password . "'";
                    $result   = $link->query($sql);
                    $row      = $result->fetch_array(MYSQLI_ASSOC);
                    if ($row)
                    {
                        $_SESSION['name']=$row['name'];
                        $_SESSION['language']=$_POST['language'];
                        if ($row['super_admin']==1)
                        {
                            $_SESSION['admin_type']=1;
                        }
                        else
                        {
                            $_SESSION['admin_type']=0;
                        }
                        ?>
                         <script>    window.location.replace("<?php echo base_url?>signin.php");</script>
                        <?php
                    }
                    else
                    {
                        $error = "Email or Password is invalid";
                    }
                }
            }
            ?>
            <form action="index.php" method="post">
                <div class="box">
                    <div class="content-wrap">
                        <h6>Admin Log in</h6>
                        <input class="form-control" name="email" type="email" placeholder="E-mail address" required/>
                        <br/>
                        <input class="form-control" name="password" type="password" placeholder="Your password" required/>
                        <br/>
                        <select class="form-control" name="language">
                            <option value="0">English</option>
                            <option value="1">Arabic</option>
                        </select>
                        <br/>
                        <p style="color: red"><?php
                            if (isset($error))
                            {
                                echo $error;
                            }
                            ?></p>
                        <input class="btn-glow  success logi col-md-offset-9" name="submit" type="submit"/>
                    </div>
                </div>
            </form>
        </div>

        <!-- scripts -->
        <script src="../extensions/signin/jquery-latest.js"></script>
        <script src="../extensions/signin/bootstrap.min.js"></script>
        <script src="../extensions/signin/theme.js"></script>

        <!-- pre load bg imgs -->
    </body>

    <!-- Mirrored from detail.herokuapp.com/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Sep 2014 09:59:21 GMT -->
</html>