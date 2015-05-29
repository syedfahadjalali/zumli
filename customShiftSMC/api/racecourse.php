<?php

require_once 'general.php';

class Racecourse extends General
{
	public function __construct()
	{
		parent::__construct();
	}

	public function viewRaceCourses($params)
	{
		if(@array_key_exists('language', $params))
		{
			 $race_course = $this->race_course[$params['language']];
			 $race_course_track = $this->race_course_track[$params['language']];
			 $lan = $params['language'];
		}
		else
		{
			 $race_course = $this->race_course[self::LANG_ENGLISH];
			 $race_course_track = $this->race_course_track[self::LANG_ENGLISH];
		}
		$sql = "SELECT rc.id, rc.name, concat('" . THUMBNAILS . "', rc.thumbnail_image) as thumbnail, concat('". THUMBNAILS . "', ti.thumbnail_image) as track_image FROM $race_course AS rc LEFT OUTER JOIN $race_course_track AS ti ON rc.id=ti.race_course_id";
		$race_courses = $this->db->executeQuery($sql);
		$courses = [];

		if( $race_courses != false )
		{
			foreach ($race_courses as $course) 
			{
				$course['race_count'] = $this->getRaceCount( $course['id'],$lan );
				$course['images'] = $this->getImages($course['id'], self::POST_TYPE_RACE_COURSES, $lan);	//define in General class...;
				$courses[] = $course;				
			}

			$this->responseReturn(1, 'success', $courses);	//define in general classs...
		}
		else
		{
			$this->responseReturn(0, 'Not found any Racecourse!', array() );
		}
	}

	public function viewRaceCourseDetails($params)
	{
		$this->checkParams($params);

		if(@array_key_exists('language', $params))
		{
			 $race_course = $this->race_course[$params['language']];
			 $race_course_track = $this->race_course_track[$params['language']];
			 $race_course_contact = $this->race_course_contact[$params['language']];
			 $race_course_entry =  $this->race_course_entry[$params['language']];
			 $race = $this->race[$params['language']];
			 $lan = $params['language'];

		}
		else
		{
			 $race_course = $this->race_course[self::LANG_ENGLISH];
			 $race_course_track = $this->race_course_track[self::LANG_ENGLISH];
			  $race_course_contact = $this->race_course_contact[self::LANG_ENGLISH];
			 $race_course_entry =  $this->race_course_entry[self::LANG_ENGLISH];
			 $race =  $this->race[self::LANG_ENGLISH];
			 $lan = 0;
		}

		$race_course_id = $params['race_course_id'];
		$year = $params['year'];
		$sql = "SELECT name, color_code, latitude, longitude, concat('" . THUMBNAILS . "', cover_image) AS cover_image, description, data AS pdf_link FROM $race_course where id='{$race_course_id}'";
		$race_course_details = $this->db->execute($sql);
		
		if( $race_course_details != false )
		{
			$race_course_details['images'] = $this->getImages($race_course_id, self::POST_TYPE_RACE_COURSES, $lan);	//define in General class...;
			$race_course_details['track'] = $this->raceCourseTrack($race_course_id, $race_course_track,$lan);
			$race_course_details['calender'] = $this->raceCourseCalender($race_course_id, $race, $year);
			$race_course_details['contact_us'] = $this->raceCourseContactUs($race_course_id, $race_course_contact);
			$race_course_details['entry_details'] = $this->raceCourseEntry($race_course_id, $race_course_entry);
		
			$this->responseReturn(1, 'success', $race_course_details);	//define in general classs...
		}
		else
		{
			$this->responseReturn(1, 'Not found any details with given id!', array());	//define in general classs...
		}
	}
	
	public function raceCourseTrack($race_course_id, $table,$lan=0)
	{
		$sql = "SELECT id, track_title, concat('" . THUMBNAILS . "', thumbnail_image) AS track_image, track_specification, data AS pdf_link FROM $table where race_course_id='{$race_course_id}'";
		$track = $this->db->execute($sql);
		
		if( $track != false )
		{
			$track['images'] = $this->getImages($track['id'], self::POST_TYPE_RACE_COURSES_TRACKS,$lan);	//define in General class...;
			return $track;
		}
		else
		{
			return array();
		}
	}
	
	public function raceCourseContactUs($race_course_id, $table)
	{	
		$sql = "SELECT id FROM $table where race_course_id='{$race_course_id}'";
		//echo $sql;
		$contact_us = $this->db->executeQuery($sql);
		
		$contacts = [];

		if( $contact_us != false )
		{
			foreach ($contact_us as $contact) 
			{
				$contacts[] = $this->raceCourseContacts($contact['id'], $table);
			}
		}
		return $contacts;
		//return $contact_us != false ? $contact_us : array();
	}

	public function raceCourseContacts($contact_id, $table)
	{	
		$sql = "SELECT id, latitude, longitude, address, phone, fax, email_address, web_address FROM $table where id='{$contact_id}'";
		//echo $sql;
		$contact_us = $this->db->execute($sql);
		
		return $contact_us != false ? $contact_us : array();
	}
	
	public function raceCourseEntry($race_course_id, $table)
	{
		$sql = "SELECT entry_title, admission, dress_code, program_of_events, competitions, food_beverages, contact_details, data AS pdf_link FROM $table where race_course_id='{$race_course_id}'";
		$entry_details = $this->db->execute($sql);
		return $entry_details != false ? $entry_details : array();
	}
	
	public function raceCourseCalender($race_course_id, $table, $year)
	{
		$sql = "SELECT race_title, race_start_time, race_end_time, race_held_date, data as pdfl_link from $table where race_course_id='{$race_course_id}' and YEAR(race_held_date)= '{$year}' order by race_held_date desc";
		$race_details = $this->db->executeQuery($sql);
		
		if( $race_details != false )
		{	
			$months = [];
			foreach( $race_details as $r_d )
			{	
				$year; $month; $day;
				$month_records = [];
				list($year, $month, $day) = explode('-', $r_d['race_held_date']);

				foreach( $race_details as $details )
				{
					if( $month == date('n', strtotime($details['race_held_date'])) )
					{
						$month_records[$details['race_held_date']][] = $details;
					}
				}
				$months[$month] = $month_records;
			}
			
			return $months;
		}
		else
		{
			return array();
		}
	}
	
	public function viewRaceCourseOffers($params)
	{
		$this->checkParams($params);

		$sql = "SELECT o.*, concat('" . THUMBNAILS . "', o.thumbnail_image) as thumbnail  FROM `race_course_offers`  AS o where race_course_id={$params['race_course_id']}";
		$race_offers = $this->db->executeQuery($sql);

		$offers = [];

		if( $race_offers != false )
		{
			foreach ($race_offers as $offer) 
			{
				unset($offer['thumbnail_image']);

				$offer['images'] = $this->getImages($offer['id'], self::POST_TYPE_RACE_COURSES_OFFERS);	//define in General class...;
				$offers[] = $offer;				
			}

			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $offers ), JSON_HEX_QUOT | JSON_HEX_TAG );
		}
		else
		{
			return json_encode( array( 'flag'=>'0', 'message'=> 'Not found any Racecourse!', 'data'=> array() ) );
		}
	}

	public function viewRaceCourseArticles($params)
	{
		$this->checkParams($params);

		$sql = "SELECT a.*, concat('" . THUMBNAILS . "', a.thumbnail_image) as thumbnail FROM `race_course_articles` AS a where race_course_id={$params['race_course_id']}";
		$race_articles = $this->db->executeQuery($sql);

		$articles = [];

		if( $race_articles != false )
		{
			foreach ($race_articles as $article) 
			{
				unset($article['thumbnail_image']);

				$article['images'] = $this->getImages($article['id'], self::POST_TYPE_RACE_COURSES_ARTICLES);	//define in General class...;
				$articles[] = $article;				
			}

			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $articles ), JSON_HEX_QUOT | JSON_HEX_TAG );
		}
		else
		{
			return json_encode( array( 'flag'=>'0', 'message'=> 'Not found any Racecourse Articles!', 'data'=> array() ) );
		}
	}

	public function viewRaceCoursePlayers()
	{
		$sql = "SELECT p.*, concat('" . THUMBNAILS . "', p.thumbnail_image) as thumbnail FROM player AS p";
		$players = $this->db->executeQuery($sql);

		if( $players != false )
		{
			$players_collection = [];

			foreach ($players as $player) 
			{
				unset($player['thumbnail_image']);
				unset($player['data']);
				
				$player['images'] = $this->getImages($player['id'], self::POST_TYPE_RACE_COURSES_PLAYERS);	//define in General class...;
				$players_collection[] = $player;				
			}

			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $players_collection ), JSON_HEX_QUOT | JSON_HEX_TAG );
		}
		else
		{
			return json_encode( array( 'flag'=>'0', 'message'=> 'Not found any Player!', 'data'=> array() ) );
		}
	}

    public function viewRaceCourseRaces($params)
    {
    	$this->checkParams($params);
    	
    	if(array_key_exists('language', $params))
		{
			 $table = $this->race[$params['language']];
		}
		else
		{
			$table = $this->race[self::LANG_ENGLISH];
		}

		$sql = "SELECT id as race_id, race_title, race_start_time, race_end_time, race_held_date, race_status, description, data as pdf_link, is_active from $table where race_course_id={$params['race_course_id']} order by id desc";
    	$races = $this->db->executeQuery($sql);

    	if( $races != false )
    	{
    		$race_collection = [];

    		foreach ( $races as $race )
    		{
				if($race['is_active']!="0"){
				$lan = $params['language'];
				$race['images'] = $this->getImages($race['race_id'], self::POST_TYPE_RACE_COURSES_RACE, $lan);	//define in General class...;
				$race_collection[] = $race;
				}
				
			}

			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $race_collection ), JSON_HEX_QUOT | JSON_HEX_TAG );
    	}
    	else
    	{
    		return json_encode( array( 'flag'=>'0', 'message'=> 'Not found any Race!', 'data'=> array() ) );
    	}
    }

    //results from a particular race course, required 1 race course id as a parameter...
    public function viewAllRaceResult($params)
    {
    	$this->checkParams($params);
		$sql = "SELECT r.id as race_id, rc.name AS race_course_name, r.race_title, r.race_start_time, r.race_end_time, r.race_held_date, r.race_status, r.track_condition, r.weather, r.safety_limit, r.rail_position, r.description, concat('" . THUMBNAILS . "', tr.thumbnail_image) as track_image FROM `race` AS r INNER JOIN race_course AS rc ON r.race_course_id=rc.id INNER JOIN race_course_track AS tr ON tr.race_course_id=rc.id where r.race_course_id={$params['race_course_id']}";
    	$races = $this->db->executeQuery($sql);		
		
    	$race_collection = [];

    	if( $races != false )
    	{
    		foreach ($races as $race)
    		{
	    		$sql = "SELECT r.position AS finish_position, r.distance_covered, r.time_to_cover_distance, r.data AS pdf_link, p.id AS jockey_id, p.player_name AS jockey_name, h.id AS horse_id, h.name AS horse_name, ht.id AS trainer_id, ht.name AS trainer_name, ho.id AS horse_owner_id, ho.name AS horse_owner_name
						FROM result AS r
						INNER JOIN player AS p ON r.player_id = p.id
						INNER JOIN horse AS h ON r.horse_id = h.id
						INNER JOIN horse_trainer AS ht ON r.trainer_id = ht.id
						INNER JOIN horse_owner AS ho ON r.owner_id = ho.id
						WHERE r.race_id ={$race['race_id']}";
						
				$raceResult = $this->db->executeQuery($sql);
				$race['result'] = $raceResult != false ? $raceResult : "result not available!";
				$race_collection[] = $race;
			}
			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $race_collection ), JSON_HEX_QUOT | JSON_HEX_TAG );
    	}
    	else
    	{
    		return json_encode( array( 'flag'=>'0', 'message'=> 'Not yet Played any Race in this Racecourse!', 'data'=> array() ) );
    	}
    }

    //require race course id for races from particular race Course (optional), player id to get all the races for single user... 
    public function viewSinglePlayerAllRacesPlayed($params)
    {
    	$this->checkParams($params);
    	$sql = "SELECT player_name, age, city, country, concat('" . THUMBNAILS . "', thumbnail_image) as player_image, description, data as pdf_link from player where id={$params['player_id']}";
    	$player = $this->db->execute($sql);

    	if( $player != false )
    	{
	    	$sql = "SELECT rs.`date` as result_date, rs.`distance_covered`, rs.`time_to_cover_distance`, rs.`position`, r.`id` as race_id, r.`race_title`, r.`race_start_time`, r.`race_end_time`, r.`race_held_date`, concat('" . THUMBNAILS . "', r.`track_image`) as 'race_track_image' from `result` AS rs inner join `player` AS p ON p.`id`=rs.`player_id` inner join `race` AS r ON r.`id`=rs.`race_id` where rs.player_id={$params['player_id']}";

	    	if( array_key_exists('race_course_id', $params) )
	    	{
				$sql .= " and r.race_course_id={$params['race_course_id']}";
	    	}

	    	$player['races'] = $this->db->executeQuery($sql);

    		return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $player ), JSON_HEX_QUOT | JSON_HEX_TAG );
    	}
    	else
    	{
    		return json_encode( array( 'flag'=>'0', 'message'=> 'No player exist with given id!', 'data'=> array() ) );
    	}
    }

	public function race_course_calender($params)
    {
    	if(@array_key_exists('language', $params))
		{
			 $race_course = $this->race_course[$params['language']];
			 $race = $this->race[$params['language']];
		}
		else
		{
			 $race_course = $this->race_course[self::LANG_ENGLISH];
			 $race = $this->race[self::LANG_ENGLISH];
		}

        $year       = $params['year'];
        $sql        = "SELECT id, name, color_code,  latitude, longitude, concat('" . THUMBNAILS . "', thumbnail_image) as thumbnail_image FROM $race_course";
        $race_corse = $this->db->executeQuery($sql);
        $main_array = [];
        if ($race_corse != false)
        {
            foreach ($race_corse as $value)
            {
                $race_course_id = $value['id'];
                $sql            = "SELECT id as race_id, race_title, race_start_time, race_end_time, race_held_date,"
                        . " data as pdfl_link from $race where race_course_id='{$race_course_id}' and YEAR(race_held_date)= '{$year}'";
                $race_details   = $this->db->executeQuery($sql);
				
				

                if ($race_details != false)
                {
                    $months = [];
                    foreach ($race_details as $r_d)
                    {
                        $year;
                        $month;
                        $day;
                        $month_records = [];
                        $date          = [];
                        list($year, $month, $day) = explode('-', $r_d['race_held_date']);

                        foreach ($race_details as $details)
                        {
                            if ($month == date('n', strtotime($details['race_held_date'])))
                            {
								
										$details['images'] = $this->getImages($details['race_id'], self::POST_TYPE_RACE_COURSES_RACE);
										
			
			
                                $month_records[$details['race_held_date']][] = $details;
                            }
                        }
                        $months[$month] = $month_records;

                        $value['calender'] = $months;
                    }
                    $main_array[] = $value;
                }
                else
                {
                    $value['calender'] = array();
                }
            }
            $this->responseReturn(1, 'success', $main_array);
        }
        else
        {
            $this->responseReturn(0, 'Ops, No Record found!', array());
        }
    }
}

?>