<?php
$title = 'Welcome Admin in Aladiyat';
$lang="";
require_once 'header.php';
require_once 'sidebar.php';
if (isset($_SESSION['name']))
{
	 if (isset($_POST['submit']))
            {
				$_SESSION['language']=$_POST['language'];
			}
	
    ?>
    <aside class="right-side">
        <div class="col-md-9">
            <h1>Welcome To Al adiyat</h1>
        </div>
		<div class="login-wrapper">
            <a href="index-2.html">
                <img class="logo" src="../images/logo_adiyyat.png" style="width: 190px;height: 150px"  alt="logo" />
            </a>
		<!--<form action="signin.php" method="post">
                <div class="box">
                    <div class="content-wrap">
                      <center> This CMS is used to update the record in AlAdiyat Mobile Application. The updation or insertion of record is based on language. Currently AlAdiyat support Enlish and Arabic Language. The updation, insertion deletion and selection operetion will work on respectively selected language. Currently the language set as <br/><h3> <p style="color: red"> <?php echo $lang ?>. </p></h3><br/> If you want to change the Language Please select from the form below and press submit.<BR>
                        
                        <select class="form-control" name="language" style="width:100px;">
                            <option value="0">English</option>
                            <option value="1">Arabic</option>
                        </select>
                        <br/></center>
                        
                        <center><input name="submit" type="submit"/><BR /> <i>Note: Please choose Dashboard from left menu, whenever you want to change the language !</i></center>
                    </div>
                </div>
            </form> -->
			</div>
    </aside>
    </div>
    <?php
}
else
{
    ?>
    <script>
        window.location.replace("<?php echo base_url ?>");
    </script>
    <?php
}
require_once 'footer.php';
?>