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