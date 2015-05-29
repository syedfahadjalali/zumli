<?php

require_once 'general.php';

class Columnist extends General
{
	public function __construct()
	{
		parent::__construct();
	}

	public function viewColumnists($params)
	{
		if(array_key_exists('language', $params))
		{
			 $table = $this->columnists[$params['language']];
			 $lan = $params['language'];
		}
		else
		{
			$table = $this->columnists[self::LANG_ENGLISH];
			$lan = 0;
		}

		$sql = "SELECT id, name, location, concat('" . THUMBNAILS . "', thumbnail_image) as thumbnail, description, data AS pdf_link FROM $table order by id desc";	
		$columnists = $this->db->executeQuery($sql);

		$writers = [];

		if( $columnists != false )
		{
			foreach ($columnists as $writer)
			{
				$writer['images'] = $this->getImages($writer['id'], self::POST_TYPE_COLUMNISTS,$lan);	//define in General class...;
				$writers[] = $writer;
			}

			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $writers ), JSON_HEX_QUOT | JSON_HEX_TAG );
		}
		else
		{
			return json_encode( array( 'flag'=>'0', 'message'=> 'There is no columnists exists yet!', 'data'=> array() ) );
		}
	}

	public function viewColumnistsArticles($params)
	{
		$this->checkParams($params);

		if(array_key_exists('language', $params))
		{
			 $table = $this->column_articles[$params['language']];
			 $lan = $params['language'];
		}
		else
		{
			$table = $this->column_articles[self::LANG_ENGLISH];
			$lan = 0;
		}
		
		$sql = "SELECT id, columnists_id, title, concat('" . THUMBNAILS . "', thumbnail_image) as thumbnail, description, article_date, data AS pdf_link FROM $table where columnists_id={$params['columnists_id']} and is_active=1 order by article_date desc, id desc";
		$columnists_articles = $this->db->executeQuery($sql);

		$articles = [];

		if( $columnists_articles != false )
		{
			foreach ($columnists_articles as $article)
			{
				unset($article['thumbnail_image']);
				unset($article['data']);

				$article['images'] = $this->getImages($article['id'], self::POST_TYPE_COLUMNISTS_ARTICLES, $lan);	//define in General class...
				$articles[] = $article;
			}
			return json_encode( array( 'flag'=>1, 'message'=> 'success', 'data'=> $articles ), JSON_HEX_QUOT | JSON_HEX_TAG );
		}
		else
		{
			return json_encode( array( 'flag'=>'0', 'message'=> 'There is no articles exists by this columnists yet!', 'data'=> array() ) );
		}
	}
}

?>