<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
$var ="";
$response = '';
if (isset($_SESSION['name']))
{
	 if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
        else
        {
            $language=0;
        }
     $count=0;
	$general=new General();
	 $sql  = $sql  = 'SELECT id, regid FROM '.$general->regid[$language]. ' order by id desc';
	 $link->query("Delete from regid Where regid='' ");
	 $regids = $link->query($sql);
	 $regIds = array();
	  foreach ($regids as $regid){
		  if($regid['regid'] != ""){
		  $regIds[] = $regid['regid'];
		  $count++;
		  }
		}
if(isset($_REQUEST['action'])=='delete'){
	   $sqrry  = 'Delete from pushnotifications where id="'.$_REQUEST['id'].'" ';
	   $link->query($sqrry);
	   ?>
       <script>
       location.replace("push.php?viewall&msg=dell");
       </script>
       <?php
	}


/*	   $sqry  = 'SELECT count(*) as totalCount FROM '.$general->regid[$language]. ' where regid !="" ';
	 
	 echo $sqry; 
	  $totalrec = $link->query($sqry);
		foreach($totalrec as $row){
			 $todatl = $row['totalCount'];
			}
				echo $todatl;*/
				$apiKey = "AIzaSyDqOePyR0ZsYLT3BsGVVITnjBU0I4U_doo";
				
	 if (isset($_POST['submit']))
            {
				$message=$_POST['msg'];
				$contentTitle=$_POST['title'];
				$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
				 $link->query("INSERT INTO pushNotifications (pushTitle,pushMsg) VALUES('".$contentTitle."','".$message."');");
				
				$tickerText   = "ticker text message";
				$contentText  = "content body";
 				$response = sendNotification( 
                $apiKey, 
                $regIds, 
                array('message' => $message, 'tickerText' => $tickerText, 'contentTitle' => $contentTitle, "contentText" => $contentText) );
				if($response != ''){
				$var="Notification has been sent successfuly";
				$response = '';
				}
				?><script> location.replace("push.php?viewall&msg");</script>
       <?php
			}
	if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
			if($language == 1)
			$lang = 'Arabic';
			else
			$lang = 'English';
        }
		
	if(isset($_REQUEST['viewall'])){

         $sql   = 'SELECT  id,pushTitle,pushMsg FROM pushNotifications';
         $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
     $notifications = $link->query($sql);

		?>
		  <aside class="right-side">
            <div class="col-md-12">
            <div style="float:right;margin-top:10px; background-color:#FFF">Total Registered Devices are:  <?php echo $count; ?></div>
            <?php if(isset($_REQUEST['msg'])){  ?>
            <div style="background-color:#3C0; width:224px; margin-top:10px;margin-left: 370px;" align="center"><?php echo $var ?></div>
            
          <?php  } ?>
                <br/><a href="?send_notification" class="btn btn-primary">Send Notification</a><br/><br/>
         <?PHP
                if ($notifications->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Message</th>
                                     <th>Delete</th>
                                 </tr>	
                            </thead>
                            <tbody>
                                <?php
					    foreach ($notifications as $nrow)
                                {
                                    echo "<tr>";
                                     echo "<td><span class='title'>".$nrow['pushTitle']."</span></td>";
                                    echo "<td><span class='title'></span>".$nrow['pushMsg']."</td>";
									 echo "<td><span class='title'></span><a class='btn btn-warning delete_row' href=push.php?action=delete&id=".$nrow['id'].">Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Message</th>
                                     <th>Delete</th>
                                  
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "<p>No notification exists...</p>";
                }
                ?>
  
		
<?PHP	}
	
		 if(isset($_REQUEST['msg'])=='dell'){?>
		 
		 
	<?php	 }
		
		
if( isset($_REQUEST['send_notification'])){


    ?>
    <aside class="right-side">
        <div class="col-md-9">
            <h1>Welcome To Al adiyat Push Notification Service.</h1>
        </div>
		<div class="login-wrapper">
            <a href="index-2.html">
                <img class="logo" src="../images/logo_adiyyat.png" style="width: 190px;height: 150px"  alt="logo" />
            </a>
		 <form method="post" action="push.php">

                       

                        <div class="form-group">
                            <label for="title">Notification Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="50" id="title" placeholder="Title" name="title" required/>
                            </div>
                        </div>

                        
						
						 <div class="form-group">
                            <label for="news-description">Push Message:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="ckeditor form-control" placeholder="Notification Msg" name="msg" maxlength="1596"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Send Notification</button>
                            
                        </div>
                    </form>
			</div>
    </aside>
    </div>
    <?php }
}
else
{
    ?>
    <script>
        window.location.replace("<?php echo base_url ?>");
    </script>
    <div style="clear:both; height:2px"></div>
    <?php
}
require_once 'footer.php';


function sendNotification( $apiKey, $registrationIdsArray, $messageData )
{   
    $headers = array("Content-Type:" . "application/json", "Authorization:" . "key=" . $apiKey);
    $data = array(
        'data' => $messageData,
        'registration_ids' => $registrationIdsArray
    );
 
    $ch = curl_init();
 
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
    curl_setopt( $ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send" );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
 
    $response = curl_exec($ch);
    curl_close($ch);
 
    return $response;
}


?>
