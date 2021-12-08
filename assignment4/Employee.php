<?php
class Employee{
    protected $f_name, $l_name;
    protected $email;
    protected $cell; 
    protected $position;
    private $passwd;
    public $picture;
    private $status;
    private $creation_time;
   
    public static $number_of_users = 0;

    function __construct($fn, $ln, $email,$cell,$position,$password, $picture, $status = 'active'){

        $this->f_name = $fn;
        $this->l_name = $ln;
        $this->passwd = $password;
        $this->email = $email;
        $this->cell = $cell;
        $this->position = $position;
        $this->picture = $picture;
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

   function __set($name, $value){
        switch($name){
            case "f_name":
                $this->f_name = $value;
                break;
            case "l_name":
                $this->l_name = $value;
                break;
            default :
                echo $name . "Attribute not found or it cannot be set!";
        }
    }

    function __toString(){
        return "This is an object of type " . get_class($this). "<br>";
    }
}