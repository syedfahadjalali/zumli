<?php 
header("Content-Type: text/html;charset=UTF-8");
error_reporting(1);
ini_set('display_errors', 1);
require_once '../includes/dbConfig.php';
require_once '../api/general.php';
session_start();
// print_r($_FILES);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//die();
$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME) or die("Error " . mysqli_error($link));

if (isset($_POST['action']))
{
    switch ($_POST['action'])
    {
        case 'insert':
            {
                switch ($_POST['category'])
                {
                    case 'news': //1
                        {
                            insertNews();
                            break;
                        }
					case 'partners': //1
                        {
                            insertPartners();
                            break;
                        }
                    case 'columnists': //2
                        {
                            insertColumnists();
                            break;
                        }
                    case 'columnists_articles': //3
                        {
                            insertColumnistsArticles();
                            break;
                        }
                    case 'race_courses': //4
                        {
                            insertRaceCourses();
                            break;
                        }
                    case 'race_course_offers': //5
                        {
                            insertRaceCourseOffers();
                            break;
                        }
                    case 'race_course_articles': //6
                        {
                            insertRaceCourseArticles();
                            break;
                        }
                    case 'race_course_races': //7
                        {
                            insertRaceCourseRaces();
                            break;
                        }
                    case 'race_course_track': //8
                        {
                            insertRaceCourseTrack();
                            break;
                        }
                    case 'race_course_contact': //9
                        {
                            insertRaceCourseContact();
                            break;
                        }
                    case 'race_course_entry': //10
                        {

                            break;
                        }
                    case 'horse' : //11
                        {

                            break;
                        }
                    case 'horse_owner': //12
                        {

                            break;
                        }
                    case 'horse_trainer': //13
                        {

                            break;
                        }
                    case 'jockey': //14
                        {

                            break;
                        }
                    case 'result': //15
                        {

                            break;
                        }
                    case 'publications': //16
                        {
                            insertPublications();
                            break;
                        }
                    case 'insertAdmin': //17
                        {
                            insertAdmin();
                            break;
                        }
                    case 'insertGeneralDetails': //18
                        {
                            insertGeneralDetails();
                            break;
                        }
                    case 'insertAboutUs': //18
                        {
                            insertAboutUs();
                            break;
                        }
                    case 'insertContactUs': //18
                        {
                            insertContactUs();
                            break;
                        }
                    default: //19
                        {
                            echo "Not Exists, In Insert Category!";
                        }
                }
                break;
            }
        case 'update':
            {
                switch ($_POST['category'])
                {
                    case 'news': //1
                        {
                            updateNews();
                            break;
                        }
					case 'partners': //1
                        {
                            updatePartners();
                            break;
                        }
                    case 'columnists': //2
                        {
                            updateColumnists();
                            break;
                        }
                    case 'columnists_articles': //3
                        {
                            updateColumnistsArticles();
                            break;
                        }
                    case 'race_courses': //4
                        {
                            updateRaceCourses();
                            break;
                        }
                    case 'race_course_offers': //5
                        {
                            insertRaceCourseOffers();
                            break;
                        }
                    case 'race_course_articles': //6
                        {
                            insertRaceCourseArticles();
                            break;
                        }
                    case 'race_course_races': //7
                        {
                            updateRaceCourseRaces();
                            break;
                        }
                    case 'race_course_track': //8
                        {
                            updateRaceCourseTrack();
                            break;
                        }
                    case 'race_course_contact': //9
                        {
                            updateRaceCourseContact();
                            break;
                        }
                    case 'updateAdmin': //17
                        {
                            updateAdmin();
                            break;
                        }
                    case 'race_course_entry': //10
                        {

                            break;
                        }
                    case 'horse' : //11
                        {

                            break;
                        }
                    case 'horse_owner': //12
                        {

                            break;
                        }
                    case 'horse_trainer': //13
                        {

                            break;
                        }
                    case 'jockey': //14
                        {

                            break;
                        }
                    case 'result': //15
                        {

                            break;
                        }
                    case 'publications': //16
                        {
                            updatePublications();
                            break;
                        }
                    case 'aboutus': //16
                        {
                            updateAboutUs();
                            break;
                        }
                    case 'contactus': //16
                        {
                            updateContactUs();
                            break;
                        }
                    case 'generaldetails': //18
                        {
                            updateGeneraldetails();
                            break;
                        }
					 case 'socialLinks': //18
                        {
                            updateSocialLinks();
                            break;
                        }
				   case 'emailSettings': //18
                        {
                            updatSmtpSettings();
                            break;
                        }
                    default:
                        {
                            echo "Not Exists, In Update Category!";
                        }
                }
                break;
            }
        case 'delete':
            {
                switch ($_POST['category'])
                {
                    case 'news': //1
                        {
                            deleteNews();
                            break;
                        }
					case 'partners': //1
                        {
                            deletePartners();
                            break;
                        }
                    case 'columnists': //2
                        {
                            //die()
                            deleteColumnists();
                            break;
                        }
                    case 'columnists_articles': //3
                        {
                            deleteColumnistsArticles();
                            break;
                        }
                    case 'race_courses': //4
                        {
                            deleteRaceCourses();
                            break;
                        }
                    case 'race_course_offers': //5
                        {

                            break;
                        }
                    case 'race_course_articles': //6
                        {

                            break;
                        }
                    case 'race_course_races': //7
                        {
                            deleteRaceCourseRaces();
                            break;
                        }
                    case 'race_course_track': //8
                        {
                            deleteRaceCourseTrack();
                            break;
                        }
                    case 'race_course_contact': //9
                        {
                            deleteRaceCourseContact();
                            break;
                        }
                    case 'race_course_entry': //10
                        {

                            break;
                        }
                    case 'adminusers': //16
                        {
                            deleteAdminusers();
                            break;
                        }
                    case 'publications': //16
                        {
                            deletePublications();
                            break;
                        }
                    case 'aboutus': //16
                        {
                            deleteAboutUs();
                            break;
                        }
                    case 'contactus': //16
                        {
                            deleteContactUs();
                            break;
                        }
                    case 'generaldetails': //16
                        {
                            generaldetails();
                            break;
                        }
                    default:
                        {
                            echo "Not Exists, In Delete Category!";
                        }
                }
                break;
            }
        case 'thumbnail':
            {
                switch ($_POST['category'])
                {
                    case 'columnists':
                        {
                            updateThumbnail('columnists', 'columnists_a', 'columnists_thumb_','');
                            break;
                        }
                    case 'columnists1':
                        {
                            updateThumbnail('columnists', 'columnists_a', 'columnists_thumb_','columnists');
                            break;
                        }
                    case 'race_courses':
                        {
                            updateThumbnail('race_course', 'race_course_a', 'race_courses_thumb_','');
                            break;
                        }
                    case 'race_courses1':
                        {
                            updateThumbnail('race_course', 'race_course_a', 'race_courses_thumb_','race_courses');
                            break;
                        }
                    case 'race_course_track':
                        {
                            updateThumbnail('race_course_track', 'race_course_track_a', 'race_course_track_thumb_','');
                            break;
                        }
                    case 'race_course_track1':
                        {
                            updateThumbnail('race_course_track', 'race_course_track_a', 'race_course_track_thumb_','race_course_track');
                            break;
                        }
                    case 'news':
                        {
                            updateThumbnail('general_news', 'general_news_a', 'general_news_thumb_','');
                            break;
                        }
                    case 'news1':
                        {
                            updateThumbnail('general_news', 'general_news_a', 'general_news_thumb_','news');
                            break;
                        }
                    case 'columnists_articles':
                        {
                            updateThumbnail('columnists_articles', 'columnists_articles_a', 'columnists_articles_thumb_','');
                            break;
                        }
                    case 'contactus':
                        {
                            updateThumbnail('contact_us', 'contact_us_a', 'contactus_','');
                            break;
                        }
				 case 'partner':
                        {
                            updateThumbnail('sponsors', 'sponsors', 'partner_','Partner');
                            break;
                        }
                    case 'about_us':
                    {
                        updateThumbnail('about_us', 'about_us_a', 'aboutus_','');
                    }
                    default:
                        {
                            break;
                        }
                }
                break;
            }
        case 'cover_image':
            {
                switch ($_POST['category'])
                {
                    case 'race_courses':
                        {
                            updateCover('race_course', 'race_course_a', 'columnists_cover_','');
                            break;
                        }
                    case 'race_courses1':
                        {
                            updateCover('race_course', 'race_course_a', 'columnists_cover_','race_courses');
                            break;
                        }
                    case 'publications':
                        {
                            updateCover('publications', 'publications_a', 'publications_cover_','');
                            break;
                        }
                    case 'publications1':
                        {
                            updateCover('publications', 'publications_a', 'publications_cover_','publications');
                            break;
                        }
                    default:
                        {
                            break;
                        }
                }
                break;
            }
        case 'map':
            {
                switch ($_POST['category'])
                {
                    case 'race_course_contact':
                        {
                            updateMap('race_course_contact', 'race_course_contact_a', 'race_course_contact_map_');
                            break;
                        }
                    default:
                        {
                            break;
                        }
                }
                break;
            }
        case 'edit_images':
            {
                upload_edit_image();
                break;
            }
        case 'delete_images':
            {
                delete_image();
                break;
            }
        case 'uploadnewImages':
            {
                upload_new_image();
                break;
            }
		case 'activate_race_row':
			{
				activate_row();
				break;
			}
        default:
            {
                //echo "Undefined Action!";
            }
    }
}
else
{
    die("Unexpected Error!");
}

//module 1
function insertNews()
{
    global $link;
    $title       = isset($_POST['title']) ? $_POST['title'] : "";
    $review_text = isset($_POST['review']) ? $_POST['review'] : "";
	$news_cata = isset($_POST['news_cata']) ? $_POST['news_cata'] : "";
    $news_date   = isset($_POST['date']) ? $_POST['date'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $news_data   = isset($_POST['data']) ? $_POST['data'] : "";
    $newsType = isset($_POST['newsType']) ? $_POST['newsType'] : "";
    $title       = addslashes($title);

    $status      = checkImageUploadError($_FILES['thumbnail'], 'news_');
    $images      = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        $g        = new General();
        $lan      = $_SESSION['language'];
        $sql      = "INSERT INTO " . $g->news[$lan] . " (title, review_text, thumbnail_image, news_details_description, news_date, data, news_cata) VALUES ('$title', '$review_text', '$fileName', '$description','$news_date', '$news_data', '$news_cata')";
        //$lan      = $lan == 0 ? 1 : 0;
       // $sql1     = "INSERT INTO " . $g->news[$lan] . " (title, review_text, thumbnail_image, news_details_description, news_date, data, news_cata) VALUES ('', '', '$fileName', '', '', '', '')";
        
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
            $image_error = [];
            $fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'news_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
	        $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $result  = $link->query($sql);
                $post_id = $link->insert_id;
                //$result1 = $link->query($sql1);
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_NEWS;
						$lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }

                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'news.php?type='.$newsType.'&msg=1';
                     echo $baseurl;  
                }
                else
                {
                    echo "Error: (" . $link->errno . ")" . $link->error;
                    //echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updateNews()
{
    global $link;
    $title       = isset($_POST['title']) ? $_POST['title'] : "";
    $review_text = isset($_POST['review_text']) ? $_POST['review_text'] : "";
    $news_date   = isset($_POST['news_date']) ? $_POST['news_date'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $newsType = isset($_POST['newsType']) ? $_POST['newsType'] : "";
    $news_data   = isset($_POST['data']) ? $_POST['data'] : "";
    $post_id     = $_POST['post_id'];
	$lan      = $_SESSION['language'];
     $link->query("SET NAMES utf8");
     $link->query("set characer set utf8");
	 if($lan == 0){
   $sql    = "UPDATE general_news SET title='{$title}',
									review_text='{$review_text}',
									news_date='{$news_date}',
									news_details_description='{$description}',
									data='{$news_data}'
									WHERE id={$post_id}";
	 }else{
		 $sql    = "UPDATE general_news_a SET title='{$title}',
									review_text='{$review_text}',
									news_date='{$news_date}',
									news_details_description='{$description}',
									data='{$news_data}'
									WHERE id={$post_id}";
	 }
    
	$link->query("SET NAMES utf8");
     $link->query("set characer set utf8");
	$result = $link->query($sql);


    if ($result)
    {
	 $baseurl = base_url;
     $baseurl =  $baseurl.'news.php?type='.$newsType.'&msg=2';
     echo $baseurl;  
		
    }
    else
    {
        //echo "Some problem occured, Please Try again!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function deleteNews()
{
    global $link;
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$lan      = $_SESSION['language'];
	if($lan == 0){
    $query     = "DELETE FROM general_news WHERE id={$id}";
	}else{
    $query     = "DELETE FROM general_news_a WHERE id={$id}";
	}
	 $result    = $link->query($query);
    if ($result)
    {
        echo "Record Deleted Successfully!";
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 1
//module 2
function insertColumnists()
{
    global $link;
    $name            = isset($_POST['name']) ? $_POST['name'] : "";
    $location        = isset($_POST['location']) ? $_POST['location'] : "";
    $description     = isset($_POST['description']) ? $_POST['description']: "";
    $columnists_data = isset($_POST['columnists-data']) ? $_POST['columnists-data'] : "";

    $status = checkImageUploadError($_FILES['thumbnail'], 'columnists_');
    $images = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        $g        = new General();
        $lan      = $_SESSION['language'];
        $sql      = "INSERT INTO " . $g->columnists[$lan] . " (name, location, thumbnail_image, description, data) VALUES ('$name', '$location', '$fileName', '$description', '$columnists_data')";
       // $lan      = $lan == 0 ? 1 : 0;
       // $sql1     = "INSERT INTO " . $g->columnists[$lan] . " (name, location, thumbnail_image, description, data) VALUES ('', '', '$fileName', '', '')";
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
            $image_error = [];
            $fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'columnists_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
           $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $result  = $link->query($sql);
                $post_id = $link->insert_id;
               // $result1 = $link->query($sql1);
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_COLUMNISTS;
                        $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }
 					 $baseurl = base_url;
    				 $baseurl =  $baseurl.'columnists.php?msg=1';
                     echo $baseurl;  
                }
                else
                {
                    //echo "Error: (" . $link->errno . ")". $link->error;
                    echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updateColumnists()
{
    global $link;
    $name            = isset($_POST['name']) ? $_POST['name'] : "";
    $location        = isset($_POST['location']) ? $_POST['location'] : "";
    $description     = isset($_POST['description']) ? $_POST['description'] : "";
    $columnists_data = isset($_POST['data']) ? $_POST['data'] : "";
    $post_id         = $_POST['post_id'];
    $lan             = $_SESSION['language'];
    if ($lan == 0)
    {
        $sql = "UPDATE columnists SET name='{$name}',
								  location='{$location}',
								  description='{$description}',
								  data='{$columnists_data}'
								  WHERE id={$post_id}";
    }
    else
    {
        $sql = "UPDATE columnists_a SET name='{$name}',
								  location='{$location}',
								  description='{$description}',
								  data='{$columnists_data}'
								  WHERE id={$post_id}";
    }
    $link->query("SET NAMES utf8");
     $link->query("set characer set utf8");
    $result = $link->query($sql);

    if ($result)
    {
       $baseurl = base_url;
       $baseurl =  $baseurl.'columnists.php?msg=2';
       echo $baseurl;  
    }
    else
    {
        //echo "Some problem occured, Please Try again!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function deleteColumnists()
{
    global $link;
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$lan             = $_SESSION['language'];
    
	if($lan==0){
	$query     = "DELETE FROM columnists WHERE id={$id}";
	$query1     = "DELETE FROM columnists_articles WHERE columnists_id={$id}";
	
    $result   = $link->query($query);
	$result1   = $link->query($query1);
	}else{
	$query     = "DELETE FROM columnists_a WHERE id={$id}";
	$query1     = "DELETE FROM columnists_articles_a WHERE columnists_id={$id}";
	$result    = $link->query($query);
	$result1    = $link->query($query1);
	}
    if ($result || $result1)
    {
       $baseurl = base_url;
       $baseurl =  $baseurl.'columnists.php?msg=3';
       echo $baseurl;  
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 2
//module 3
function insertColumnistsArticles()
{
    global $link;
    $columnist_id = isset($_POST['columnist_id']) ? $_POST['columnist_id'] : "";
    $title        = isset($_POST['title']) ? $_POST['title'] : "";
    $article_date = isset($_POST['article_date']) ? $_POST['article_date'] : ""; 
    $description  = isset($_POST['description']) ? $_POST['description'] : "";
    $data         = isset($_POST['data']) ? $_POST['data'] : "";
	$images = grabeImages($_FILES['app_image']);
		 $g        = new General();
        $lan      = $_SESSION['language'];
        $sql      = "INSERT INTO " . $g->column_articles[$lan] . " (columnists_id, title, thumbnail_image, article_date, description, data) VALUES ('$columnist_id', '$title', '444', '$article_date', '$description', '$data')";
       // $lan      = $lan == 0 ? 1 : 0;
       // $sql1     = "INSERT INTO " . $g->column_articles[$lan] . " (columnists_id, title, thumbnail_image, article_date, description, data) VALUES ('$columnist_id', '', '$fileName', '', '', '')";
       
				$fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'columnists_articles_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }
			
				foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
		   $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");

                $result  = $link->query($sql);
                $post_id = $link->insert_id;
               // $result1 = $link->query($sql1);
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_COLUMNISTS_ARTICLES;
						$lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
							 $link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }

                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'columnists_articles.php?msg=1';
                     echo $baseurl;  
                }
               
}


function updateColumnistsArticles()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
    $columnist_id = $_POST['columnist_id'];
    $title        = $_POST['title'];
    $article_date = $_POST['article_date'];
    $description  = $_POST['description'];
    $data         = $_POST['data'];
	$lan             = $_SESSION['language'];
if($lan ==0){
    $query     = "UPDATE columnists_articles SET title='{$title}',
											 description='{$description}',
                                             columnists_id='{$columnist_id}',
											 article_date='{$article_date}', 
											 data='{$data}' 
                                             WHERE id={$post_id}";
}else{
	$query     = "UPDATE columnists_articles_a SET title='{$title}',
											 description='{$description}',
                                             columnists_id='{$columnist_id}',
											 article_date='{$article_date}', 
											 data='{$data}' 
                                             WHERE id={$post_id}";
}
    
	
	        $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
	                                         //WHERE id={$post_id} AND columnists_id={$post_type}";
    $statement = $link->query($query);

    if ($statement)
    {
       
                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'columnists_articles.php?msg=2';
                     echo $baseurl; 
    }
    else
    {
        //echo 'There something went wrong, please try again later';
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function deleteColumnistsArticles()
{
    global $link;
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	
	$lan      = $_SESSION['language'];
	if($lan == 0){
    $query     = "DELETE FROM columnists_articles WHERE id={$id} and columnists_id={$post_type}";
	}else{
    $query     = "DELETE FROM columnists_articles_a WHERE id={$id} and columnists_id={$post_type}";
	}	
    $result    = $link->query($query);
    if ($result)
    {
       
                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'columnists_articles.php?msg=3';
                     echo $baseurl; 
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 3
//module 4
function insertRaceCourses()
{
    global $link;
    $name                = isset($_POST['name']) ? $_POST['name'] : "";
    $color               = isset($_POST['colors']) ? $_POST['colors'] : "";
    $latitude            = isset($_POST['latitude']) ? $_POST['latitude'] : "";
    $longitude           = isset($_POST['longitude']) ? $_POST['longitude'] : "";
    $city                = isset($_POST['city']) ? $_POST['city'] : "";
    $country             = isset($_POST['country']) ? $_POST['country'] : "";
    $description         = isset($_POST['description']) ? $_POST['description'] : "";
    $description         = addslashes($description);
    $date_entered_record = date("Y-m-d");

    $status = checkImageUploadError($_FILES['thumbnail'], 'race_courses_');
    $cover  = checkImageUploadError($_FILES['cover_photo'], 'race_courses_cover_');
    $images = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];

        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            die("Problem in uploding Thumbnail Image...");
        }
        else
        {
            if ($cover['status'] == 'success')
            {
                $coverPhoto = $cover['message'];

                if (!move_uploaded_file($_FILES['cover_photo']['tmp_name'], '../images/thumbnails/' . $coverPhoto))
                {
                    die("Problem in uploding Cover Photo...");
                }
            }

            $image_error = [];
            $fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'race_courses_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
                unlink('../images/' . $coverPhoto);
                echo json_encode($image_error);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
                $g   = new General();
                $lan = $_SESSION['language'];
                $sql = "INSERT INTO " . $g->race_course[$lan] . " (name, color_code, thumbnail_image, cover_image, latitude, longitude, city, country, record_date, description)
								 VALUES ('$name', '$color', '$fileName', '$coverPhoto', '$latitude', '$longitude', '$city', '$country', '$date_entered_record', '$description')";
               // $lan = $lan == 0 ? 1 : 0;

              //  $sql1    = "INSERT INTO " . $g->race_course[$lan] . " (name, color_code, thumbnail_image, cover_image, latitude, longitude, city, country, record_date, description)
				//				 VALUES ('', '', '$fileName', '$coverPhoto', '$latitude', '$longitude', '', '', '', '')";
            $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
			   
			    $result  = $link->query($sql);
                $post_id = $link->insert_id;
               // $result1 = $link->query($sql1);
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_RACE_COURSES;
                        $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }

                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_courses.php?msg=1';
                     echo $baseurl; 
                }
                else
                {
                    echo "Error: (" . $link->errno . ")" . $link->error;
                    //echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updateRaceCourses()
{
    global $link;
    $name        = $_POST['name'];
    $color_code  = $_POST['colors'];
    $latitude    = $_POST['latitude'];
    $longitude   = $_POST['longitude'];
    $city        = $_POST['city'];
    $country     = $_POST['country'];
    $description = addslashes($_POST['description']);
    $data        = $_POST['data'];
    $post_id     = $_POST['post_id'];
    $post_type   = $_POST['post_type'];
    $lan         = $_SESSION['language'];
    if ($lan == 0)
    {
        $sql = "UPDATE race_course SET name='{$name}',
    							   color_code='{$color_code}',
    							   latitude='{$latitude}',
    							   longitude='{$longitude}',
    							   city='{$city}',
    							   country='{$country}',
    							   description='{$description}',
    							   data='{$data}'
    							   where id={$post_id}";
    }
    else
    {
        $sql = "UPDATE race_course_a SET name='{$name}',
    							   color_code='{$color_code}',
    							   latitude='{$latitude}',
    							   longitude='{$longitude}',
    							   city='{$city}',
    							   country='{$country}',
    							   description='{$description}',
    							   data='{$data}'
    							   where id={$post_id}";
    }
        $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");

    $result = $link->query($sql);

    if ($result)
    {
		
        $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_courses.php?msg=2';
                     echo $baseurl; 
    }
    else
    {
        //echo "Some problem occured, Please Try again!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
	
}

function deleteRaceCourses()
{
    global $link;
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	
	$lan         = $_SESSION['language'];
    if ($lan == 0)
    {
		  $query     = "DELETE FROM race_course WHERE id={$id}";
		  $result1   = $link->query($query);
		  $query     = "DELETE FROM race WHERE race_course_id={$id}";
		  $link->query($query);
		  $query     = "DELETE FROM race_course_articles WHERE race_course_id={$id}";
		  $link->query($query);
		  $query     = "DELETE FROM race_course_contact WHERE race_course_id={$id}";
		  $link->query($query);
		  $query     = "DELETE FROM race_course_entry WHERE race_course_id={$id}";
		  $link->query($query);
		  $query     = "DELETE FROM race_course_track WHERE race_course_id={$id}";
		  $link->query($query);
		
	}else{
		 $query     = "DELETE FROM race_course_a WHERE id={$id}";
		 $result    = $link->query($query);
		 $query     = "DELETE FROM race_a WHERE race_course_id={$id}";
		 $link->query($query);
		 $query     = "DELETE FROM race_course_contact_a WHERE race_course_id={$id}";
		 $link->query($query);
		 $query     = "DELETE FROM race_course_track_a WHERE race_course_id={$id}";
		 $link->query($query);
		 $query     = "DELETE FROM race_course_entry_a WHERE race_course_id={$id}";
		 $link->query($query);
		 $query     = "DELETE FROM race_course_articles WHERE race_course_id={$id}";
		  $link->query($query);
	}
   
    if ($result || $result1)
    {
        $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_courses.php?msg=3';
                     echo $baseurl; 
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 4

function insertRaceCourseOffers()
{
    global $link;
    $race_course_id    = $_POST['race_course_id'];
    $offer_name        = $_POST['name'];
    $offer_start_date  = $_POST['offer_start_date'];
    $offer_valid_date  = $_POST['offer_valid_date'];
    $offer_description = utf8_decode($_POST['description']);

    $status = checkImageUploadError($_FILES['thumbnail'], 'race_course_offers_');
    $images = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];

        $sql = "INSERT INTO race_course_offers (race_course_id, offer_name, thumbnail_image, offer_description, post_date, valid_date) VALUES ('$race_course_id', '$offer_name', '$fileName', '$offer_description', '$offer_start_date', '$offer_valid_date')";

        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
            $image_error = [];
            $fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'race_course_offers_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $result  = $link->query($sql);
                $post_id = $link->insert_id;

                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_RACE_COURSES_OFFERS;
                        $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }

                    $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_courses_offers.php?msg=1';
                     echo $baseurl; 
                }
                else
                {
                    echo "Error: (" . $link->errno . ")" . $link->error;
                    //echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function insertRaceCourseArticles()
{
    global $link;
    $race_course_id = $_POST['race_course_id'];
    $title          = $_POST['title'];
    $article_date   = $_POST['article_date'];
    $description    = $_POST['description'];
    $data           = $_POST['data'];

    $status = checkImageUploadError($_FILES['thumbnail'], 'race_course_articles_');
    $images = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        $g        = new General();
        $lan      = $_SESSION['language'];

        $sql  = "INSERT INTO " . $g->race_course_articles[$lan] . " (race_course_id, title, thumbnail_image, article_date, description, data) VALUES ('$race_course_id', '$title', '$fileName', '$article_date', '$description', '$data')";
        //$lan  = $lan == 0 ? 1 : 0;
       // $sql1 = "INSERT INTO " . $g->race_course_articles[$lan] . " (race_course_id, title, thumbnail_image, article_date, description, data) VALUES ('$race_course_id', '', '$fileName', '', '', '')";
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
            $image_error = [];
            $fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'race_course_articles_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $result  = $link->query($sql);
                $post_id = $link->insert_id;
               // $result1 = $link->query($sql1);
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_RACE_COURSES_ARTICLES;
                        $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }

                    echo "Record inserted Successfully!";
                }
                else
                {
                    echo "Error: (" . $link->errno . ")" . $link->error;
                    //echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function checkImageUploadError($file, $fileInitials)
{
	
    $allowedExts     = array("gif", "jpeg", "jpg", "png");
    $fileTypes       = array("image/gif", "image/jpeg", "image/jpg", "image/png");
    $fileSizeAllowed = 2 * 1024 * 1024;

    if (!is_array($file))
    {
        return array('status' => 'error', 'message' => 'Please provide a File.');
    }
    if (!is_string($fileInitials))
    {
        return array('status' => 'error', 'message' => 'please provide FileInitials as a String.');
    }
    if ($file['error'] != UPLOAD_ERR_OK)
    {
        return array('status' => 'error', 'message' => 'Error Occured while uploading.');
    }

    $fileExtention     = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadingFileType = $file['type'];
    $fileSize          = $file['size'];
	

    if ($fileSize > $fileSizeAllowed)
    {
        return array('status' => 'error', 'message' => 'Maximum file size exceeded.');
    }
    if (!in_array($fileExtention, $allowedExts))
    {
        return array('status' => 'error', 'message' => 'File Type not allowed.');
    }
    if (!in_array($uploadingFileType, $fileTypes))
    {
        return array('status' => 'error', 'message' => 'File Type not allowed.');
    }

    $fileName = uniqid($fileInitials) . "." . $fileExtention;
    return array('status' => 'success', 'message' => $fileName);
}

function checkPdfUploadError($file, $fileInitials)
{
    //echo $file["name"] . " - " . pathinfo($file['name'], PATHINFO_EXTENSION) . " - "  . $fileInitials;
    // $allowedExts     = array("pdf");
    // $fileTypes       = array("application/pdf");
    // $fileSizeAllowed = 2 * 1024 * 1024;

    // if (!is_array($file))
    // {
    //     return array('status' => 'error', 'message' => 'Please provide a File.');
    // }
    // if (!is_string($fileInitials))
    // {
    //     return array('status' => 'error', 'message' => 'please provide FileInitials as a String.');
    // }
    // if ($file['error'] != UPLOAD_ERR_OK)
    // {
    //     return array('status' => 'error', 'message' => 'Error Occured while uploading.');
    // }

    // $fileExtention     = pathinfo($file['name'], PATHINFO_EXTENSION);
    // $uploadingFileType = $file['type'];
    // $fileSize          = $file['size'];

    // if ($fileSize > $fileSizeAllowed)
    // {
    //     return array('status' => 'error', 'message' => 'Maximum file size exceeded.');
    // }
    // if (!in_array($fileExtention, $allowedExts))
    // {
    //     return array('status' => 'error', 'message' => 'File Extension not allowed.');
    // }
    // if (!in_array($uploadingFileType, $fileTypes))
    // {
    //     return array('status' => 'error', 'message' => 'zzzFile Type not allowed.');
    // }

    $fileName = uniqid($fileInitials) . "." . $fileExtention;
    return array('status' => 'success', 'message' => $fileName);
}

function grabeImages($images)
{
    $files = [];

    for ($i = 0; $i < count($images['name']); $i++)
    {
        $file = [];

        $file['name']     = $images['name'][$i];
        $file['size']     = $images['size'][$i];
        $file['type']     = $images['type'][$i];
        $file['tmp_name'] = $images['tmp_name'][$i];
        $file['error']    = $images['error'][$i];

        $files[] = $file;
    }

    return $files;
}

//modeul 5
function insertRaceCourseRaces()
{
    global $link;
    $race_course_id    = isset($_POST['race_course_id']) ? $_POST['race_course_id'] : "";
    $title             = isset($_POST['title']) ? $_POST['title'] : "";
    $start_time        = isset($_POST['start_time']) ? $_POST['start_time'] : "";
    $end_time          = isset($_POST['end_time']) ? $_POST['end_time'] : "";
    $held_date         = isset($_POST['held_date']) ? $_POST['held_date'] : "";
    $weather_condition = isset($_POST['weather']) ? $_POST['weather'] : "";
    $track_condition   = isset($_POST['track_condition']) ? $_POST['track_condition'] : "";
    $safety_limit      = isset($_POST['safety_limit']) ? $_POST['safety_limit'] : "";
    $rail_position     = isset($_POST['rail_position']) ? $_POST['rail_position'] : "";
    $description       = isset($_POST['description']) ? $_POST['description'] : "";
    $data              = isset($_POST['data']) ? $_POST['data'] : "";
    $date_recorded     = date('Y-m-d');
    $g                 = new General();
    $lan               = $_SESSION['language'];

    $pdf = grabeImages($_FILES['data']);
    $pdfExt = pathinfo($_FILES["data"]["name"], PATHINFO_EXTENSION);
    
    $image_error = "";
    $fileNames   = "";
$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $response = checkPdfUploadError($image, 'publications_');
        //print_r($response);
        if ($response['status'] == 'error')
        {
            $image_error = $response['message'];
        }
        else
        {
            $fileNames = $response['message'];
        }

     if (empty($image_error))
     {
            $baseurl = base_url;
            $pdfFilePath = substr($baseurl, 0,strlen($baseurl)-6) . 'images/pdf/racecourse_races/' . $fileNames . $pdfExt;
            $saveToPath = '../images/pdf/racecourse_races/' . $fileNames . $pdfExt;
             move_uploaded_file($_FILES["data"]['tmp_name'], $saveToPath);
             
        if ($pdfExt == "") 
        {
			$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
            $sql               = "INSERT INTO " . $g->race[$lan] . " (race_course_id, race_title, race_start_time, race_end_time, race_held_date, weather, track_condition, safety_limit, rail_position, description, date_record_entered, data)
                        VALUES ('$race_course_id', '$title', '$start_time', '$end_time', '$held_date', '$weather_condition', '$track_condition', '$safety_limit', '$rail_position', '$description', '$date_recorded', '$data')";
            //$lan               = $lan == 0 ? 1 : 0;
            //$sql1              = "INSERT INTO " . $g->race[$lan] . " (race_course_id, race_title, race_start_time, race_end_time, race_held_date, weather, track_condition, safety_limit, rail_position, description, date_record_entered)
             //                   VALUES ('$race_course_id', '', '', '', '', '', '', '', '', '', '', '')";
        }
        else {
			$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
            $sql               = "INSERT INTO " . $g->race[$lan] . " (race_course_id, race_title, race_start_time, race_end_time, race_held_date, weather, track_condition, safety_limit, rail_position, description, data, date_record_entered)
                        VALUES ('$race_course_id', '$title', '$start_time', '$end_time', '$held_date', '$weather_condition', '$track_condition', '$safety_limit', '$rail_position', '$description', '$data', '$date_recorded')";
            //$lan               = $lan == 0 ? 1 : 0;
           // $sql1              = "INSERT INTO " . $g->race[$lan] . " (race_course_id, race_title, race_start_time, race_end_time, race_held_date, weather, track_condition, safety_limit, rail_position, description, data, date_record_entered)
             //                   VALUES ('$race_course_id', '', '', '', '', '', '', '', '', '', '', '')";
        }
     }


    

    $images = grabeImages($_FILES['app_image']);

    $image_error = [];
    $fileNames   = [];

    foreach ($images as $image)
    {
        $response = checkImageUploadError($image, 'race_course_races_');

        if ($response['status'] == 'error')
        {
            $image_error[] = $response['message'];
        }
        else
        {
            $fileNames[] = $response['message'];
        }
    }

    if (empty($image_error))
    {
        foreach ($images as $key => $image)
        {
            move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
        }
		$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $result  = $link->query($sql);
        $post_id = $link->insert_id;
        //$result1 = $link->query($sql1);
        if ($result)
        {
            foreach ($fileNames as $fileN)
            {
                $post_type = General::POST_TYPE_RACE_COURSES_RACE;
				$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
            }
                    $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_races.php?msg=1';
                     echo $baseurl; 
        }
        else
        {
            //echo "Error: (" . $link->errno . ")". $link->error;
            $image_error[] = "some problem occured!";
            echo json_encode($image_error);
        }
    }
    else
    {
        echo json_encode($image_error);
    }
}

////////////////////////////////insertAdmin///////////////////////////////////////
function insertAdmin()
{
    global $link;
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $email      = isset($_POST['email']) ? $_POST['email'] : "";
    $password   = isset($_POST['password']) ? $_POST['password'] : "";
    $repassword = isset($_POST['repassword']) ? $_POST['repassword'] : "";
    $sql        = "select * from admin where email='".$email."'";
    $result     = $link->query($sql);
    if ($result->num_rows > 0)
    {
        echo "Email already exists.";
    }
    else if ($password != $repassword)
    {
        echo "Password mis-match.";
    }
    else {
        $sql = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($link->query($sql))
        {
            echo "Record inserted Successfully!";
        }
        else
        {
            echo json_encode($image_error);
        }
    }
}
////////////////////////////////updateAdmin///////////////////////////////////////
function updateAdmin()
{
    global $link;

    $post_id    = $_POST['post_id'];
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $email      = isset($_POST['email']) ? $_POST['email'] : "";
    $password   = isset($_POST['password']) ? $_POST['password'] : "";
    $repassword = isset($_POST['repassword']) ? $_POST['repassword'] : "";
    $sql        = "select * from admin where email='".$email."' and id != $post_id";
    $result     = $link->query($sql);
    if ($result->num_rows > 0)
    {
        echo "Email already exists.";
    }
    else if ($password != $repassword)
    {
        echo "Password mis-match.";
    }
    else {
        $sql = "update admin SET name = '$name', email='$email', password='$password' where id=$post_id";
        if ($link->query($sql))
        {
            echo "Record updated Successfully!";
        }
        else
        {
            echo json_encode($image_error);
        }
    }
}

///////////////////////////////////////////////insertGeneralDetails//////////////////////////////////////////////////
function insertGeneralDetails()
{
    global $link;
    $about      = isset($_POST['about']) ? $_POST['about'] : "";
    $website    = isset($_POST['website']) ? $_POST['website'] : "";
    $credits    = isset($_POST['credits']) ? $_POST['credits'] : "";
    $copyrights = isset($_POST['copyrights']) ? $_POST['copyrights'] : "";
    $languge    = isset($_POST['languge']) ? $_POST['languge'] : "0";
    $sql        = "select * from generaldetails";
    $result     = $link->query($sql);
    if ($result->num_rows > 0)
    {
        $id = 0;
        foreach ($result as $value)
        {
            $id = $value['id'];
            if ($languge == 0)
            {
				$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $sql = "UPDATE generaldetails SET e_about='$about', website='$website' , e_credits='$credits' , e_copyright= '$copyrights'
                        WHERE id=$id";
            }
            else
            {
				$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
                $sql = "UPDATE generaldetails SET a_about='$about', website='$website' , a_credits='$credits' , a_copyright= '$copyrights'
                        WHERE id=$id";
            }
            break;
        }
		$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        if ($link->query($sql))
        {
            echo "Succefully Submit Records";
        }
        else
        {
            echo "Error in Submit Records";
        }
    }
    else
    {
        if ($languge == 0)
        {
			$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
            $sql = "INSERT INTO generaldetails (e_about, website, e_credits, e_copyright) "
                    . "VALUES ('$about', '$website', '$credits', '$copyrights')";
        }
        else
        {
			$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
            $sql = "INSERT INTO generaldetails (a_about, website, a_credits, a_copyright) "
                    . "VALUES ('$about', '$website', '$credits', '$copyrights')";
        }
		$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        if ($link->query($sql))
        {
            ?>
            <script>    window.location.replace("<?php echo base_url ?>addGeneratDetails.php?error=0");</script>
            <?php
        }
        else
        {
            ?>
            <script>    window.location.replace("<?php echo base_url ?>addGeneratDetails.php?error=1");</script>
            <?php
        }
    }
}

function insertAboutUs()
{
    global $link;
    $title        = isset($_POST['title']) ? $_POST['title'] : "";
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : "";
    $fax_number   = isset($_POST['fax_number']) ? $_POST['fax_number'] : "";
    $po_box       = isset($_POST['po_box']) ? $_POST['po_box'] : "";
    $email        = isset($_POST['email']) ? $_POST['email'] : "";
    $web          = isset($_POST['web']) ? $_POST['web'] : "";
    $description  = isset($_POST['description']) ? $_POST['description'] : "";

    $g   = new General();
    $lan = $_SESSION['language'];
	$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");

    $sql         = "INSERT INTO " . $g->about_us[$lan] . " (title, phone_number, fax_number, po_box,email,web,description) "
            . "VALUES ('$title', '$phone_number', '$fax_number', '$po_box', '$email','$web','$description')";
   // $lan         = $lan == 0 ? 1 : 0;
   // $sql1        = "INSERT INTO " . $g->about_us[$lan] . " (title, phone_number, fax_number, po_box,email,web,description) "
     //       . "VALUES ('', '', '', '', '$email', '$web','')";
    $images      = grabeImages($_FILES['app_image']);
    $image_error = [];
    $fileNames   = [];
    foreach ($images as $image)
    {
        $response = checkImageUploadError($image, 'aboutus_');

        if ($response['status'] == 'error')
        {
            $image_error[] = $response['message'];
        }
        else
        {
            $fileNames[] = $response['message'];
        }
    }

    if (empty($image_error))
    {
        foreach ($images as $key => $image)
        {
            move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
        }
  		$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $result  = $link->query($sql);
        $post_id = $link->insert_id;
      //  $result1 = $link->query($sql1);

        if ($result && $result1)
        {
            foreach ($fileNames as $fileN)
            {
                $post_type = General::POST_TYPE_ABOUT_US;
                $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
            }
              $baseurl = base_url;
    				 $baseurl =  $baseurl.'?action_request=edit_records&msg=2';
                     echo $baseurl; 
    
        }
        else
        {
            echo "Some error occures";
        }
    }
}

function insertContactUs($param)
{
    global $link;
    $phone           = isset($_POST['phone']) ? $_POST['phone'] : "";
    $fax             = isset($_POST['fax']) ? $_POST['fax'] : "";
    $email           = isset($_POST['email']) ? $_POST['email'] : "";
    $address         = isset($_POST['address']) ? $_POST['address'] : "";
    $latitude        = isset($_POST['latitude']) ? $_POST['latitude'] : "";
    $longitude       = isset($_POST['longitude']) ? $_POST['longitude'] : "";
    $sender_email    = isset($_POST['sender_email']) ? $_POST['sender_email'] : "";
    $sender_password = isset($_POST['sender_password']) ? $_POST['sender_password'] : "";
    $reciver_email   = isset($_POST['reciver_email']) ? $_POST['reciver_email'] : "";
    $smtp            = isset($_POST['smtp']) ? $_POST['smtp'] : "";

    $status = checkImageUploadError($_FILES['thumbnail'], 'contactus_');

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        $g        = new General();
        $lan      = $_SESSION['language'];
$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $sql  = "INSERT INTO " . $g->contact_us[$lan] . " (phone, fax, email, address,latitude,longitude,sender_email,sender_password,reciver_email,smtp,thumbnail_image) "
                . "VALUES ('$phone', '$fax', '$email', '$address', '$latitude','$longitude','$sender_email','$sender_password','$reciver_email','$smtp','$fileName')";
       // $lan  = $lan == 0 ? 1 : 0;
       // $sql1 = "INSERT INTO " . $g->contact_us[$lan] . " (phone, fax, email, address,latitude,longitude,sender_email,sender_password,reciver_email,smtp,thumbnail_image) "
        //        . "VALUES ('$phone', '$fax', '$email', '$address', '$latitude','$longitude','$sender_email','$sender_password','$reciver_email','$smtp','$fileName')";
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
			$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
            $result  = $link->query($sql);
            $post_id = $link->insert_id;
           // $result1 = $link->query($sql1);
            if ($result || $result1)
            {
                echo "Record inserted Successfully!";
            }
            else
            {
                echo "Error: (" . $link->errno . ")" . $link->error;
                //echo "some problem occured!";
            }
        }
    }
}

function updateRaceCourseRaces()
{
    global $link;
    $race_course_id      = $_POST['race_course_id'];
    $race_title      = $_POST['title'];
    $race_start_time = $_POST['start_time'];
    $race_end_time   = $_POST['end_time'];
    $race_held_date  = $_POST['held_date'];
    $weather         = $_POST['weather'];
    $track_condition = $_POST['track_condition'];
    $safety_limit    = $_POST['safety_limit'];
    $rail_position   = $_POST['rail_position'];
    $description     = $_POST['description'];
    $data            = $_POST['data'];
    $post_id         = $_POST['post_id'];
    $post_type       = $_POST['post_type'];


    $images = grabeImages($_FILES['data']);
    $imagesExt = pathinfo($_FILES["data"]["name"], PATHINFO_EXTENSION);
    
    $image_error = "";
    $fileNames   = "";

        $response = checkPdfUploadError($image, 'racecourseraces_');
        //print_r($response);
        if ($response['status'] == 'error')
        {
            $image_error = $response['message'];
        }
        else
        {
            $fileNames = $response['message'];
        }

     if (empty($image_error))
     {
            $baseurl = base_url;
            $pdfFilePath = substr($baseurl, 0,strlen($baseurl)-6) . 'images/pdf/racecourse_races/' . $fileNames . $imagesExt;
            $saveToPath = '../images/pdf/racecourse_races/' . $fileNames . $imagesExt;
             move_uploaded_file($_FILES["data"]['tmp_name'], $saveToPath);
        $lan = $_SESSION['language']; 
        if ($imagesExt == "") 
        {
            $sql = "UPDATE publications SET name='{$name}', issue_date = '{$issue_date}' WHERE id={$post_id}";
            if ($lan == 0)
            {
                $sql = "UPDATE race SET race_course_id='{$race_course_id}', 
                                    race_title='{$race_title}', 
                                    race_start_time='{$race_start_time}', 
                                    race_end_time='{$race_end_time}', 
                                    race_held_date='{$race_held_date}',
                                    weather='{$weather}',
                                    track_condition='{$track_condition}',
                                    safety_limit='{$safety_limit}',
                                    rail_position='{$rail_position}',
                                    description='{$description}',
									data='{$data}'
                                    where id={$post_id}";
                                    //where id={$post_id} and race_course_id={$post_type}";
            }
            else
            {
                $sql = "UPDATE race_a SET race_course_id='{$race_course_id}', 
                                    race_title='{$race_title}', 
                                    race_start_time='{$race_start_time}', 
                                    race_end_time='{$race_end_time}', 
                                    race_held_date='{$race_held_date}',
                                    weather='{$weather}',
                                    track_condition='{$track_condition}',
                                    safety_limit='{$safety_limit}',
                                    rail_position='{$rail_position}',
                                    description='{$description}',
									data='{$data}'
                                    where id={$post_id}";
                                    //where id={$post_id} and race_course_id={$post_type}";
            }
        }
        else {
            $sql = "UPDATE publications SET name='{$name}', issue_date = '{$issue_date}', pdf_link = '{$pdfFilePath}' WHERE id={$post_id}";
            if ($lan == 0)
            {
                $sql = "UPDATE race SET race_course_id='{$race_course_id}', 
                                    race_title='{$race_title}', 
                                    race_start_time='{$race_start_time}', 
                                    race_end_time='{$race_end_time}', 
                                    race_held_date='{$race_held_date}',
                                    weather='{$weather}',
                                    track_condition='{$track_condition}',
                                    safety_limit='{$safety_limit}',
                                    rail_position='{$rail_position}',
                                    description='{$description}',
                                    data='{$pdfFilePath}'
                                    where id={$post_id}";
                                    //where id={$post_id} and race_course_id={$post_type}";
            }
            else
            {
                $sql = "UPDATE race_a SET race_course_id='{$race_course_id}', 
                                    race_title='{$race_title}', 
                                    race_start_time='{$race_start_time}', 
                                    race_end_time='{$race_end_time}', 
                                    race_held_date='{$race_held_date}',
                                    weather='{$weather}',
                                    track_condition='{$track_condition}',
                                    safety_limit='{$safety_limit}',
                                    rail_position='{$rail_position}',
                                    description='{$description}',
                                    data='{$pdfFilePath}'
                                    where id={$post_id}";
                                    //where id={$post_id} and race_course_id={$post_type}";
            }
        }
		 $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $result = $link->query($sql);
              $baseurl = base_url;
    		 $baseurl =  $baseurl.'race_course_races.php?msg=2';
             echo $baseurl; 
     }

    
    
    // $result = $link->query($sql);

    // if ($result)
    // {
    //     echo "Record Successfully Update";
    // }
    // else
    // {
    //     echo "some problem occured!";
    //     //echo "Error: (" . $link->errno . ")". $link->error;
    // }
}

function deleteRaceCourseRaces()
{
    global $link;
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	 $lan = $_SESSION['language'];
	
	if($lan==0){
    $query     = "DELETE FROM race WHERE id={$id} and race_course_id={$post_type}";
    $result1   = $link->query($query);
	 }else{
    $query     = "DELETE FROM race_a WHERE id={$id} and race_course_id={$post_type}";
    $result    = $link->query($query);
	 }
   
    if ($result || $result1)
    {
                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_races.php?msg=2';
                     echo $baseurl; 
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 5
//module 6
function insertPublications()
{
    global $link;
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $issue_date = isset($_POST['issue_date']) ? $_POST['issue_date'] : "";
    $pdf_link   = isset($_POST['pdf_link1']) ? $_POST['pdf_link1'] : "";
    $coverPhoto   = isset($_POST['cover_photo']) ? $_POST['cover_photo'] : "";
	
	
    $g          = new General();
    $lan        = $_SESSION['language'];

   $cover  = checkImageUploadError($_FILES['cover_photo'], 'publications_cover_');
 
 // $images = grabeImages($_FILES['pdf_link1']);
  //  $imagesExt = pathinfo($_FILES["pdf_link1"]["name"], PATHINFO_EXTENSION);

    $image_error = "";
    $fileNames   = "";

     
        //print_r($response);


        $baseurl = base_url;
     //   $pdfFilePath = substr($baseurl, 0,strlen($baseurl)-6) . 'images/pdf/publications/' . $fileNames . $imagesExt;
        //$saveToPath = '../images/pdf/publications/' . $fileNames . $imagesExt;

           
		       $coverPhoto = $cover['message'];
           
		 if (!move_uploaded_file($_FILES['cover_photo']['tmp_name'], '../images/thumbnails/' . $coverPhoto))
		 {
                    die("Problem in uploding Cover Photo...");
                }
      
              unlink('../images/' . $coverPhoto);
  

        $sql        = "INSERT INTO " . $g->publications[$lan] . " (name, issue_date, pdf_link, cover_image) VALUES ('$name', '$issue_date', '$pdf_link', '$coverPhoto')";
      //  $lan        = $lan == 0 ? 1 : 0;
      //  $sql1       = "INSERT INTO " . $g->publications[$lan] . " (name, issue_date, pdf_link, cover_image) VALUES ('', '', '$pdfFilePath', '$coverPhoto')";
           $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $result  = $link->query($sql);
        $post_id = $link->insert_id;
       // $result1 = $link->query($sql1);
                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'publications.php?msg=1';
                     echo $baseurl; 
     }


function updatePublications()
{
    global $link;
    $name       = $_POST['name'];
    $issue_date = $_POST['issue_date'];
    $pdf_link   = $_POST['pdf_link1'];
    $post_id    = $_POST['post_id'];
    $lan        = $_SESSION['language'];
    $images = grabeImages($_FILES['pdf_link1']);
    $imagesExt = pathinfo($_FILES["pdf_link1"]["name"], PATHINFO_EXTENSION);
    
    $image_error = "";
    $fileNames   = "";


 $general = new General();
        if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
        else
        {
            $language = 0;
        }
        if ($language == 1)
        {
          $sql = "UPDATE publications_a SET name='{$name}', issue_date = '{$issue_date}', pdf_link = '{$pdf_link}' WHERE id={$post_id}";
        }
        else
        {
         $sql = "UPDATE publications SET name='{$name}', issue_date = '{$issue_date}', pdf_link = '{$pdf_link}' WHERE id={$post_id}";
        }
          $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
	      $result = $link->query($sql);
          $baseurl = base_url;
    	  $baseurl =  $baseurl.'publications.php?msg=2';
                     echo $baseurl; 
     }


function updateAboutUs()
{
    global $link;
    $post_id      = $_POST['post_id'];
    $title        = $_POST['title'];
    $phone_number = $_POST['phone_number'];
    $fax_number   = $_POST['fax_number'];
    $email        = $_POST['email'];
    $web          = $_POST['web'];
    $po_box       = $_POST['po_box'];
    $description  = $_POST['description'];
    //echo $description;
    // $description  = addslashes($_POST['description']);
    $g            = new General();
    $lan          = $_SESSION['language'];
    $sql          = "UPDATE " . $g->about_us[$lan] . " SET title='{$title}',"
            . "phone_number = '{$phone_number}',"
            . "fax_number = '{$fax_number}' ,
        email='{$email}', web='{$web}',"
            . " po_box='{$po_box}', description='{$description}' WHERE id={$post_id}";
	  $link->query("SET NAMES utf8");
      $link->query("set characer set utf8");		
    $result       = $link->query($sql);

    if ($result)
    {
             $baseurl = base_url;
    				 $baseurl =  $baseurl.'about.php?action_request=edit_records&msg=2';
                     echo $baseurl; 
    }
    else
    {
        //echo "some problem occured!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function updateContactUs()
{
    global $link;
    $post_id         = $_POST['post_id'];
    $phone           = isset($_POST['phone']) ? $_POST['phone'] : "";
    $fax             = isset($_POST['fax']) ? $_POST['fax'] : "";
    $email           = isset($_POST['email']) ? $_POST['email'] : "";
    $address         = isset($_POST['address']) ? $_POST['address'] : "";
    $latitude        = isset($_POST['latitude']) ? $_POST['latitude'] : "";
    $longitude       = isset($_POST['longitude']) ? $_POST['longitude'] : "";
    $sender_email    = isset($_POST['sender_email']) ? $_POST['sender_email'] : "";
    $sender_password = isset($_POST['sender_password']) ? $_POST['sender_password'] : "";
    $reciver_email   = isset($_POST['reciver_email']) ? $_POST['reciver_email'] : "";
    $smtp            = isset($_POST['smtp']) ? $_POST['smtp'] : "";
    $g               = new General();
    $lan             = $_SESSION['language'];
    $sql             = "UPDATE " . $g->contact_us[$lan] . " SET phone='{$phone}',"
            . "fax = '{$fax}'," . "address = '{$address}', email='{$email}', smtp='{$smtp}', latitude='{$latitude}', longitude='{$longitude}'"
            . " ,sender_email= '{$sender_email}',sender_password='{$sender_password}',reciver_email='{$reciver_email}' WHERE id={$post_id}";
   $link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
    $result          = $link->query($sql);
//echo $sql;
//die();
    if ($result)
    {
                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'contact.php?action_request=edit_records&msg=2';
                     echo $baseurl; 
    }
    else
    {
        //echo "some problem occured!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function updateGeneraldetails()
{

    global $link;
    $lan        = $_SESSION['language'];
    $post_id    = $_POST['post_id'];
    $about      = $_POST['about'];
    $web        = $_POST['website'];
    $credits    = $_POST['credits'];
    $copyrights = $_POST['copyrights'];
    
    if ($lan == 0)
    {
		
        $sql = "UPDATE `generaldetails` SET `e_about`='{$about}',`website`='{$web}',`e_credits`='{$credits}',`e_copyright`='{$copyrights}' WHERE id=$post_id";
    }
    else
    {
        $sql = "UPDATE `generaldetails` SET `a_about`='{$about}',`website`='{$web}',`a_credits`='{$credits}',`a_copyright`='{$copyrights}' WHERE id=$post_id";
    }
	$link->query("SET NAMES utf8");
    $link->query("set characer set utf8");
    $result = $link->query($sql);

    if ($result)
    {
        echo "<script>window.location.replace('".$baseurl."addGeneratDetails.php?action_request=edit_records&id=".$post_id."');</script>";
        //echo "Record Successfully Update";
    }
    else
    {
        echo "some problem occured!";
        //echo "Error: (" . $link->errno . ")" . $link->error;
    }
}


function updateSocialLinks(){
	global $link;
    $post_id    = $_POST['post_id'];
    $SocialName = $_POST['SocialName'];
    $soicailUrl = $_POST['soicailUrl'];
	if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
		}else{
		 $language=0;
		}
	if( $language=0)
      $sql = "UPDATE `social_links` SET `name`='{$SocialName}',`url`='{$soicailUrl}' WHERE id='{$post_id}'";
	else
	  $sql = "UPDATE `social_links_a` SET `name`='{$SocialName}',`url`='{$soicailUrl}' WHERE id='{$post_id}'";
    $link->query("SET NAMES utf8");
    $link->query("set characer set utf8");
    $result = $link->query($sql);
	
    if ($result)
    {
	        $baseurl = base_url;
    		$baseurl =  $baseurl.'social-links.php?msg=2';
            echo $baseurl;
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
	
	
	}


function updatSmtpSettings(){
	global $link;
    $post_id    = $_POST['post_id'];
    $emmailTo = $_POST['emmailTo'];
    $emailCc = $_POST['emailCc'];
    $back_copy = $_POST['back_copy'];
	if (isset($_SESSION['language']))
        {
            $language=$_SESSION['language'];
		}else{
		 $language=0;
		}
		if($language==0){
      $sql = "UPDATE `emailsettings` SET `EmailTo`='{$emmailTo}',`EmailCC`='{$emailCc}' ,`EmailBack`='{$back_copy}' WHERE id='{$post_id}'";
		}else{
			$sql = "UPDATE `emailsettings_a` SET `EmailTo`='{$emmailTo}',`EmailCC`='{$emailCc}' ,`EmailBack`='{$back_copy}' WHERE id='{$post_id}'";
		}
    $link->query("SET NAMES utf8");
    $link->query("set characer set utf8");
    $result = $link->query($sql);
	
    if ($result)
    {
	        $baseurl = base_url;
    		$baseurl =  $baseurl.'emailsettings.php?msg=2';
            echo $baseurl;
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
	
	
	
	
	
	}



function deleteAdminusers()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $query     = "DELETE FROM admin WHERE id={$post_id}";
    $result    = $link->query($query);
    if ($result)
    {
        echo "Record Deleted Successfully!";
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}
function deletePublications()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	
	$lan = $_SESSION['language'];
	
	if($lan==0){
    $query     = "DELETE FROM publications WHERE id={$post_id}";
    $result1   = $link->query($query);
	}else{
    $query     = "DELETE FROM publications_a WHERE id={$post_id}";
    $result    = $link->query($query);
	}
    if ($result || $result1)
    {
        $sql = "DELETE FROM app_images WHERE post_id=$post_id";
        $link->query($sql);
        echo "Record Deleted Successfully!";
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

function deleteAboutUs()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	
	$lan = $_SESSION['language'];
	
	if($lan==0){
    $query     = "DELETE FROM about_us WHERE id={$post_id}";
    $result1   = $link->query($query);
	}else{
    $query     = "DELETE FROM about_us_a WHERE id={$post_id}";
    $result    = $link->query($query);
	}
    if ($result || $result1)
    {
        $sql = "DELETE FROM app_images WHERE post_type=11";
        $link->query($sql);
          $baseurl = base_url;
    				 $baseurl =  $baseurl.'about.php?action_request=edit_records&msg=3';
                     echo $baseurl; 
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

function deleteContactUs()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$lan = $_SESSION['language'];
	
	if($lan==0){
    $query     = "DELETE FROM contact_us WHERE id={$post_id}";
    $result1   = $link->query($query);
	}else{
    $query     = "DELETE FROM contact_us_a WHERE id={$post_id}";
    $result    = $link->query($query);
	}
    if ($result || $result1)
    {
        echo "Record Deleted Successfully!";
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
    }
}

function generaldetails()
{
    global $link;
    $post_id = $_POST['post_id'];

    $query  = "DELETE FROM generaldetails WHERE id={$post_id}";
    $result = $link->query($query);
    if ($result)
    {
        echo "Record Deleted Successfully!";
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
    }
}

//module 6deleteAboutUs
//module 7
function insertRaceCourseTrack()
{
    global $link;
    $race_course_id      = $_POST['race_course_id'];
    $track_title         = isset($_POST['title']) ? $_POST['title'] : "";
    $track_specification = isset($_POST['description']) ? $_POST['description'] : "";
    $data                = isset($_POST['data']) ? $_POST['data'] : "";
    $record_date         = date('Y-m-d');

    $status = checkImageUploadError($_FILES['thumbnail'], 'race_course_track_');
    $images = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        $g        = new General();
        $lan      = $_SESSION['language'];
        $sql      = "INSERT INTO " . $g->race_course_track[$lan] . " (race_course_id, track_title, thumbnail_image, track_specification, record_date, data)
							VALUES ('$race_course_id', '$track_title', '$fileName', '$track_specification', '$record_date', '$data')";

        //$lan  = $lan == 0 ? 1 : 0;
       // $sql1 = "INSERT INTO " . $g->race_course_track[$lan] . " (race_course_id, track_title, thumbnail_image, track_specification, record_date, data)
		//					VALUES ('$race_course_id', '', '$fileName', '', '', '')";


        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
            $fileNames   = [];
            $image_error = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'race_course_track_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }
				 $link->query("SET NAMES utf8");
    $link->query("set characer set utf8");

                $result  = $link->query($sql);
                $post_id = $link->insert_id;
             //   $result1 = $link->query($sql1);
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_RACE_COURSES_TRACKS;
                       $lan      = $_SESSION['language'];
						if($lan==0){
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
						}else{
						$link->query("INSERT INTO app_images_a (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
							}
                    }

                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_track.php?msg=1';
                     echo $baseurl; 
                }
                else
                {
                    echo "Error: (" . $link->errno . ")" . $link->error;
                    //echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updateRaceCourseTrack()
{
    global $link;
    $track_title         = isset($_POST['title']) ? $_POST['title'] : "";
    $track_specification = isset($_POST['description']) ? $_POST['description'] : "";
    $data                = isset($_POST['data']) ? $_POST['data'] : "";
    $post_id             = $_POST['post_id'];
    //$post_type           = $_POST['post_type'];
    $post_type           = $_POST['race_course_id'];
    $lan                 = $_SESSION['language'];
    if ($lan == 0)
    {
        $sql = "UPDATE race_course_track SET race_course_id='{$post_type}', 
                                        track_title='{$track_title}', 
										 track_specification='{$track_specification}',
										 data='{$data}'
										 WHERE id={$post_id}";
                                         //WHERE id={$post_id} and race_course_id={$post_type}";
    }
    else
    {
        $sql = "UPDATE race_course_track_a SET race_course_id='{$post_type}', 
                                         track_title='{$track_title}', 
										 track_specification='{$track_specification}',
										 data='{$data}'
										 WHERE id={$post_id}";
                                         //WHERE id={$post_id} and race_course_id={$post_type}";
    }
 $link->query("SET NAMES utf8");
    $link->query("set characer set utf8");
    $result = $link->query($sql);

    if ($result)
    {
               $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_track.php?msg=2';
                     echo $baseurl; 
    }
    else
    {
        echo "some problem occured!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

function deleteRaceCourseTrack()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
    $query     = "DELETE FROM race_course_track_a WHERE id={$post_id}";
    $result1   = $link->query($query);
    $query     = "DELETE FROM race_course_track WHERE id={$post_id}";
    $result    = $link->query($query);
    if ($result || $result1)
    {
               $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_track.php?msg=3';
                     echo $baseurl; 
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 7
//module 8
function insertRaceCourseContact()
{
    global $link;
    $race_course_id = $_POST['race_course_id'];
    $latitude          = isset($_POST['title']) ? $_POST['title'] : "";
    $longitude      = isset($_POST['sub_title']) ? $_POST['sub_title'] : "";
    $post_office    = isset($_POST['post_office']) ? $_POST['post_office'] : "";
    $phone          = isset($_POST['phone']) ? $_POST['phone'] : "";
    $fax            = isset($_POST['fax']) ? $_POST['fax'] : "";
    $email_address  = isset($_POST['email_address']) ? $_POST['email_address'] : "";
    $web_address    = isset($_POST['web_address']) ? $_POST['web_address'] : "";
    $record_date    = date('Y-m-d');

        $g        = new General();
        $lan      = $_SESSION['language'];
        $sql      = "INSERT INTO " . $g->race_course_contact[$lan] . " (race_course_id, latitude, longitude, address, phone, fax, email_address, web_address, record_date)
								VALUES ('$race_course_id', '$latitude', '$longitude', '$post_office', '$phone', '$fax', '$email_address', '', '$record_date')";
        //$lan      = $lan == 0 ? 1 : 0;
       // $sql1     = "INSERT INTO " . $g->race_course_contact[$lan] . " (race_course_id, latitude, longitude, address, phone, fax, email_address, web_address, record_date)
			//					VALUES ('$race_course_id', '$latitude', '$longitude', '$post_office', '$phone', '$fax', '$email_address', '', '$record_date')";
			$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
        $result  = $link->query($sql);
       // $result1 = $link->query($sql1);
        if ($result)
        {

                   $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_contact_us.php?msg=1';
                     echo $baseurl; 
        }
        else
        {
            echo "Error: (" . $link->errno . ")" . $link->error;
            //echo "some problem occured!";
        }
}

function updateRaceCourseContact()
{
    global $link;
    $race_course_id = $_POST['race_course_id'];
    $latitude       = isset($_POST['title']) ? $_POST['title'] : "";
    $longitude     = isset($_POST['sub_title']) ? $_POST['sub_title'] : "";
    $address   = isset($_POST['post_office']) ? $_POST['post_office'] : "";
    $phone         = isset($_POST['phone']) ? $_POST['phone'] : "";
    $fax           = isset($_POST['fax']) ? $_POST['fax'] : "";
    $email_address = isset($_POST['email_address']) ? $_POST['email_address'] : "";
    //$web_address   = isset($_POST['web_address']) ? $_POST['web_address'] : "";
    $post_id       = $_POST['post_id'];
    $post_type     = $_POST['post_type'];
    $lan           = $_SESSION['language'];
    if ($lan == 0)
    {
        $sql = "UPDATE race_course_contact SET race_course_id = '$race_course_id',
                                         latitude='{$latitude}', 
										 longitude='{$longitude}',
										 address='{$address}',
										 phone='{$phone}',
										 fax='{$fax}',
										 email_address='{$email_address}'
										 WHERE id={$post_id}";
    }
    else
    {
        $sql = "UPDATE race_course_contact_a SET  race_course_id = '$race_course_id',
                                         latitude='{$latitude}', 
										 longitude='{$longitude}',
										 address='{$address}',
										 phone='{$phone}',
										 fax='{$fax}',
										 email_address='{$email_address}'
										 WHERE id={$post_id}";
    }
	$link->query("SET NAMES utf8");
           $link->query("set characer set utf8");
    $result = $link->query($sql);

    if ($result)
    {
                 $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_contact_us.php?msg=2';
                     echo $baseurl; 
    }
    else
    {
        echo "some problem occured!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function deleteRaceCourseContact()
{
    global $link;
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$lan = $_SESSION['language'];
	
	if($lan==0){
    $query     = "DELETE FROM race_course_contact_a WHERE id={$post_id} and race_course_id={$post_type}";
    $result1   = $link->query($query);
	}else{
    $query     = "DELETE FROM race_course_contact WHERE id={$post_id} and race_course_id={$post_type}";
    $result    = $link->query($query);
	}
    if ($result || $result1)
    {
                 $baseurl = base_url;
    				 $baseurl =  $baseurl.'race_course_contact_us.php?msg=3';
                     echo $baseurl; 
    }
    else
    {
        echo "Some Problem Occurred, Please Try Again Later!";
        //echo "Error: (" . $link->errno . ")". $link->error;
    }
}

//module 8


function updateThumbnail($table_e, $table_a, $label, $redirect)
{
    global $link;

    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$CurrentUrl = $_POST['CurrentUrl'];
if (isset($_SESSION['language']))
        							{
           							$language = $_SESSION['language'];
        							}
        							else
        							{
           							 $language = 0;
        							} 
    $status = checkImageUploadError($_FILES['thumbnail'], $label);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];

        move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName);


if($table_e=='sponsors' && $table_a=='sponsors'){
	    $result1 = $link->query("UPDATE $table_e SET image='{$fileName}' WHERE id={$post_id}");
        $result2 = $link->query("UPDATE $table_a SET image='{$fileName}' WHERE id={$post_id}");
	
	}else{
		if($language==0)
        $result1 = $link->query("UPDATE $table_e SET thumbnail_image='{$fileName}' WHERE id={$post_id}");
		else
        $result2 = $link->query("UPDATE $table_a SET thumbnail_image='{$fileName}' WHERE id={$post_id}");
	}
        if ($result1 || $result2)
        {  
		header("location:$CurrentUrl");
         
        }
        else
        {
            echo "Error: (" . $link->errno . ")" . $link->error;
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updateCover($table_e, $table_a, $label, $redirect)
{
    global $link;

    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$CurrentUrl = $_POST['CurrentUrl'];
	if (isset($_SESSION['language']))
        	{
           	$language = $_SESSION['language'];
        	}
        	else
        	{
           	$language = 0;
        	} 

    $status = checkImageUploadError($_FILES['thumbnail'], $label);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];

        move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName);
		if($language == 0)
        $result1 = $link->query("UPDATE $table_e SET cover_image='{$fileName}' WHERE id={$post_id}");
		else
        $result2 = $link->query("UPDATE $table_a SET cover_image='{$fileName}' WHERE id={$post_id}");

        if ($result1 || $result2)
        {
			header("location:$CurrentUrl");
            /*if ($redirect == "race_courses") {
                $baseurl = $base_url;
                echo "<script>window.location.replace('".$baseurl."race_courses.php?action_request=edit_records&id=".$post_id."');</script>";
            }
            else if ($redirect == "publications") {
                $baseurl = $base_url;
                echo "<script>window.location.replace('".$baseurl."publications.php?action_request=edit_records&id=".$post_id."');</script>";
            }
            else {
                echo "Successfully Updated";
            }*/
        }
        else
        {
            echo "Error: (" . $link->errno . ")" . $link->error;
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updateMap($table_e, $table_a, $label)
{
    global $link;

    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];

    $status = checkImageUploadError($_FILES['thumbnail'], $label);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];

        move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName);

        $result1 = $link->query("UPDATE $table_e SET image_map='{$fileName}' WHERE id={$post_id}");
        $result2 = $link->query("UPDATE $table_a SET image_map='{$fileName}' WHERE id={$post_id}");

        if ($result1 && $result2)
        {
            echo "Successfully Updated";
        }
        else
        {
            echo "Error: (" . $link->errno . ")" . $link->error;
        }
    }
    else
    {
        echo $status['message'];
    }
}

// this function edit images
function upload_edit_image()
{
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
    $fileName  = $_POST['post_name'];
	$CurrentUrl = $_POST['CurrentUrl'];
    $status    = checkImageUploadError($_FILES['thumbnail'], $post_type . "_");
    if ($status['status'] == 'success')
    {
        unlink('../images/' . $fileName);
        $fileName = $status['message'];
        global $link;
		$lan = $_SESSION['language'];
	
		if($lan==0){
        $sql      = "UPDATE  `app_images` SET  `image` =  '{$fileName}' WHERE id=$id AND post_type=$post_type";
		}else{
			 $sql      = "UPDATE  `app_images_a` SET  `image` =  '{$fileName}' WHERE id=$id AND post_type=$post_type";
			}
        if ($link->query($sql))
        {
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/' . $fileName))
            {
               header("Location:$CurrentUrl");
            }
            else
            {
                echo "Fail to Edit Image";
            }
        }
        else
        {
            echo "never Update Table";
        }
    }
    else
    {
        echo "Error in file type";
    }
}

function delete_image()
{
    global $link;
    $id  = $_POST['id'];
	$lan = $_SESSION['language'];
	
		if($lan==0){
    $sql = "DELETE FROM `app_images` WHERE id=$id";
		}else{
			$sql = "DELETE FROM `app_images_a` WHERE id=$id";
			}
    if ($link->query($sql))
    {
        echo "Image Delete Successfully";
    }
    else
    {
        echo "Fail to Delete Image";
    }
}

function upload_new_image()
{
    $post_id   = $_POST['post_id'];
    $post_type = $_POST['post_type'];
	$CurrentUrl = $_POST['CurrentUrl'];
	

    $status    = checkImageUploadError($_FILES['thumbnail'], $post_type . "_");
    
    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        global $link;
		$lan = $_SESSION['language'];
	
		if($lan==0){
        $sql      = "INSERT INTO  `app_images` (`post_id` ,  `post_type` ,  `image` ) "
                . "VALUES ($post_id, $post_type,  '{$fileName}')";
		}else{
			 $sql      = "INSERT INTO  `app_images_a` (`post_id` ,  `post_type` ,  `image` ) "
                . "VALUES ($post_id, $post_type,  '{$fileName}')";
			}
        if ($link->query($sql))
        {
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/' . $fileName))
            {
               header("Location:$CurrentUrl");
            }
            else
            {
                echo "Fail to Edit Image";
            }
        }
        else
        {
            echo "never Update Table";
        }
    }
    else
    {
        echo "Error in file type";
    }
}


function insertPartners()
{
    global $link;
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $url = isset($_POST['url']) ? $_POST['url'] : "";


    $status      = checkImageUploadError($_FILES['thumbnail'], 'news_');
    $images      = grabeImages($_FILES['app_image']);

    if ($status['status'] == 'success')
    {
        $fileName = $status['message'];
        $g        = new General();
        $lan      = $_SESSION['language'];
        $sql      = "INSERT INTO " . $g->sponsors[$lan] . " (name, image, url) VALUES ('$name', '$fileName', '$url')";
       
        
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../images/thumbnails/' . $fileName))
        {
            echo "problem in uploding file...";
        }
        else
        {
            $image_error = [];
            $fileNames   = [];

            foreach ($images as $image)
            {
                $response = checkImageUploadError($image, 'news_');

                if ($response['status'] == 'error')
                {
                    $image_error[] = $response['message'];
                }
                else
                {
                    $fileNames[] = $response['message'];
                }
            }

            if (!empty($image_error))
            {
                unlink('../images/thumbnails/' . $fileName);
            }
            else
            {
                foreach ($images as $key => $image)
                {
                    move_uploaded_file($image['tmp_name'], '../images/' . $fileNames[$key]);
                }

                $result  = $link->query($sql);
                $post_id = $link->insert_id;
               
                if ($result)
                {
                    foreach ($fileNames as $fileN)
                    {
                        $post_type = General::POST_TYPE_NEWS;
                        $link->query("INSERT INTO app_images (post_id, post_type, image) VALUES ($post_id, $post_type, '$fileN')");
                    }

                     $baseurl = base_url;
    				 $baseurl =  $baseurl.'partners.php?msg=1';
                     echo $baseurl; 
                }
                else
                {
                    echo "Error: (" . $link->errno . ")" . $link->error;
                    //echo "some problem occured!";
                }
            }
        }
    }
    else
    {
        echo $status['message'];
    }
}

function updatePartners()
{
    global $link;
    $title       = isset($_POST['name']) ? $_POST['name'] : "";
    $review_text = isset($_POST['image']) ? $_POST['image'] : "";
    $news_date   = isset($_POST['url']) ? $_POST['url'] : "";
    $post_id     = $_POST['post_id'];
	$sql    = "UPDATE sponsors SET name='{$title}',
									image='{$review_text}',
									url='{$news_date}'
									WHERE id={$post_id}";
    $result = $link->query($sql);

    if ($result)
    {
           $baseurl = base_url;
    	   $baseurl =  $baseurl.'partners.php?msg=2';
           echo $baseurl; 
    }
    else
    {
        //echo "Some problem occured, Please Try again!";
        echo "Error: (" . $link->errno . ")" . $link->error;
    }
}

function deletePartners()
{
    global $link;
    $id        = $_POST['post_id'];
    $post_type = $_POST['post_type'];
    $query     = "DELETE FROM sponsors WHERE id={$id}";
    $result1   = $link->query($query);
    $query     = "DELETE FROM sponsors WHERE id={$id}";
    $result    = $link->query($query);
    if ($result || $result1)
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