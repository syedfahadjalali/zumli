<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

ini_set('display_errors', 1);

require_once 'general.php';
require_once 'news.php';
require_once 'columnist.php';
require_once 'racecourse.php';
require_once 'publications.php';
require_once 'RestServer.php';

class Page
{

//1
    public
            function getNews($params)    //1
    {
        $news = new News();
        return $news->getNews($params);
    }
	 public
            function getPush($params)    //1
    {
        $news = new News();
        return $news->getPush($params);
    }
	
	public
            function getSponsors($params)    //1
    {
        $news = new News();
        return $news->getSponsors($params);
    }
	public
            function getRound($params)    //1
    {
        $news = new News();
        return $news->getRound($params);
    }
	public
            function getCalendar($params)    //1
    {
        $news = new News();
        return $news->getCalendar($params);
    }
	
	public
            function getSocial($params)    //1
    {
        $news = new News();
        return $news->getSocial($params);
    }
	
	public
            function addRegid($params)    //1
    {
        $news = new News();
        return $news->addRegid($params);
    }
	public
            function deleteRegid($params)    //1
    {
        $news = new News();
        return $news->deleteRegid($params);
    }

//1
    public
            function viewColumnists($params) //2
    {
        $writer = new Columnist();
        return $writer->viewColumnists($params);
    }

//2
    public
            function viewColumnistsArticles($params) //3
    {
        $article = new Columnist();
        return $article->viewColumnistsArticles($params);
    }

//1
    public
            function viewRaceCourses($params)    //4
    {
        $raceCourse = new Racecourse();
        return $raceCourse->viewRaceCourses($params);
    }

    public
            function viewRaceCourseDetails($params)
    {
        $raceCourse = new Racecourse();
        return $raceCourse->viewRaceCourseDetails($params);
    }

//2
    public
            function viewRaceCourseOffers($params)   //5
    {
        $raceOffers = new Racecourse();
        return $raceOffers->viewRaceCourseOffers($params);
    }

//3
    public
            function viewRaceCourseArticles($params) //6
    {
        $raceArticle = new Racecourse();
        return $raceArticle->viewRaceCourseArticles($params);
    }

//4
    public
            function viewRaceCoursePlayers($params)  //7
    {
        $racePlayers = new Racecourse();
        return $racePlayers->viewRaceCoursePlayers();
    }

//5
    public
            function viewRaceCourseRaces($params)    //8
    {
        $raceRaces = new Racecourse();
        return $raceRaces->viewRaceCourseRaces($params);
    }

//6
    public
            function viewAllRaceResult($params)  //9
    {
        $raceResult = new Racecourse();
        return $raceResult->viewAllRaceResult($params);
    }

//7
    public
            function viewSinglePlayerAllRacesPlayed($params)
    {
        $playerRaces = new Racecourse();
        return $playerRaces->viewSinglePlayerAllRacesPlayed($params);
    }

    public
            function viewPublications($params)
    {
        $publications = new Publications();
        return $publications->viewPublications($params);
    }

    public
            function about_us($params)
    {
        $publications = new Publications();
        return $publications->about_us($params);
    }

    public
            function RaceCourseCalender($params)
    {
        $raceCourse = new Racecourse();
        return $raceCourse->race_course_calender($params);
    }

    public
            function contact_us($params)
    {
        $publications = new Publications();
        return $publications->contact_us($params);
    }

    public
            function drawer($params)
    {
        $news = new News();
        return $news->getDrawerItems($params);
    }

}

$rArray = array_change_key_case($_POST, CASE_LOWER);
$page   = new Page();
$rest   = new RestServer($page, $rArray);
$rest->handle();
?>