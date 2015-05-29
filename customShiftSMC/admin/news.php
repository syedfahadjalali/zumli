<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';  ?>

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
// Activate Deactivate //

if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
		if (isset($_GET['rid']))
		{
			
			 $post_id   = $_GET['rid'];
			 $lan = $_SESSION['language'];
	
		if($lan==0){
			
			$sql1 = 'Select is_active from general_news WHERE id ="'.$post_id.'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0"){
			$mainsql = 'UPDATE  general_news SET is_active="1" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);}
			else{
			$mainsql = 'UPDATE  general_news SET is_active="0" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);}
			
		}
		else
		{
			$sql1 = 'Select is_active from general_news_a WHERE id ="'.$post_id.'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0")
			{
			$mainsql = 'UPDATE general_news_a SET is_active="1" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);
			}
			else{
			$mainsql = 'UPDATE  general_news_a SET is_active="0" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);
			}
			
			}
		}
		
		// --- end activation and deactivattion


    if ($action == 'show_records')
    {
        $general=new General();
        if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
        else
        {
            $language=0;
        }
	
if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){	
        $sql  = "SELECT id, title, review_text, thumbnail_image, news_details_description, news_date, data, news_cata, is_active FROM ".$general->news[$language]." WHERE   news_cata ='Dubai World Cup' order by news_date desc, id desc";
	}elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){
		        $sql  = "SELECT id, title, review_text, thumbnail_image, news_details_description, news_date, data, news_cata, is_active FROM ".$general->news[$language]. " WHERE   news_cata ='Equestrain' order by news_date desc, id desc";
	
	}else{
		
		 $sql  = "SELECT id, title, review_text, thumbnail_image, news_details_description, news_date, data, news_cata, is_active FROM ".$general->news[$language]. " WHERE   news_cata ='News' order by news_date desc, id desc";
		
		}

		
	$news = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
         <?php   if(isset($_REQUEST['type']) && $_REQUEST['type']!=''){	 ?>
                <br/><a href="?action_request=insert_records&type=<?php echo $_REQUEST['type'] ?>" class="btn btn-primary"><?php   if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?>Add Dubai World Cup News<?php }else{ ?>Add Equestrian News<?php } ?></a><br/><br/>
              <?php }else{ ?>
                 <br/><a href="?action_request=insert_records" class="btn btn-primary">Add News</a>	<br/><br/>
                <?php }
				
			
                if ($news->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none" >
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <!--<th>Review Text</th>-->
                                    <th>News Date</th>
									<th>Active/Deactive</th>
                                    <!-- <th>Description</th> -->
                                    <!--<th>Extra Data</th>-->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Edit Images</th>
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
                                    echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $single_news['thumbnail_image'] . "' data-action='thumbnail' data-category='news1' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'/></td>";
                                    echo "<td><span class='title'>" . $single_news['title'] . "</span></td>";
                                    //echo "<td><span class='review_text'>" . $single_news['review_text'] . "</span></td>";
                                    echo "<td><span class='news_date'>" . $single_news['news_date'] . "</span></td>";
                                    // echo "<td><span class='news_details_description'>" . $single_news['news_details_description'] . "</span></td>";
                                    //echo "<td><span class='data'>" . $single_news['data'] . "</span></td>";
									 if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){
                                   echo "<td><a href='?type=dbc&rid={$single_news['id']}&post_type=1' class='description' data-action='activate_race_row' data-category='activate_race_row' data-post_id='" . $single_news['id'] . "' data-post_type='activate_race_row'>";
								    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){
									echo "<td><a href='?type=eqn&rid={$single_news['id']}&post_type=1' class='description' data-action='activate_race_row' data-category='activate_race_row' data-post_id='" . $single_news['id'] . "' data-post_type='activate_race_row'>";	 
									 }else{
										 echo "<td><a href='?rid={$single_news['id']}&post_type=1' class='description' data-action='activate_race_row' data-category='activate_race_row' data-post_id='" . $single_news['id'] . "' data-post_type='activate_race_row'>";
									 }
									  if($single_news['is_active']==1){?>
									    <img src="on.png" width="25%" />	 
										<?php }else{?>
								          <img src="off.png" width="25%" /> 
								 <?php  }
								 echo "</a></td>";
								   
								    echo "<td><a href='?action_request=edit_records&id=" . $single_news['id'] ."&type=".$type."' class='btn btn-success' data-action='update' data-category='news' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='news' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'>Delete</a></td>";
                                    if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){
                                            echo "<td><a href='./images.php?id={$single_news['id']}&post_type=1&post_g=1' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                    } else if(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){
                                            echo "<td><a href='./images.php?id={$single_news['id']}&post_type=1&post_g=2' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                    } else 
                                            echo "<td><a href='./images.php?id={$single_news['id']}&post_type=1&post_g=3' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                    
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <!--<th>Review Text</th>-->
                                    <th>News Date</th>
                                    <!-- <th>Description</th> -->
                                    <!--<th>Extra Data</th>-->
									<th>Active/Deactive</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Edit Images</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "<p>There are no News exists...</p>";
                }
                ?>
            </div>

            <?php
        }
        else if ($action == 'insert_records')
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2><?php   if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?>Add Dubai World Cup News<?php }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){ ?>Add Equestrian News<?php }else{ ?>Add News<?php } ?></h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="news"/>
      <input type="hidden" name="newsType" value="<?php if(isset($_REQUEST['type'])&& $_REQUEST['type']!=''){ echo $_REQUEST['type'];} ?>" />			
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="150" id="title" placeholder="Title" name="title" required/>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="review-text">Review Text:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="review-text" placeholder="Review" name="review">
                            </div>
                        </div>
                        -->
						
						
						 <div class="form-group">
                            <label for="news-date">Please Select Category:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <select name="news_cata" id="news_cata" class="news_cata">
								<option selected="selected" value="News">News</option>
								<option <?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?> selected="selected"<?php } ?>value="Dubai World Cup">Dubai World Cup</option>
								<option <?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){?> selected="selected"<?php } ?> value="Equestrain">Equestrian</option>
								</select>
                            </div>
							</div>
							

                        <div class="form-group">
                            <label for="news-date">News Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required, custom[date]] form-control date-picker" id="news-date" placeholder="News Date" name="date" min="1980-01-01" max="2050-12-31" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="news-description">News Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="ckeditor form-control" placeholder="News Description" name="description"></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="news-data">News Data:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="news-data" placeholder="News Data" name="data">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="thumbnail">Select News Thumbnail (Size 200x200 Pixels)</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <p>Select Banner Images, (Size 420x150 Pixels, Max. size is 2MB)</p>
                            <button type="button"  id="btAdd8" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/>

                        <div class="form-group">
                                         <button type="submit" class="btn btn-primary" name="submit" id="submit"><?php if(isset($_REQUEST['type']) && @$_REQUEST['type']=='dbc'){?>Add Dubai World Cup News<?php }elseif(@$_REQUEST['type']=='eqn'){ ?>Add Equestrian News<?php }else{ ?>Add News<?php } ?></button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                        <?php  if(isset($_REQUEST['type']) && @$_REQUEST['type']!=''){  ?>
                            <a href="?action_request=show_records&type=<?php echo $_REQUEST['type']; ?>" class="btn btn-warning"><?php if(isset($_REQUEST['type']) && @$_REQUEST['type']=='dbc'){?>view Dubai World Cup News<?php }elseif(@$_REQUEST['type']=='eqn'){ ?>view Equestrian News<?php } ?></a>
                            <?php }else{?>
                               <a href="?action_request=show_records" class="btn btn-warning">View News</a>
                             <?php  } ?>
                        </div>
                    </form>
                </div>
                <?php
            }
        else if ($action == 'edit_records')
        {
            $general=new General();
        if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
        else
        {
            $language=0;
        }
        $sql  = 'SELECT id, title, review_text, thumbnail_image, news_details_description, news_date, data FROM '.$general->news[$language]. " where id=".$_GET['id'];
        $news = $link->query($sql);
        foreach ($news as $single_news)
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2><?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?>Edit Dubai World Cup News<?php }elseif($_REQUEST['type']=='eqn'){ ?>Edit Equestrian News<?php }else{ ?>Edit News<?php } ?></h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="news"/>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $single_news['title'] ?>" maxlength="150" type="text" class="validate[required] form-control" id="title" placeholder="Title" name="title" required/>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="review-text">Review Text:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="review-text" placeholder="Review" name="review">
                            </div>
                        </div>
                        -->
			            <input type="hidden" name="newsType" value="<?php if(isset($_REQUEST['type'])&& $_REQUEST['type']!=''){ echo $_REQUEST['type'];} ?>" />			
						 <div class="form-group">
                            <label for="news-date">Please Select Category:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <select name="news_cata" id="news_cata" class="news_cata">	
                                <option <?php if(isset($_REQUEST['type']) && $_REQUEST['type']==''){?> selected="selected"<?php } ?> value="News">News</option>
								<option <?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?> selected="selected"<?php } ?>value="Dubai World Cup">Dubai World Cup</option>
								<option <?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){?> selected="selected"<?php } ?> value="Equestrain">Equestrian</option>
								</select>
                            </div>
							</div
							

                        ><div class="form-group">
                            <label for="news-date">News Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single_news['news_date'] ?>" type="text" class="validate[required, custom[date]] form-control date-picker" id="news_date" placeholder="News Date" name="news_date" min="1980-01-01" max="2050-12-31" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="news-description">News Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="ckeditor form-control" placeholder="News Description" name="description"><?php echo $single_news['news_details_description'] ?></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="news-data">News Data:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="news-data" placeholder="News Data" name="data">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="thumbnail">Select News Thumbnail (Size 200x200 Pixels)</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $single_news['thumbnail_image']; ?>' data-action='thumbnail' data-category='news' data-post_id='<?php echo $single_news['id']; ?>' data-post_type='<?php echo $single_news['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div> -->
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <!-- <p>If News have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $single_news['id'] ?>&post_type=1&post_g=<?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){
                                            echo "1";
                                    } else if(isset($_REQUEST['type']) && $_REQUEST['type']=='eqn'){
                                            echo "2";
                                    } else {
                                            echo "3";
											} ?>">Edit Image(s)</a>
							
							
							 
							
							
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit"><?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?>Update Dubai World Cup News<?php }elseif($_REQUEST['type']=='eqn'){ ?>Update Equestrian News<?php }else{ ?>Update News<?php } ?></button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                        <?php  if(isset($_REQUEST['type']) && $_REQUEST['type']!=''){  ?>
                            <a href="?action_request=show_records&type=<?php echo $_REQUEST['type']; ?>" class="btn btn-warning"><?php if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc'){?>view Dubai World Cup News<?php }elseif($_REQUEST['type']=='eqn'){ ?>view Equestrian News<?php } ?></a>
                            <?php }else{?>
                               <a href="?action_request=show_records" class="btn btn-warning">View News</a>
                             <?php } ?>  
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
if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc' && @$_REQUEST['msg']=='2' ){ 
 $typeupd = "Dubai World Cup News Updated Successfully";
}elseif(@$_REQUEST['type']=='eqn'){
	 $typeupd = "Equestrian News Updated Successfully";
}else{
	 $typeupd = "News Updated Successfully";
	}
	
if(isset($_REQUEST['type']) && $_REQUEST['type']=='dbc' && @$_REQUEST['msg']=='1' ){ 
 $type = "Dubai World Cup News Inserted Successfully";
}elseif(@$_REQUEST['type']=='eqn'){
	 $type = "Equestrian News Inserted Successfully";
}else{
	 $type = "News Inserted Successfully";
	}	
	

if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='2'){ ?>	
 <script>   alert("<?php echo $typeupd; ?>");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("<?php echo $type; ?>");</script>
<?php } ?>
<?php
require_once 'footer.php';
?>