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
        $sql  = 'SELECT id, title, review_text, thumbnail_image, news_details_description, news_date, data FROM '.$general->news[$language]. ' order by news_date desc, id desc';
        $news = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-primary">Add News</a><br/><br/>

                <?php
                if ($news->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <!--<th>Review Text</th>-->
                                    <th>News Date</th>
                                    <!-- <th>Description</th> -->
                                    <!--<th>Extra Data</th>-->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Edit Images</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($news as $single_news)
                                {
                                    echo "<tr>";
                                    echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $single_news['thumbnail_image'] . "' data-action='thumbnail' data-category='news1' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'/></td>";
                                    echo "<td><span class='title'>" . $single_news['title'] . "</span></td>";
                                    //echo "<td><span class='review_text'>" . $single_news['review_text'] . "</span></td>";
                                    echo "<td><span class='news_date'>" . $single_news['news_date'] . "</span></td>";
                                    // echo "<td><span class='news_details_description'>" . $single_news['news_details_description'] . "</span></td>";
                                    //echo "<td><span class='data'>" . $single_news['data'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=" . $single_news['id'] . "' class='btn btn-success' data-action='update' data-category='news' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='news' data-post_id='" . $single_news['id'] . "' data-post_type='" . $single_news['id'] . "'>Delete</a></td>";
                                    echo "<td><a href='./images.php?id={$single_news['id']}&post_type=1' class='btn btn-warning edit_images'>Edit Images</a></td>";
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
                    <h2>Add Racecourse News</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="news"/>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" maxlength="50" id="title" placeholder="Title" name="title" required/>
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
                            <label for="news-date">News Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="validate[required, custom[date]] form-control" id="news-date" placeholder="News Date" name="date" required/>
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
                            <label for="thumbnail">Select News Photo</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <p>If News have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Add News</button>
                            <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>
                            <a href="?action_request=show_records" class="btn btn-warning">View News</a>
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
                    <h2>Edit Racecourse News</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="news"/>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $single_news['title'] ?>" maxlength="50" type="text" class="validate[required] form-control" id="title" placeholder="Title" name="title" required/>
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
                            <label for="news-date">News Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single_news['news_date'] ?>" type="date" class="validate[required, custom[date]] form-control" id="news_date" placeholder="News Date" name="news_date" required/>
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
                            <label for="thumbnail">Select News Photo</label>
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
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $single_news['id'] ?>&post_type=1">Edit Image(s)</a>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update News</button>
                            <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>
                            <a href="?action_request=show_records" class="btn btn-warning">View News</a>
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
require_once 'footer.php';
?>