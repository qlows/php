<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>week 1</title>
    <meta name="description" content="week 1">
    <meta name="author" content="Umit Kilinc">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .lime {
            background-color: lime;
        }

        .tan {
            background-color: tan;
        }

        .violet {
            background-color: violet;
        }
    </style>
</head>

<body>

    <form method="post" action="umit.php">
        Subject: <input type="text" name="subject">
        <br><br>

        Color: <select name="colors">
            <option value="lime">Lime</option>
            <option value="tan">Tan</option>
            <option value="violet">Violet</option>
        </select>
        <br><br>

        <textarea name="comment" rows="4" cols="50" placeholder="Leave your comment here..."></textarea>
        <br><br>

        <input type="submit" value="Submit" name="submit">
        <br><br>
    </form>

    <?php
    $subject = "";
    $colors = "";
    $comment = "";
    $output = "";

    if (isset($_POST["submit"])) {
        $subject = $_POST["subject"];
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
       
        $colors = $_POST["colors"];
       
        $comment = $_POST["comment"];
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
       
        $output = "<section class='$colors'> <h2> Output: $subject</h2>
        <h3>Comment: $comment</h3> </section>";
    }
    echo $output;

    ?>

    <hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>

</body>

</html>

<?php
echo "<hr>";
show_source(__FILE__);
?>