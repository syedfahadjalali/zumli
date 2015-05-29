<?php

require_once 'general.php';

class News extends General
{

    public
            function __construct()
    {
        parent::__construct();
    }

    public function getNews($params)
    {
        if (array_key_exists('language', $params))
        {
            $table = $this->news[$params['language']];
			$lan = $params['language'];
        }
        else
        {
            $table = $this->news[self::LANG_ENGLISH];
			$lan = 0;
        }
        $page  = 0;
        $sql   = "SELECT COUNT(*) AS count FROM $table";

        $count = $this->db->execute($sql);
        
        if (array_key_exists('page', $params))
        {
            $page = $params['page'];
        }
        
        $page = ($page == 0) ? $page : $page * 20;
        
        $sql  = "SELECT id, title, review_text, concat('" . THUMBNAILS . "', thumbnail_image) as thumbnail, news_details_description, news_date, data as pdf_link, news_cata from $table where is_active=1 order by news_date desc, id asc";
        
        $news = $this->db->executeQuery($sql);

        if ($news != false)
        {
            foreach ($news as $singleNews)
            {
              $singleNews['images'] = $this->getImages($singleNews['id'], self::POST_TYPE_NEWS, $lan); //define in General class...
              $news_collection[]    = $singleNews;
            }
			
			

            return json_encode(array('flag' => 1, 'total_count' => $count['count'], 'message' => 'success', 'data' => $news_collection), JSON_HEX_QUOT | JSON_HEX_TAG);
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any news!', 'data' => array()));
        }
    }
	

    public function addRegid($params)
    {
		$regid="";
		$count="";
       
		 if (!empty($params['regid']))
        {
		$regid = $params['regid'];
		$sql   = "INSERT INTO regid (regid) VALUES ('$regid')";
		$count = $this->db->executeQuery($sql);
		}
        
        
		
        
       
    }
	
	
	
	public function deleteRegid($params)
    {
        if (array_key_exists('language', $params))
        {
            $table = $this->regid[$params['language']];
        }
        else
        {
            $table = $this->regid[self::LANG_ENGLISH];
        }
		$var = $params['regid'];
		
        $page  = 0;
        $sql   = "DELETE FROM regid WHERE regid ='$var'";
		$count = $this->db->execute($sql);
        
       
    }
	
	
	    public function getSponsors($params)
    {
        if (array_key_exists('language', $params))
        {
            $table = $this->sponsors[$params['language']];
        }
        else
        {
            $table = $this->sponsors[self::LANG_ENGLISH];
        }
        $page  = 0;
        $sql   = "SELECT COUNT(*) AS count FROM $table";

        $count = $this->db->execute($sql);
        
        if (array_key_exists('page', $params))
        {
            $page = $params['page'];
        }
        
        $page = ($page == 0) ? $page : $page * 20;
        
        $sql  = "SELECT id, name, url, concat('" . THUMBNAILS . "', image) as image from $table order by id desc LIMIT $page,20";
        
        $sponsors = $this->db->executeQuery($sql);

        if ($sponsors != false)
        {
            foreach ($sponsors as $sponsor)
            {
              $sponsor['images'] = $this->getImages($sponsor['id'], self::POST_TYPE_NEWS); //define in General class...
              $news_collection[]    = $sponsor;
            }

            return json_encode(array('flag' => 1, 'total_count' => $count['count'], 'message' => 'success', 'data' => $news_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any news!', 'data' => array()));
        }
    }
	public function getCalendar($params){
		if (array_key_exists('language', $params))
        {
            $table = $this->race[$params['language']];
			$lan = $params['language'];
        }
        else
        {
            $table = $this->race[self::LANG_ENGLISH];
			$lan = 0;
        }
		
		 $page  = 0;
        $sql   = "SELECT COUNT(*) AS count FROM $table";

        $count = $this->db->execute($sql);
        
        if (array_key_exists('page', $params))
        {
            $page = $params['page'];
        }
        
        $page = ($page == 0) ? $page : $page * 20;
		
		
		$race_id = $params['race_course_id'];
		
		$sql  = "SELECT id, race_title, race_start_time, race_end_time, race_held_date from $table WHERE race_course_id={$race_id}";
        
        $sponsors = $this->db->executeQuery($sql);
		 if ($sponsors != false)
        {
            foreach ($sponsors as $sponsor)
            {
             
              $news_collection[]    = $sponsor;
            }

            return json_encode(array('flag' => 1, 'total_count' => $count['count'], 'message' => 'success', 'data' => $news_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any Social Link!', 'data' => array()));
        }
	}
	
	public function getSocial($params)
    {
        if (array_key_exists('language', $params))
        {
            $table = $this->social_links[$params['language']];
        }
        else
        {
            $table = $this->social_links[self::LANG_ENGLISH];
        }
        $page  = 0;
        $sql   = "SELECT COUNT(*) AS count FROM $table";

        $count = $this->db->execute($sql);
        
        if (array_key_exists('page', $params))
        {
            $page = $params['page'];
        }
        
        $page = ($page == 0) ? $page : $page * 20;
        
        $sql  = "SELECT id, name, url, image from $table order by id desc LIMIT $page,20";
        
        $sponsors = $this->db->executeQuery($sql);

        if ($sponsors != false)
        {
            foreach ($sponsors as $sponsor)
            {
             
              $news_collection[]    = $sponsor;
            }

            return json_encode(array('flag' => 1, 'total_count' => $count['count'], 'message' => 'success', 'data' => $news_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any Social Link!', 'data' => array()));
        }
    }
	

    public
            function getDrawerItems($param)
    {
        $lan = 0;

        if (array_key_exists('language', $param))
        {
            $lan = $param['language'];
        }

        if ($lan == 0)
        {
            $sql     = 'select g.e_about,g.website,g.e_credits,g.e_copyright from generaldetails g';
            $news    = $this->db->execute($sql);
            $about   = $news['e_about'];
            $website = $news['website'];
            $credits = $news['e_credits'];
            $copy    = $news['e_copyright'];
        }
        if ($lan == 1)
        {
            $sql     = 'select g.a_about,g.website,g.a_credits,g.a_copyright from generaldetails g';
            $news    = $this->db->execute($sql);
            $about   = $news['a_about'];
            $website = $news['website'];
            $credits = $news['a_credits'];
            $copy    = $news['a_copyright'];
        }
        $array                 = [];
        $array['about']        = $about;
        $array['VisitWebSite'] = $website;
        $array['Credits']      = $credits;
        $array['CopyRights']   = $copy;
        echo json_encode(array('flag' => 1, 'message' => 'success', 'data' => $array));
    }
	
	public function getRound($params)
    {
      $sql  = "SELECT id, col_round, news_round, racecourse_round from round order by id";
        
        $sponsors = $this->db->executeQuery($sql);

        if ($sponsors != false)
        {
            foreach ($sponsors as $sponsor)
            {
              
              $news_collection[]    = $sponsor;
            }

            return json_encode(array('flag' => 1, 'message' => 'success', 'data' => $news_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any news!', 'data' => array()));
        }
    }
	
	
	public function getPush($params)
    {
      $sql  = "SELECT id, pushTitle, pushMsg from pushnotifications order by id desc";
        
        $sponsors = $this->db->executeQuery($sql);

        if ($sponsors != false)
        {
            foreach ($sponsors as $sponsor)
            {
              
              $news_collection[]    = $sponsor;
            }

            return json_encode(array('flag' => 1, 'message' => 'success', 'data' => $news_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any news!', 'data' => array()));
        }
    }

}



?>