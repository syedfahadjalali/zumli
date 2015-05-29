<?php

require_once(dirname(__FILE__) . "/dbConfig.php");

class Db
{
	private $pdo = null;
	private $statement = null;
	private static $instance;

	private function __construct()
	{
		try
		{
			$this->pdo = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->query("SET CHARACTER SET utf8");
		     //$this->pdo->query("set characer set cp1256");
			$this->pdo->exec("SET NAMES utf8");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	

	public static function getDbInstance()
	{
		if( !isset(self::$instance) )
		{
			self::$instance = new Db();
		}
			return self::$instance;
	}

	public function disconnect()
    {
        if (is_object($this->pdo))
        {
            $this->pdo =  null;
        }
    }

	public function queryPosts($table)
	{
		$sql = "SELECT * FROM {$table}";
		
		if($this->pdo)
		{
			$this->statement = $this->pdo->query($sql);
			$result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
		}
		else
		{
			throw new Exception("Database Not Connected");
		}
	}
        
	public function getLastInsertedID()
	{
		if(isset($this->pdo))
		{
			try
			{
				return $this->pdo->lastInsertId();
			}
			catch(PDOException $e)
			{
				return $e->getMessage();	
			}
		}
	}
	
	public function getTotalCount()
	{
        if(isset($this->statement))
        {
	        return $this->statement->rowCount();
        }
	}
	
    public function insert( $table, $array )
    {
        if ( !is_string($table) )
        {
            throw new Exception("Enter The Proper name of the table");
        }
			
        if ( !is_array($array)&& count($array) < 0 )
        {
            throw new Exception("Inserted Values are not correct");
        }
			
        $sql = "INSERT INTO $table";
        $key_value = array();
        $inserted_value = array();
           
		foreach ($array as $key => $value)
        {
            if ( (!is_string($key) && !is_integer($key) ) || ( !is_string($value) && !is_integer($value) && !is_float($value) ) )
            {
                throw new Exception("Inserted values are not proper");
            }
				
            $key_value[] = $key;
                
		    if ( is_string($value) )
            {
                $value=  addslashes($value);
                $value = "'" . $value . "'";
            }
            $inserted_value[] = $value;
        }
        $sql .= " ( ".  implode(",", $key_value)." ) VALUES ( ".  implode(",", $inserted_value)." );";
        $this->statement = $this->pdo->query($sql);
            
		if ( !$this->statement )
        {
            throw new Exception("Query is not accurate");
        }
        else
        {
            return $this->statement;                   
        }
    }

    public function update($Table, $arrRecordData, $strIdField, $intItemId)
    {
        if (!is_string($Table))
        {
            throw new Exception("Update record expected table name as a string!");
        }

        if (!is_array($arrRecordData) || count($arrRecordData) < 1)
        {
            throw new Exception("Update record expected record data as an array!");
        }

        $strSql = 'UPDATE ' . $Table . ' SET ';

        $strFieldNameValuePair  = array();

        foreach ($arrRecordData as $mixFieldName => $mixFieldValue)
        {
            if (
                (!is_string($mixFieldName) && !is_integer($mixFieldName))
                ||
                (!is_string($mixFieldValue) && !is_integer($mixFieldValue) && !is_float($mixFieldValue))
            )
            {
                throw new Exception("Update record expects that both field name and value are simple values, not a complex!");
            }

            if (is_string($mixFieldValue))
            {
                $strFieldNameValuePair[] = $mixFieldName . " = '" . addslashes($mixFieldValue) . "'";
            }
            else
            {
                $strFieldNameValuePair[] = $mixFieldName . " = " . addslashes($mixFieldValue);
            }

        }

        $strSql .= implode(', ', $strFieldNameValuePair) . ' WHERE ' . $strIdField . " = '" . $intItemId . "'";
        $strSql.=" ;";
        $this->statement=$this->pdo->query($strSql);
        if (!$this->statement)
        {
            throw new Exception("Query is not accurate");
        }
        else
        {
            return true;                  
        }
    }
    
    public function executeUpdate($sql)
    {
        if( !isset( $sql ) )
        {
            throw new Exception("Please provide query");
        }
        else
        {
            $this->statement = $this->pdo->query($sql);
            return $this->getTotalCount();
        }
    }
        
    public function executeDelete($sql)
    {
        if( !isset( $sql ) )
        {
            throw new Exception("Please provide query");
        }
        else
        {
            $this->statement = $this->pdo->query($sql);
            return $this->getTotalCount();
        }
    }

    public function getSingleRecord($table, $column ,$value)
    {
        if (!is_string($table))
        {
            throw new Exception("Get record expected table name as a string!");
        }
        $sql = "
            SELECT *
            FROM {$table}
            WHERE {$column} = '{$value}'
        ";
         
        $this->statement = $this->pdo->query($sql);
        if (!$this->statement) {
            throw new Exception("No record found");
        }
        
        $result = $this->statement->fetch(PDO::FETCH_ASSOC);
        
        if( !empty($result) )
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
  
	public function getAllRecord($table, $column ,$value)
    {
        if (!is_string($table))
        {
            throw new Exception("Get record expected table name as a string!");
        }
        $sql = "
            SELECT *
            FROM {$table}
            WHERE {$column} = '{$value}'
        ";
         
        $this->statement = $this->pdo->query($sql);
        if (!$this->statement) {
            throw new Exception("No record found");
        }
        $result=  $this->statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
        
    public function getRecordsFrom($table, $getColumn)
	{
	    if (!is_string($table))
        {
            throw new Exception("Get record expected table name as a string!");
        }

        $columns = is_array($getColumn) ? implode(", ", $getColumn) : $getColumn;

        $sql = "SELECT {$columns} from {$table}";
        
        $this->statement = $this->pdo->query($sql);
	    
        if( $this->statement )
        {
		    return $this->statement->fetchAll(PDO::FETCH_ASSOC);		
        }
        else
        {
		    throw new Exception("No Record Found");
        }
	}

    public function deleteFrom($table, $column, $value)
    {
        if (!is_string($table))
        {
            throw new Exception("Get record expected table name as a string!");
        }
        
        $sql = "DELETE from {$table} where {$column} = {$value}";
        
        $this->statement = $this->pdo->query($sql);         
        
        if( $this->statement )
        {
            if( $this->getTotalCount() >= 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
        
    public function executeQuery($sql)
    {
        if( !isset( $sql ) )
        {
            throw new Exception("Please provide query");
        }
        else
        {
            $this->statement  = $this->pdo->query($sql);
            $result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            
            if( !empty($result) )
            {
                return $result;		
            }
            else
            {               
                return false;
            }
        }
    }

    public function execute($sql)
    {
        if( !isset( $sql ) )
        {
            throw new Exception("Please provide query");
        }
        else
        {
            $this->statement  = $this->pdo->query($sql);
            $result = $this->statement->fetch(PDO::FETCH_ASSOC);
            
            if( !empty($result) )
            {
                return $result;		
            }
            else
            {               
                return false;
            }
        }
    }
}
?>