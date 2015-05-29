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
<!--<script>
var myDiv = $('#coldes');
myDiv.text(myDiv.text().substring(0,300))
</script>
<style>
#coldes{
  text-overflow:ellipsis !important;
}
</style> -->

<?php
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Add Columnists Articles';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
if (isset($_SESSION['name']))
{
    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';
	
	//---acttive deactive
	
	if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
		if (isset($_GET['rid']))
		{
			
			 $post_id   = $_GET['rid'];
			 $lan = $_SESSION['language'];
	
		if($lan==0){
			
			$sql1 = 'Select is_active from columnists_articles WHERE id ="'.$post_id.'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0"){
			$mainsql = 'UPDATE  columnists_articles SET is_active="1" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);}
			else{
			$mainsql = 'UPDATE  columnists_articles SET is_active="0" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);}
			
		}
		else
		{
			$sql1 = 'Select is_active from columnists_articles_a WHERE id ="'.$post_id.'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0")
			{
			$mainsql = 'UPDATE columnists_articles_a SET is_active="1" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);
			}
			else{
			$mainsql = 'UPDATE  columnists_articles_a SET is_active="0" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);
			}
			
			}
		}
	
	//end activation deactivation
	
if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
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
        $sql      = 'SELECT id, columnists_id, title, description, article_date, thumbnail_image, data, is_active FROM '
                .$general->column_articles[$language]. ' order by article_date desc';
        $articles = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-primary">Add Articles</a><br/><br/>

                <?php
                if ($articles->num_rows > 0)
                {
                    ?>
                <div class="span12" style="overflow: auto; max-width: none">
                    <table id="records" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
								<th>Columnist Name</th>
								<th>Date</th>
                                <th>Title</th>
                                <th>Active/Deactive</th>
<!--                                <th>Description</th>-->
                                <!--<th>PDF Link</th>-->
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Edit Images</th>
                            </tr>	
                        </thead>
                        <tbody>
                            <?php
                            foreach ($articles as $article)
                            {
								$lan = $_SESSION['language'];
	
								if($lan==0){
								$sql2 = 'SELECT image FROM app_images WHERE post_id = ' . $article['id'] .' ORDER BY id ASC LIMIT 1';
								$sql3 = 'SELECT name FROM columnists WHERE id = ' . $article['columnists_id'] .' ORDER BY id ASC LIMIT 1';
								}else{
								$sql2 = 'SELECT image FROM app_images_a WHERE post_id = ' . $article['id'] .' ORDER BY id ASC LIMIT 1';
								$sql3 = 'SELECT name FROM columnists_a WHERE id = ' . $article['columnists_id'] .' ORDER BY id ASC LIMIT 1';
								}
								$images = $link->query($sql2);
								$newImage = "";
								foreach($images as $image)
								$newImage = $image;
								
								$names = $link->query($sql3);
								foreach ($names as $name)
								
                                echo "<tr>";
								echo "<td><img width='100px' class='newImage' src='../images/" . $newImage['image'] . "' data-action='ggg' data-category='columnists_articles' data-post_id='" . $article['id'] . "' data-post_type='" . $article['columnists_id'] . "'/></td>";
								 echo "<td><span class='title'>" . $name['name'] . "</span></td>";
								 echo "<td><span class='article_date'>" . $article['article_date'] . "</span></td>";
                                echo "<td><span class='title'>" . $article['title'] . "</span></td>";
                                
								echo "<td><a href='?rid={$article['id']}&post_type=3' class='description' data-action='activate_race_row' data-category='activate_race_row' data-post_id='" . $article['id'] . "' data-post_type='activate_race_row'>";
								     if($article['is_active']==1){?>
									    <img src="on.png" width="25%" />	 
										<?php }else{?>
								          <img src="off.png" width="25%" /> 
								 <?php  }
								 echo "</a></td>";
                               // echo "<td><span class='description'><div id='coldes'>" . substr($article['description'],0,300) . "</div></span></td>";
                                //echo "<td><span class='data'>" . $article['data'] . "</span></td>";
                                echo "<td><a  href='?action_request=edit_records&id=" . $article['id'] . "' class='btn btn-success' data-action='update' data-category='columnists_articles' data-post_id='" . $article['id'] . "' data-post_type='" . $article['columnists_id'] . "'>Edit</a></td>";
                                echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='columnists_articles' data-post_id='" . $article['id'] . "' data-post_type='" . $article['columnists_id'] . "'>Delete</a></td>";
                                echo "<td><a href='./images.php?id={$article['id']}&post_type=3' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Image</th>
								<th>Columnist Name</th>
								<th>Date</th>
                                <th>Title</th>
                                <th>Active/Deactive</th>
<!--                                <th>Description</th>-->
                                <!--<th>PDF Link</th>-->
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
                    echo "<p>There are no Aritcle exists...</p>";
                }
                ?>
            </div>

            <?php
        }
        else if ($action == 'insert_records')
        {
			if( $language==0){
            $sql    = "SELECT id, name from columnists";
			}else{
				$sql    = "SELECT id, name from columnists_a";
			}
            $result = $link->query($sql);
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Add Columnist Article:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="columnists_articles"/>

                        <div class="form-group">
                            <label for="columnist_id">Select Columnist:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <select id="columnist_id" name="columnist_id" class="form-control">
                                    <?php
                                    if ($result)
                                    {
                                        foreach ($result as $columnist)
                                        {
                                            echo "<option value='" . $columnist['id'] . "'>" . $columnist['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Article Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="title" placeholder="Article Title" name="title" maxlength="100" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="review-text">Article Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required] form-control date-picker" id="article_date" placeholder="Article Date" name="article_date" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="news-description">Article Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="ckeditor form-control" placeholder="Article Description" name="description"></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="data">PDF Link:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="data" placeholder="PDF Link" name="data">
                            </div>
                        </div>-->
					
                        <!--<div class="form-group">
                            <label for="thumbnail">Select Article Thumbnail:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div>--><br/>

                        <div id="dynamic_content" class="form-group">
                            <p>if Article have images, click on Add Image button to select images (Size 420x150 Pixels, Max. size is 2MB)</p>
                            <button type="button"  id="btAdd5" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Article</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Articles</a>
                        </div>
                    </form>
                </div>


                <?php
            }
        else if ($action == 'edit_records')
        {
			if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
        else
        {
            $language=0;
        }
            if($language==0)
			$sql    = "SELECT id, name from columnists";
			else
			$sql    = "SELECT id, name from columnists_a";
            $result = $link->query($sql);
             $general=new General();
        if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
        else
        {
            $language=0;
        }
        $sql      = 'SELECT id, columnists_id, title, description, article_date, thumbnail_image, data FROM '.$general->column_articles[$language]. " where id=".$_GET['id'];
        $articles = $link->query($sql);
        foreach ($articles as $article)
                            {
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Update Columnist Article:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="columnists_articles"/>

                        <div class="form-group">
                            <label for="columnist_id">Select Columnist:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <select id="columnist_id" name="columnist_id" class="form-control">
                                    <?php
                                    if ($result)
                                    {
                                        foreach ($result as $columnist)
                                        {
                                            if($columnist['id'] == $article['columnists_id']) { $isselected = "selected";} else { $isselected = ""; }
                                            echo "<option $isselected value='" . $columnist['id'] . "'>" . $columnist['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Article Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $article['title']; ?>" type="text" class="validate[required] form-control" id="title" placeholder="Article Title" name="title" maxlength="100" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="review-text">Article Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $article['article_date']; ?>" type="text" class="validate[required] form-control date-picker" id="article_date" placeholder="Article Date" name="article_date" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="news-description">Article Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="ckeditor form-control" placeholder="Article Description" name="description"><?php echo $article['description']; ?></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="data">PDF Link:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="data" placeholder="PDF Link" name="data">
                            </div>
                        </div>-->
                    
                        <!--<div class="form-group">
                            <label for="thumbnail">Select Article Thumbnail:</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php// echo $article['thumbnail_image']; ?>' data-action='thumbnail' data-category='columnists_articles' data-post_id='<?php// echo $article['id']; ?>' data-post_type='<?php// echo $article['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div> -->
                        </div>--><br/>

                        <div id="dynamic_content" class="form-group">
                            <!-- <p>if Article have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $article['id'] ?>&post_type=3">Edit Image(s)</a>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Article</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Articles</a>
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
    </aside>
</div>
   <?php 
 if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='2'){ ?>	
 <script>   alert("Columist Article Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Columist Article Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Columist Article Deleted Successfully");</script>
<?php } ?>
<?php
@$_REQUEST['msg']='';

require_once 'footer.php';
?>