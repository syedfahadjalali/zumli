<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';  ?>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
jQuery(document).ready(function($) {
  $('.date-picker').datepicker({ dateFormat: 'yy-mm-dd'});
});
</script>

<script type='text/javascript' src='../scripts/ckeditor/ckeditor.js'></script>


<script>
    $(document).ready(function() {

        $("#custom-form").submit(function(){
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
            return true;
        });
	    });
	

</script>
<?php
if (isset($_SESSION['name']))
{

    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';

    if ($action == 'show_records')
    {
		if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
		}else{
		 $language=0;
		}
		if($language==0){
    $sql  = "SELECT * FROM emailsettings";
		}else{
			$sql  = "SELECT * FROM emailsettings_a";
			}
	
		
	$news = $link->query($sql);
        ?>
        <aside class="right-side">
		<div class="row">
		 <div class="col-md-12"> <h1><center>Email Settings</center></h1></div></div>
            <div class="col-md-12">

  
			<?php	
			
                if ($news->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>To</th>
                                    <th>Success Msg</th>
                                    <th>Failure Msg</th>
									<th>Edit</th>
                               </tr>	
                            </thead>
                            <tbody>
                                <?php
			
					          if(isset($_REQUEST['type']) && $_REQUEST['type']!=''){
								  $type = $_REQUEST['type'];
							  }else{
								  $type ='';
								}
								  
                                foreach ($news as $single_news)
                                {
                                    echo "<tr>";
                                
                                    echo "<td><span class='title' title='The email address of receiver. Example: info@aldiyat.ae'>" . $single_news['EmailTo'] . "</span></td>";
                                    //echo "<td><span class='review_text'>" . $single_news['review_text'] . "</span></td>";
                                    echo "<td><span class='news_date' title='The success msg. This message will be deliver to application on successful  email delivery'>" . $single_news['EmailCC'] . "</span></td>";
									echo "<td><span class='news_date' title='The failure msg. This message will be deliver to application if system was unable to deliver email'>" . $single_news['EmailBack'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=".$single_news['id']."' class='btn btn-success' data-action='update' data-category='news' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'>Edit</a></td>";

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>To</th>
                                    <th>Success Msg</th>
									<th>Failure Msg</th>
                                    <th>Edit</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "<p> No Settings exists...</p>";
                }
                ?>
            </div>

            <?php
        }

        else if ($action == 'edit_records')
        {
 if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
		}else{
		 $language=0;
		}
		if($language==0){
        $sql  = "SELECT * FROM emailsettings where id=".$_GET['id'];
		}else{
			 $sql  = "SELECT * FROM emailsettings_a where id=".$_GET['id'];
			}
        $news = $link->query($sql);
        foreach ($news as $single_news)
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Edit Email Settings</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="emailSettings"/>
  <input type="hidden" name="recid" value="<?php echo $single_news['id'] ?>"/>
                        <div class="form-group">
                            <label for="title">To:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-file"></i>
                                </span>
                                <input value="<?php echo $single_news['EmailTo'] ?>"  type="text" class="validate[required] form-control" id="to" placeholder="To" name="emmailTo" required/>
                            </div>
                        </div>

						 <div class="form-group">
                            <label for="news-date">Success Msg</label>
                            <div class="input-group">
                               <span class="input-group-addon">
                                <i class="fa fa-file"></i>
                                </span>
                          <input value="<?php echo $single_news['EmailCC'] ?>" type="text" class="validate[required, custom[date]] form-control" id="cc" placeholder="CC" name="emailCc" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="news-date">Failure Msg</label>
                            <div class="input-group">
                               <span class="input-group-addon">
                                <i class="fa fa-file"></i>
                                </span>
                          <input value="<?php echo $single_news['EmailBack'] ?>" type="text" class="validate[required, custom[date]] form-control" id="back_copy" placeholder="CC to Sender" name="back_copy" required/>
                            </div>
                        </div>

                   
                       <br/>
    <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Email Settings</button>
    <!--                        <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                             <a href="?action_request=show_records" class="btn btn-warning">View Email Settings</a>
                 
                        </div>
                    </form>
                </div>
                <?php
            }
            }
        }
        else
        {
            ?>
            <script>    window.location.replace("<?php echo base_url ?>");</script>
            <?php
        }
        ?>
    </aside></div>
 <?php 
 if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='2'){ ?>	
 <script>   alert("Email Settings Updated Successfully");</script>
<?php }
require_once 'footer.php';
?>