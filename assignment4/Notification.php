 <!-- class Notification{
    protected $name;
    protected $type;
    protected $status;
    protected $creation_time;

    public static $number_of_users = 0;

    function __construct($name, $type, $status= 'disabled')
    {
        $this->name = $name;
        $this->type = $type ;
        $this->status = $status;

        self::$number_of_users++;
        date_default_timezone_set('America/Toronto');
        $this->creation_time = date('Y-m-d H:i:s');
    }

    function __get($name){
        return $this->$name;
    }

    function __set($name, $type, $status){
        switch($name){
            case "name":
                $this->name = $name;
                break;
            case "type":
                $this->type = $type;
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
-->
<?php 

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $sentMessage = false;
    //submit the form and send email
    if(isset($_POST["userEmail"]) && ($_POST["userEmail" != ""])){
        if(filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)){
            // set the first name, last name, email address, subject of the email, and the message 
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $userEmail = $_POST["userEmail"];
            $subjectMessage = $_POST["subjectMessage"];
            $message = $_POST["message"];

            //set the address of the recipient and the email body
            $emailTo = "100000000@georgebrown.ca";
            $emailBody = "";

            $emailBody .= "From: " . $firstName . $lastName . "\r\n";
            $emailBody .= "Email: " . $userEmail . "\r\n";
            $emailBody .= "Message: " . $message . "\r\n";
            
            //mail($emailTo, $subjectMessage, $emailBody);

            $sentMessage = true;
    
        }
    }
    
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
</head>

<body>

    <?php 
    if($sentMessage):
    ?>

        <h3>We will send you the notification.</h3>

    <?php
    else:
    ?>

    <div class="container">
        <form action="Notification.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Jane Doe" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Jane Doe" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="jane@doe.com" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Subject: </label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Hello There!" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message: </label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
            </div>
            <div>
                <!-- Add alert button here from bootsrap https://getbootstrap.com/docs/5.1/components/alerts/ -->
            <!-- <div id="liveAlertPlaceholder"></div>
<button type="submit" class="btn btn-primary" id="liveAlertBtn">Submit</button>
                <button type="submit" class="btn">Submit</button> -->
            </div>
        </form>
    </div>
</body>
<?php
    endif;
    ?>
</html>