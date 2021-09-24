<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>
    <meta name="description" content="assignment 1">
    <meta name="author" content="Umit Kilinc">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .pt12{
            font-size: 12pt;
        }

        .pt18{
            font-size: 18pt;
        }

        .pt24{
            font-size: 24pt;
        }

        .strongChar{
            font-weight: bold;
        }

        .underlineChar{
            text-decoration: underline;
        }

        .uppercaseChar{
            text-transform: uppercase;
        }

        .lime{
            background-color: lime;
        }

        .tan{
            background-color: tan;
        }

        .violet{
            background-color: violet;
        }

    </style>
</head>

<body>
    <?php 
    $firstName = "Umit";
    $lastName = "Kilinc";
    $studentID = "101232721";
    ?>

    <form method="post" action="101232721.php" action="umit.php">
     <!-- part 1 i -->
     <div id="names">
    <label for="firstName">First Name:</label>   
    <input type="text" id="firstName" name="firstName" value= <?php echo $firstName ?>>
    <br><br>
    <label for="lastName">Last Name:</label>   
    <input type="text" id="lastName" name="lastName" value=<?php echo $lastName ?>>
    <br><br>
    <label for="studentID">Student ID:</label>   
    <input type="text" id="studentID" name="studentID" value=<?php echo $studentID ?>>
    </div>
    <br><br>
    <!-- part 1 ii -->
    <label for="course">Choose a course:</label>
    <input list="courseOptions" id="course" name="course">
    <datalist id="courseOptions">
        <option value="COMP1230">
        <option value="COMP2129">
        <option value="COMP2147">
        <option value="COMP2130">
        <option value="COMP2138">
        <option value="GSSC1054">    
    </datalist>

    <br><br>
    <!-- part 1 iii -->
    <input type="radio" id="pt12" name="fontSize" value="12pt">
    <label for="pt12">12pt</label>
    <input type="radio" id="pt18" name="fontSize" value="18pt">
    <label for="pt18">18pt</label>
    <input type="radio" id="pt24" name="fontSize" value="24pt">
    <label for="pt24">24pt</label>

    <br><br>
    <!-- part 1 iv -->
    <input type="checkbox" id="strongChar" name="bold" value="bold">
    <label for="strongChar">Strong</label>
    <input type="checkbox" id="underlineChar" name="underline" value="underline">
    <label for="underlineChar">Underline</label>
    <input type="checkbox" id="uppercaseChar" name="uppercase" value="uppercase">
    <label for="uppercaseChar">Uppercase</label>

    <br><br>
    Color: <select name="colors">
            <option value="lime">Lime</option>
            <option value="tan">Tan</option>
            <option value="violet">Violet</option>
        </select>
        

    <br><br>
    <!-- part 1 v -->
    <input type="submit" value="Submit" name="submit">
    <br><br>
    </form>

    

    <?php 
    
    
    
    /* $letters = ""; */
    $checkbox =""; 
    /* $output = "";  */
    /* $colors="";*/
    if(isset($_POST["submit"])){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"]; 
    $studentID = $_POST["studentID"];  
    $colors = $_POST["colors"];
    echo "<h2> $firstName $lastName $studentID </h2>";

    echo "<a href='umit.php?firstName=$firstName&lastName=$lastName&studentID=$studentID&colors=$colors'>Next Page</a>";

    #part d
    $course = array("COMP1230"=>"Advanced Web Development",
    "COMP2129"=>"Advanced Object-Oriented Programming",
    "COMP2147"=>"System Analysis, Design & Testing",
    "COMP2130"=>"Application Development Using Java",
    "COMP2138"=>"Advanced Database Development",
    "GSSC1054"=>"Forensic Psychology"
    );

    $fontSize = "";
    $bold = "";
    $underline = "";
    $uppercase = ""; 

    if(isset($_POST['fontSize'])){$fontSize = $_POST['fontSize']; }
    if(isset($_POST['bold'])){$bold = $_POST['bold'];}
    if(isset($_POST['underline'])){$underline = $_POST['underline'];}
    if(isset($_POST['uppercase'])){$uppercase = $_POST['uppercase'];}

    if (isset($_POST["course"])) {
        echo "<div class='$fontSize $checkbox' 
        style='font-size:$fontSize;         
        text-transform: $uppercase;
        font-weight: $bold;
        text-decoration: $underline;
        '>Course Name: {$course[$_POST['course']]}</div>";
    }
}
?>

<hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>
<?php
echo "<hr>";
show_source(__FILE__);
?>