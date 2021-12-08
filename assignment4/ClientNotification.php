<?php
class ClientNotification{
    protected $client_id;
    protected $notification_id;
    protected $start_time;
    protected $frequency;
    protected $status;

    public static $number_of_users = 0;

    function __construct($client_id, $notification_id, $frequency, $status  = 'active')
    {
        $this->client_id = $client_id;
        $this->notification_id = $notification_id ;
        $this->frequency = $frequency;
        $this->status = $status;
        self::$number_of_users++;
        date_default_timezone_set('America/Toronto');
        $this->start_time = date('Y-m-d H:i:s');
    }

    function __get($name){
        return $this->$name;
    }

    function __set($name, $frequency, $status){
        switch($name){
            case "frequency":
                $this->frequency = $frequency;
                break;
            case "status":
                $this->status = $status;
                break;
            default :
                echo $name . "Attribute not found or it cannot be set!";
        }
    }

    function __toString(){
        return "This is an object of type " . get_class($this). "<br>";
    }
}
