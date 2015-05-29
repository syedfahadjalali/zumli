<?php
class RestServer
{
    
    private
            $serviceClass;
    private
            $receivedData;

    public
            function __construct($serviceClass, $posted_data)
    {
        $this->serviceClass = $serviceClass;
        $this->receivedData = $posted_data;
    }

    public
            function handle()
    {
        if (array_key_exists("method", $this->receivedData))
        {
            $method = $this->receivedData["method"];

            if (method_exists($this->serviceClass, $method))
            {
                $keys   = array();
                $values = array();

                foreach ($this->receivedData as $key => $val)
                {
                    array_push($keys, $key);
                    array_push($values, urldecode($val));
                }

                $post_data = array_combine($keys, $values);

                $result = $this->serviceClass->$method($post_data);
                die($result);
            }
            else
            {
                echo json_encode(array('error' => 402, 'message' => "The method " . $method . " does not exist."));
            }
        }
        else
        {
            echo json_encode(array('error' => 404, 'message' => "The method key does not exist."));
        }
    }

}

?>