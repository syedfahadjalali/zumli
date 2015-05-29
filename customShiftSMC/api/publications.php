<?php

require_once 'general.php';

class Publications extends General
{

    public
            function __construct()
    {
        parent::__construct();
    }

    public
            function viewPublications($params)
    {
        if (@array_key_exists('language', $params))
        {
            $table = $this->publications[$params['language']];
			$lan = $params['language'];
        }
        else
        {
            $table = $this->publications[self::LANG_ENGLISH];
			$lan = 0;
        }
	$good ='thumbnails/';
        $sql     = "SELECT id, name, issue_date, pdf_link, concat('" . IMAGE . $good ."', cover_image) as cover_image from $table";
        $results = $this->db->executeQuery($sql);

        $publication_collection = [];

        if ($results != false)
        {
            foreach ($results as $result)
            {
                $result['images']         = $this->getImages($result['id'], self::POST_TYPE_PUBLICATIONS, $lan); //define in General class...
                $publication_collection[] = $result;
            }

            return json_encode(array('flag' => 1, 'message' => 'success', 'data' => $publication_collection));
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is not any publication exits yet!', 'data' => array()));
        }
    }

    public
            function about_us($params)
    {
		if(array_key_exists('language', $params))
		{
			
			 $lan = $params['language'];
		}
		else
		{
			
			$lan = 0;
		}
		
		
        $sql    = "SELECT id, title, concat('" . THUMBNAILS . "', thumbnail_image) as logo, description from " . $this->selectLanguage($params);
        $result = $this->db->execute($sql);

        if ($result != false)
        {
            $result['images'] = $this->getImages($result['id'], self::POST_TYPE_ABOUT_US, $lan); //define in General class...
            return json_encode(array('flag' => 1, 'message' => 'success', 'data' => $result), JSON_HEX_QUOT | JSON_HEX_TAG);
        }
        else
        {
            return json_encode(array('flag' => 0, 'message' => 'There is no information exists yet!', 'data' => array()));
        }
    }

    public
            function contact_us($params)
    {
        if (array_key_exists('language', $params))
        {
            $lan = $params['language'];
        }
        else
        {
            $lan = 0;
        }
        $g      = new General();
        $sql    = "SELECT `id`, `phone`, `fax`, `email`, `address`, CONCAT('".THUMBNAILS."',`thumbnail_image`) AS thumbnail_image, `latitude`, `longitude`, `sender_email`, `sender_password`, `reciver_email`, `smtp` 
        FROM ".$g->contact_us[$lan];
        $result = $this->db->execute($sql);

        if ($result != false)
        {
            $this->responseReturn(1, 'success', $result);
        }
        else
        {
            $this->responseReturn(0, 'sorry, record not found!', array());
        }
    }

}

?>