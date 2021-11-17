<?php
require "functions.inc.php";
$users = get_data();

/* echo "<pre>";
print_r($users);
echo "</pre>";
exit; */

/* $f_name = ""; */
/* $l_name = ""; */
/* $age = ""; */
$id = ""; 
$type = "";
$brand = "";
$model = "";
$size = "";
$price = "";
$sale = "";
$desc = "";
$tv ="";

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
            $id = $record[1];
            $type = $record[2];
            $brand = $record[3];
            $model = $record[4];
            $size = $record[5];
            $price = $record[6];
           /* $sale = $record[7];*/
            /* $desc = $record[7];
            $tv = $record[8];  */
            
        }
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "create":
                
                $type = $_POST["typeName"];
                $brand = $_POST["brandName"];
                $model = $_POST["modelName"];
                $size = $_POST["sizeName"];
                $price = $_POST["priceName"];
                $sale = $_POST["saleName"];
                $desc = $_POST["descName"];
                $tv = $_POST["tvName"];
                
                create_record([$type, $brand, $model, $size, $price, $sale, $desc, $tv]);
                break;

            case "update":
                $type = $_POST["typeName"];
                $brand = $_POST["brandName"];
                $model = $_POST["modelName"];
                $size = $_POST["sizeName"];
                $price = $_POST["priceName"];
                $sale = $_POST["saleName"];
                $desc = $_POST["descName"];
                $tv = $_POST["tvName"];
                    if(update_record($users, [$id, $type, $brand, $model, $size, $price, $sale, $desc, $tv])){
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

/* echo "<hr>";
show_source(__FILE__); */