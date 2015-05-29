<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';

if (isset($_SESSION['name']))
{

    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';

    if ($action == 'show_records')
    {
		
	if($language==0)
    $sql  = "SELECT id, name, url FROM social_links order by id desc";
	else
	$sql  = "SELECT id, name, url FROM social_links_a order by id desc";
	
		
	$news = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">

  
			<?php	
			
                if ($news->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Url</th>
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
                                
                                    echo "<td><span class='title'>" . $single_news['name'] . "</span></td>";
                                    //echo "<td><span class='review_text'>" . $single_news['review_text'] . "</span></td>";
                                    echo "<td><span class='news_date'>" . $single_news['url'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=".$single_news['id']."' class='btn btn-success' data-action='update' data-category='news' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'>Edit</a></td>";

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Edit</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "<p> No Social linnk exists...</p>";
                }
                ?>
            </div>

            <?php
        }

        else if ($action == 'edit_records')
        {
 		if($language==0)
        $sql  = "SELECT id, name, url FROM social_links where id=".$_GET['id'];
		else
		$sql  = "SELECT id, name, url FROM social_links_a where id=".$_GET['id'];
        $news = $link->query($sql);
        foreach ($news as $single_news)
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Edit Social Links</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                   <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="socialLinks"/>
  <input type="hidden" name="recid" value="<?php echo $single_news['id'] ?>"/>
                        <div class="form-group">
                            <label for="title">Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-file"></i>
                                </span>
                                <input  value="<?php echo $single_news['name'] ?>"  type="text" class="validate[required] form-control" id="name" placeholder="Name" name="SocialName" required/>
                            </div>
                        </div>

						 <div class="form-group">
                            <label for="news-date">Url:</label>
                            <div class="input-group">
                               <span class="input-group-addon">
                                <i class="fa fa-file"></i>
                                </span>
                          <input value="<?php echo $single_news['url'] ?>" type="text" class="validate[required, custom[date]] form-control" id="soicailUrl" placeholder="Url" name="soicailUrl" required/>
                            </div>
                        </div>

                   
                       <br/>
    <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Social link</button>
    <!--                        <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                             <a href="?action_request=show_records" class="btn btn-warning">View Social links</a>
                 
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
 <script>   alert("Social link Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Race Course Races Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race Course Races Deleted Successfully");</script>
<?php }  
require_once 'footer.php';
?>