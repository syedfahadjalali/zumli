<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
if (isset($_SESSION['name']))
{
    ?>
    <br/>
    <aside class="right-side">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id']) && ($_GET['post_type']))
            {
                $post_id   = $_GET['id'];
                $post_type = $_GET['post_type'];
				$lan = $_SESSION['language'];
	
		if($lan==0){
                $sql       = "SELECT `id`, `post_id`, `post_type`, `image` "
                        . "FROM `app_images` WHERE post_type=$post_type and post_id=$post_id LIMIT 0, 30 ";
		}else{
			 $sql       = "SELECT `id`, `post_id`, `post_type`, `image` "
                        . "FROM `app_images_a` WHERE post_type=$post_type and post_id=$post_id LIMIT 0, 30 ";
			}
                $images    = $link->query($sql);
               $totalImages = $images->num_rows;
                if ($images->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>IMAGE Name</th>
                                    <th>IMAGE</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($images as $image)
                                {
                                    echo "<tr>";
                                    echo "<td>{$image['image']}</td>";
                                    echo "<td><img width='150px' height='150px' src='../images/{$image['image']}'</td>";
                                    echo "<td><button class='btn btn-warning thumbnail' data-action='edit_images' data-post_name='" . $image['image'] . "' data-post_id='" . $image['id'] . "' data-post_type='" . $image['post_type'] . "'/>Edit</button></td>";
                                    echo "<td><button class='btn btn-warning deletethumbnail' data-action='delete_images' data-post_name='" . $image['image'] . "' data-post_id='" . $image['id'] . "' data-post_type='" . $image['post_type'] . "' value='{$image['id']}'/>Delete</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>IMAGE Name</th>
                                    <th>IMAGE</th>
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
                    echo "<p>There are no Images Exists Yet...</p>";
                }
                ?>
                <div class="span12" style="overflow: auto; max-width: none">
                    <?php
                    if($post_type==1){
                        if($totalImages < 8 ){
                            if($_GET['post_g']==1)
                                echo "<a href='javascript:addDwc();' class='btn btn-success uploadnewImages' data-post_id='" . $post_id ."' data-post_type='". $post_type ."' data-action='uploadnewImages'>Add Images</a>";
                            else if($_GET['post_g']==2)
                                echo "<a href='javascript:addEq();' class='btn btn-success uploadnewImages' data-post_id='" . $post_id ."' data-post_type='". $post_type ."' data-action='uploadnewImages'>Add Images</a>";
                            else
                                echo "<a href='javascript:addNews();' class='btn btn-success uploadnewImages' data-post_id='" . $post_id ."' data-post_type='". $post_type ."' data-action='uploadnewImages'>Add Images</a>";
                        }  else {
                            echo '<a href="#" class="btn btn-success" >Limit Exceed</a>';
                        }
                    }else if($post_type==3){ 
                        
                        if($totalImages < 5 ){
                           echo "<a href='javascript:addColumnist();' class='btn btn-success uploadnewImages' data-post_id='" . $post_id ."' data-post_type='". $post_type ."' data-action='uploadnewImages'>Add Images</a>";
                        }  else {
                            echo '<a href="#" class="btn btn-success" >Limit Exceed</a>';
                        }
                        
                    }else if($post_type==11){ 
                        
                        if($totalImages < 3 ){
                           echo "<a href='javascript:addAboutUs();' class='btn btn-success uploadnewImages' data-post_id='" . $post_id ."' data-post_type='". $post_type ."' data-action='uploadnewImages'>Add Images</a>";
                        }  else {
                            echo '<a href="#" class="btn btn-success" >Limit Exceed</a>';
                        }
                        
                    }  else  {
                        echo "<a href='javascript://' class='btn btn-success uploadnewImages' data-post_id='" . $post_id ."' data-post_type='". $post_type ."' data-action='uploadnewImages'>Add Images</a>";
                    }
                    ?>
                    <script>
                    
                    function addColumnist(){
                    history.pushState({}, "", "columnists_articles.php");
                    }
                    function addNews(){
                    history.pushState({}, "", "news.php"); 
                    }
                    function addDwc(){
                    history.pushState({}, "", "news.php?type=dbc"); 
                    }
                    function addEq(){
                    history.pushState({}, "", "news.php?type=eqn"); 
                    }
                    function addAboutUs(){
                    history.pushState({}, "", "about.php?action_request=edit_records"); 
                    }
                    </script>
                    <a class="btn btn-danger" href="javascript:window.history.back();">Go Back</a>
                </div>
                <?php
            }
        }
        else
        {
            ?>
        </div>
        <script>    window.location.replace("<?php echo base_url ?>");</script>
        <?php
    }
    ?>
    <br/>
</aside></div>
<?php
require_once 'footer.php';
?>