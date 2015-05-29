<?php

require_once(dirname(dirname(__FILE__)) . "/includes/db.php");
class General
{

    protected
            $db;

    const
            POST_TYPE_NEWS                  = 1;
    const
            POST_TYPE_COLUMNISTS            = 2;
    const
            POST_TYPE_COLUMNISTS_ARTICLES   = 3;
    const
            POST_TYPE_RACE_COURSES          = 4;
    const
            POST_TYPE_RACE_COURSES_OFFERS   = 5;
    const
            POST_TYPE_RACE_COURSES_ARTICLES = 6;
    const
            POST_TYPE_RACE_COURSES_PLAYERS  = 7;
    const
            POST_TYPE_RACE_COURSES_RACE     = 8;
    const
            POST_TYPE_RACE_COURSES_RESULT   = 9;
    const
            POST_TYPE_PUBLICATIONS          = 10;
    const
            POST_TYPE_ABOUT_US              = 11;
    const
            POST_TYPE_RACE_COURSES_TRACKS   = 12;
    const
            LANG_ENGLISH                    = 0;
    const
            LANG_ARABIC                     = 1;

    public
            $news                 = [self::LANG_ENGLISH => 'general_news', self::LANG_ARABIC => 'general_news_a']; //1
    public
            $columnists           = [self::LANG_ENGLISH => 'columnists', self::LANG_ARABIC => 'columnists_a']; //2
    public
            $column_articles      = [self::LANG_ENGLISH => 'columnists_articles', self::LANG_ARABIC => 'columnists_articles_a']; //3
    public
            $race_course          = [self::LANG_ENGLISH => 'race_course', self::LANG_ARABIC => 'race_course_a']; //4
    public
            $race                 = [self::LANG_ENGLISH => 'race', self::LANG_ARABIC => 'race_a']; //5
    public
            $publications         = [self::LANG_ENGLISH => 'publications', self::LANG_ARABIC => 'publications_a']; //6
    public
            $race_course_offers   = [self::LANG_ENGLISH => 'race_course_offers', self::LANG_ARABIC => 'race_course_offers_a']; //7
    public
            $race_course_contact  = [self::LANG_ENGLISH => 'race_course_contact', self::LANG_ARABIC => 'race_course_contact_a']; //8
    public
            $race_course_entry    = [self::LANG_ENGLISH => 'race_course_entry', self::LANG_ARABIC => 'race_course_entry_a']; //9
    public
            $race_course_track    = [self::LANG_ENGLISH => 'race_course_track', self::LANG_ARABIC => 'race_course_track_a']; //10
    public
            $race_course_articles = [self::LANG_ENGLISH => 'race_course_articles', self::LANG_ARABIC => 'race_course_articles_a']; //11
    public
            $result               = [self::LANG_ENGLISH => 'result', self::LANG_ARABIC => 'result_a']; //12
    public
            $player               = [self::LANG_ENGLISH => 'player', self::LANG_ARABIC => 'player_a']; //13
    public
            $horse                = [self::LANG_ENGLISH => 'horse', self::LANG_ARABIC => 'horse_a']; //14
    public
            $horse_owner          = [self::LANG_ENGLISH => 'horse_owner', self::LANG_ARABIC => 'horse_owner_a']; //15
    public
            $horse_trainer        = [self::LANG_ENGLISH => 'horse_trainer', self::LANG_ARABIC => 'horse_trainer_a']; //16
    public
            $about_us             = [self::LANG_ENGLISH => 'about_us', self::LANG_ARABIC => 'about_us_a']; //16
    public
            $contact_us           = [self::LANG_ENGLISH => 'contact_us', self::LANG_ARABIC => 'contact_us_a']; //16

    public
            function __construct()
    {
        $this->db = Db::getDbInstance();
    }

    public
            function checkParams($params)
    {
        foreach ($params as $key => $value)
        {
            if (!isset($value) || trim($value) == "")
            {
                echo json_encode(array('flag' => 0, 'message' => "Please provide {$key}!"));
                die();
            }
        }
    }

    public
            function getImages($post_id, $post_type)
    {
        $sql         = "SELECT concat('" . IMAGE . "', image) as image FROM app_images where post_id={$post_id} and post_type={$post_type}";
        $post_images = $this->db->executeQuery($sql);

        $images = [];

        if ($post_images != false)
        {
            foreach ($post_images as $image)
            {
                $images[] = $image['image'];
            }
        }

        return $images;
    }

    public
            function getRaceCount($race_course_id)
    {
        $sql        = "SELECT COUNT(id) as race_count from race where race_course_id={$race_course_id}";
        $race_count = $this->db->execute($sql);
        return $race_count['race_count'];
    }

    public
            function responseReturn($code, $message, $data)
    {
        echo json_encode(array('flag' => $code, 'message' => $message, 'data' => $data));
    }

    public
            function selectLanguage($params)
    {
        if (array_key_exists('language', $params))
        {
            return $this->about_us[$params['language']];
        }
        else
        {
            return $this->about_us[self::LANG_ENGLISH];
        }
    }

}

?>