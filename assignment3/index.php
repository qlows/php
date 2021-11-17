<?php
require "functions.inc.php";
$users = get_data();

/* echo "<pre>";
print_r($users);
echo "</pre>";
exit; */
$id = "";
$f_name = "";
$l_name = "";
$age = "";
$page = "";
if(isset($_GET["page"]) && !empty($_GET["page"])){
   $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRING);
    // $page = $_GET["page"];
    if($page === "update" && isset($_GET["id"]) && $_GET["id"]){
        $record = get_record($users, $_GET["id"]);
        if(!$record){
            header("Location:?users");
        }
        else{
            $id = $record[0];
            $f_name = $record[1];
            $l_name = $record[2];
            $age = $record[3];
        }
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "create":
                $f_name = $_POST["fName"];
                $l_name = $_POST["lName"];
                $age = $_POST["age"];
                create_record([$f_name, $l_name, $age]);
                break;

            case "update":
                    $f_name = $_POST["fName"];
                    $l_name = $_POST["lName"];
                    $age = $_POST["age"];
                    if(update_record($users, [$id, $f_name, $l_name, $age])){
                        echo "Record updated successfully";
                    }
                    break;

            case "delete":
                $id = $_POST["id"];
               if(delete_record($users, $id)){
                   echo "Record deleted successfully";
               }
               break;
        }
        header("Location:?users");
    }
}

if($page){
    switch($page){
        case "users";
            include "users.phtml";
            break;
        case "create";
            include "create.phtml";
            break;
        case "update";
            include "update.phtml";
            break;
        default;
            include "error.phtml";
            break;
    }
}
else{
    include "users.phtml";
}


//include "users.phtml";
/* echo "<hr>";
show_source(__FILE__); */