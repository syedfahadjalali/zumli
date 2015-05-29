<?php

error_reporting(E_ALL | E_STRICT);  
ini_set('display_startup_errors', 1);  
ini_set('display_errors', 1);
$link = mysqli_connect("localhost","root","","aladiyat") or die("Error " . mysqli_error($link)); 

if(isset($_REQUEST['action']))
{
	switch ($_REQUEST['action'])
	{
		case 'autocomplete':
		{
			autocomplete();
			break;
		}
		case 'retreive':
		{
			search_retreive();
			break;
		}
		case 'update':
		{	
			update();
			break;
		}
		case 'delete':
		{	

			print_r($_POST);	
			delete();
			break;
		}
	}
}

function search_retreive()
{
	global $link;
	$keyword = '%'.$_POST['results'].'%';

	$sql = "SELECT * FROM `general_news` where title like '". $keyword . "'";

	$result = $link->query($sql);

	$data = '<div class="table-responsive">
		</br><h2>Available News:</h2><hr></br>
		<table class="table table-hover" id="data_table">
		<thead>
		  <tr>
		    <th></th>
		    <th>Title</th>
		    <th>Review Text</th>
		    <th>Thumbnail</th>
		    <th>News Description</th>
		    <th>News Date</th>
		    <th>Extra Data</th>
			<th>Edit</th>
			<th>Delete</th>
		  </tr>
		 </thead>
		 <tbody>';

		foreach ($result as $rs)
		{
			$data .= '<tr><td><input type="hidden" name="id" class="select_single" value="'. $rs['id'] . '" /></td>';
			$data .= '<td><span class="title">' . $rs['title'] . '</span></td>';
			$data .= '<td><span class="review_text">' . $rs['review_text'] . '</span></td>';
			$data .= '<td><span class="thumbnail_image">' . $rs['thumbnail_image'] . '</span></td>';
			$data .= '<td><span class="news_details_description">' . $rs['news_details_description'] . '</span></td>';
			$data .= '<td><span class="news_date">' . $rs['news_date'] . '</span></td>';
			$data .= '<td><span class="data">' . $rs['data'] . '</span></td>';
			$data .= '<td><a href="#" class="btn btn-success edit_row">Edit</a></td>';
			$data .= '<td><a href="#" class="btn btn-warning delete_row">Delete</a></tr>';
		}

		$data .= '</tbody></table></div>';
		echo $data;
}

function autocomplete()
{
	global $link;

	$keyword = '%'.$_POST['keyword'].'%';
	$sql = "SELECT * FROM `general_news` where title like '". $keyword . "'";
	$result = $link->query($sql); 

	foreach ($result as $rs)
	{
		// put in bold the written text
		$titleName = str_replace( $_POST['keyword'], '<b>' . $_POST['keyword'] . '</b>', $rs['title'] );
		// add new option
	    echo '<li class="list-group-item" data-option="' . $rs['title']. ',' . $rs['id'] . '">' . $titleName . '</li>';
	}
}

function update()
{
	global $link;

	$id = $_POST['id'];
	$title = $_POST['title'];
	$review_text = $_POST['review_text'];
	$thumbnail_image = $_POST['thumbnail_image'];
	$news_details_description = $_POST['news_details_description'];
	$news_date = $_POST['news_date'];
	$data = $_POST['data'];

	$query = "UPDATE general_news SET title='{$title}', review_text='{$review_text}', thumbnail_image='{$thumbnail_image}', news_details_description='{$news_details_description}', news_date='{$news_date}', data='{$data}' WHERE id={$id}";
	$statement = $link->query($query);

	if( $statement )
	{
		echo "Record Successfully Updated!";
	}	
	else
	{
		echo 'Some Problem occured, please try again later';
		//echo "Error: (" . $link->errno . ")". $link->error;
	}
}

function delete()
{
	global $link;
	$id = $_POST['id'];
	$query = "DELETE FROM general_news WHERE id={$id}";
	$result = $link->query($query);

	if( $result )
	{
		echo "Record Deleted Successfully!";
	}
	else
	{
		echo "Some Problem Occurred, Please Try Again Later!";
		//echo "Error: (" . $link->errno . ")". $link->error;
	}
}

?>