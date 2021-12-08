<?php
class Client{
    protected $company_name;
    protected $business_number;
    protected $contact_first_name, $contact_last_name;
    protected $phone_number; 
    protected $cell_number;
    private $carriers;
    private $HST_Number;
    private $website;
    public $status;
    public $creation_time;

    public static $number_of_users = 0;

    function __construct($company_name, $business_number, $contact_first_name, $contact_last_name, $phone_number, $cell_number,
    $carriers, $HST_Number, $website, $status = "active")
    {
        $this->company_name = $company_name;
        $this->business_number = $business_number ;
        $this->contact_first_name = $contact_first_name;
        $this->contact_last_name = $contact_last_name;
        $this->phone_number = $phone_number;
        $this->cell_number = $cell_number;
        $this->carriers = $carriers;
        $this->HST_Number = $HST_Number;
        $this->website = $website;
        $this->status = $status;
   
        self::$number_of_users++;
        date_default_timezone_set('America/Toronto');
        $this->creation_time = date('Y-m-d H:i:s');
    }

    function __get($name){
        return $this->$name;
    }

    public function __destruct(){
       echo "<br>object of type " . __CLASS__ . " is destroyed!<br>";
    }

    function __set($name, $contact_first_name, $phone_number, $cell_number){
        switch($name){
            case "contact_first_name":
                $this->contact_first_name = $contact_first_name;
                break;
            case "phone_number":
                $this->phone_number = $phone_number;
                break;
            case "cell_number":
                $this->cell_number = $cell_number;
                break;
            default :
                echo $name . "Attribute not found or it cannot be set!";
        }
    }

    function __toString(){
        return "This is an object of type " . get_class($this). "<br>";

    }
}
