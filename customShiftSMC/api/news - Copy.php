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
        }
        else
        {
            $table = $this->news[self::LANG_ENGLISH];
        }
        $page  = 0;
        $sql   = "SELECT COUNT(*) AS count FROM $table";

        $count = $this->db->execute($sql);
        
        if (array_key_exists('page', $params))
        {
            $page = $params['page'];
        }
        
        $page = ($page == 0) ? $page : $page * 20;
        
        $sql  = "SELECT id, title, review_text, concat('" . THUMBNAILS . "', thumbnail_image) as thumbnail, news_details_description, news_date, data as pdf_link from $table order by news_date desc, id desc LIMIT $page,20";
        
        $news = $this->db->executeQuery($sql);

        if ($news != false)
        {
            foreach ($news as $singleNews)
            {
              $singleNews['images'] = $this->getImages($singleNews['id'], self::POST_TYPE_NEWS); //define in General class...
              $news_collection[]    = $singleNews;
            }

            return json_encode(array('flag' => 1, 'total_count' => $count['count'], 'message' => 'success', 'data' => $news_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any news!', 'data' => array()));
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

}

?>