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
        $general=new General();
        if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
        }
        else
        {
            $language=0;
        }
        $sql  = 'SELECT id, name, image, url FROM '.$general->sponsors[$language]. '';
        $sponsors = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-primary">Add Partners</a><br/><br/>

                <?php
                if ($sponsors->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <!--<th>Review Text</th>-->
                                    <th>Web URL</th>
                                    <!-- <th>Description</th> -->
                                    <!--<th>Extra Data</th>-->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($sponsors as $sponsor)
                                {
                                    echo "<tr>";
                                    echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $sponsor['image'] . "' data-action='thumbnail' data-category='partner' data-post_id='" . $sponsor['id'] . "' data-post_type='" . $sponsor['id'] . "'/></td>";
                                    echo "<td><span class='title'>" . $sponsor['name'] . "</span></td>";
                                    //echo "<td><span class='review_text'>" . $single_news['review_text'] . "</span></td>";
                                    echo "<td><span class='news_date'>" . $sponsor['url'] . "</span></td>";
                                    // echo "<td><span class='news_details_description'>" . $single_news['news_details_description'] . "</span></td>";
                                    //echo "<td><span class='data'>" . $single_news['data'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=" . $sponsor['id'] . "' class='btn btn-success' data-action='update' data-category='news' data-post_id='" . $sponsor['id'] . "' data-post_type='" . $sponsor['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='partners' data-post_id='" . $sponsor['id'] . "' data-post_type='" . $sponsor['id'] . "'>Delete</a></td>";
                                   // echo "<td><a href='./images.php?id={$sponsor['id']}&post_type=1' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <!--<th>Review Text</th>-->
                                    <th>WEB URL</th>
                                    <!-- <th>Description</th> -->
                                    <!--<th>Extra Data</th>-->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "<p>There are no Partners exists...</p>";
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
                    <h2>Add Partners</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="partners"/>

                        <div class="form-group">
                            <label for="title">Name Of Partner:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="50" id="name" placeholder="Partner Name" name="name" required/>
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
                            <label for="title">Website Address of Partner:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="50" id="url" placeholder="URL" name="url" required/>
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
                            <label for="thumbnail">Select Partner Logo Image: (Size 200X200 Pixels)</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div>
				
						<br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Partner</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Partners</a>
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
        $sql  = 'SELECT id, name,url, image FROM '.$general->sponsors[$language]. " where id=".$_GET['id'];
        $news = $link->query($sql);
        foreach ($news as $single_news)
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Edit AlAdiyat Partners</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                   

                       
<form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                       <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="partners"/>
                        <div class="form-group">
                            <label for="title">Name Of Partner:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="50" id="name" value="<?php echo $single_news['name'];   ?>" placeholder="Title" name="name" required/>
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
                            <label for="title">Website Address Of Partner:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="50" value="<?php echo $single_news['url'];   ?>" id="url" placeholder="URL" name="url" required/>
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
<input type="hidden" id="thumbnail" class="validate[required] form-control" name="image" value="<?php  echo $single_news['image']?>" />
                        <br/>
                        		<div class="form-group">
                            <label for="cover_photo">Partner Photo: (Size 200X200 Pixels)</label>
                            <img width="100px" data-post_type="<?php  echo $single_news['id']?>" data-post_id="<?php  echo $single_news['id']?>" data-category="partner" data-action="thumbnail" src="../images/thumbnails/<?php  echo $single_news['image']?>" class="thumbnail">
       
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <img width='100px' class='thumbnail' src='../images/thumbnails/' data-action='thumbnail' data-category='race_courses' data-post_id='' data-post_type='30'/>                                <input type="file" id="cover_photo" class="validate[required] form-control" name="cover_photo" required/>
                            </div> -->
                        </div>
                       <br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Partners</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Partners</a>
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
 <script> alert("Partner Record Updated Successfully"); </script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Partner Record Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race Course Races Deleted Successfully");</script>
<?php }   
require_once 'footer.php';
?>