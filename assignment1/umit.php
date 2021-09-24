<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>assignment 1</title>
    <meta name="description" content="assignment 1">
    <meta name="author" content="Umit Kilinc">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <a href="101232721.php">Next Page</a>  
</head>

<body>
<?php 
$firstName = $_GET['firstName'];
$lastName = $_GET["lastName"];
$studentID = $_GET["studentID"];
$colors = $_GET["colors"];

echo "<h2> $firstName $lastName $studentID </h2>";
echo "<style> body {background-color: $colors;} </style>";
     
?>

<hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>

</body>

</html>

<?php
echo "<hr>";
show_source(__FILE__);
?>