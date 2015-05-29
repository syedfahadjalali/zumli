<?php
	
	error_reporting(E_ALL | E_STRICT);  
	ini_set('display_startup_errors',1);  
	ini_set('display_errors',1);
	$title = 'Welcome Admin in Aladiyat';
	require_once 'header.php';
	require_once 'sidebar.php';
	require_once '../includes/db.php';
	require_once '../api/general.php';
	$db = Db::getDbInstance();

	$general = new General();

	if(isset($_POST['submit']))
	{
		print_r($_POST);
		print_r($_FILES);
		/*foreach( $_FILES['thumbnail'] as $key => $value )
		{	
			$fileStatus  = $general->checkImageUploadError($_FILES['thumbnail']);
			
			if( $fileStatus['status'] == 'error')
			{

			}
		}
*/
		//$general->imageUploading($_FILES['thumbnail'], 'news_', '../images/thumbnails/');
	}
?>

<div class="col-md-9">
	<div class="alert" style="display:none;"></div>
	<form id="custom-form" role="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <div class="form-group">
	    <label for="title">Title:</label>
	    <div class="input-group">
	    	<span class="input-group-addon"><i class="fa fa-tumblr"></i></span><input type="text" class="validate[required] form-control" id="title" placeholder="Title" name="title" >
	  	</div>
	  </div>
	  
	  <div class="form-group">
	    <label for="review-text">Review Text:</label>
	    <div class="input-group">
	    	<span class="input-group-addon">
	    		<i class="fa fa-calendar"></i>
	    	</span>
	    	<input type="text" class="validate[required] form-control" id="review-text" placeholder="Review" name="review">
	  	</div>
	  </div>
	  
	  <div class="form-group">
	    <label for="news-date">News Date:</label>
	    <div class="input-group">
	    	<span class="input-group-addon">
	    		<i class="fa fa-calendar"></i>
	    	</span>
	    <input type="datetime" class="validate[required, custom[date]] form-control datepicker" id="news-date" placeholder="News Date" name="date">
	  	</div>
	  </div>

	  <div class="form-group">
	    <label for="news-description">News Description:</label>
	    <div class="input-group">
	    	  <span class="input-group-addon"><i class="fa fa-align-justify" style="font-size: 18px;"></i></span><textarea class="form-control" placeholder="News Description" name="description"></textarea>
	  	</div>
	  </div>

	  <div class="form-group">
	    <label for="news-data">News Data:</label>
	    <div class="input-group">
	    	<span class="input-group-addon">
	    		<i class="fa fa-database"></i>
	    	</span>
	    	<input type="text" class="form-control" id="news-data" placeholder="News Data" name="data">
	  	</div>
	  </div>

	  <div class="form-group">
	    <label for="thumbnail">Select News Thumbnail</label>
	    <div class="input-group">
	    	<span class="input-group-addon">
	    		<i class="fa fa-file"></i>
	    	</span>
	    <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" >
	  	</div>
	  </div><br/>

	  <div id="dynamic_content" class="form-group">
	  	<p>if News have images, click on Add Image button to select images</p>
	  	<button type="button"  id="btAdd" >Add Image</button>
	  	<span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
	  </div><br/>

	  <div class="form-group">
  	  	<button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
  	  </div>
	</form>
</div>

<?php
	require_once 'footer.php';
?>