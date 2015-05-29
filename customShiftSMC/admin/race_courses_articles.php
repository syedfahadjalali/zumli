<?php
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Add Columnists Articles';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
if (isset($_SESSION['name']))
{
    $general = new General();
    if (isset($_SESSION['language']))
    {
        $language = $_SESSION['language'];
    }
    else
    {
        $language = 0;
    }

    $sql    = "SELECT id, name from " . $general->race_course[$language];
    $result = $link->query($sql);
    ?>

    <aside class="right-side">
        <div class="col-md-9">
            <div class="alert" style="display:none;"></div>
            <h2>Add Race Course Articles:</h2>
            <div id='loadingmessage' style='display:none'>
                <img src='../images/loader.gif'/>
            </div>
            <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                <input type="hidden" name="action" value="insert"/>
                <input type="hidden" name="category" value="race_course_articles"/>

                <div class="form-group">
                    <label for="race_course_id">Select Race Course:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tumblr"></i>
                        </span>
                        <select id="race_course_id" name="race_course_id" class="form-control">
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
                    <label for="title">Title:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tumblr"></i>
                        </span>
                        <input type="text" class="validate[required] form-control" id="title" placeholder="Race Course Article Title" name="title" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="article_date">Article Date:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="date" class="validate[required, custom[date]] form-control" id="article_date" placeholder="Article Date" name="article_date" min="1980-01-01" max="2050-12-31" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Race Cousre Article Description:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                        </span>
                        <textarea class="form-control" id="description" placeholder="Race Cousre Article Description" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="data">Article Data(optional):</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="validate[required, custom[date]] form-control" id="data" placeholder="optional" name="data">
                    </div>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Select Article Thumbnail</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </span>
                        <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                    </div>
                </div><br/>

                <div id="dynamic_content" class="form-group">
                    <p>If Race Course Articles have images, click on Add Image button to add more Images!</p>
                    <button type="button"  id="btAdd" >Add Image</button>
                    <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                </div><br/>

                <div class="form-group">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Add Race Course</button>
                </div>
            </form>
        </div>
    </aside>
    </div>
    <?php
}
else
{
    ?>
    <script>    window.location.replace("<?php echo base_url ?>");</script>
    <?php
}
require_once 'footer.php';
?>