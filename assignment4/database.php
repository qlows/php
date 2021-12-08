<?php
$db_info = 'mysql:host=127.0.0.1;dbname=f1232721_test';
$username = 'root';
$password = '123';

try{
    $db_con = new PDO($db_info, $username, $password);
}catch(PDOException $e){
    $error_message = $e->getMessage();
    echo "PDO Database not connected. Error: " . $error_message. "<br>";
    exit();
}


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $query = "select * from guitar where guitar_wood ='spruce'";
    $prepped_query = $db_con->prepare($query);
    $success = $prepped_query->execute();
    if($success){
    echo "successful execution of query <br>";
    $sql_results = $prepped_query->fetchAll();
    var_dump($sql_results);
    }
?>
          
    <table>
            <tr>
              <th>Name</th>
              <th>ID</th>
              <th>Year</th>
              <th>Wood type</th>
            </tr>
            <?php foreach($sql_results as $sql_result) :?>
              <tr>
                <td><?php var_dump($sql_result['guitar_name'])  ?></td>
                <td><?php var_dump($sql_result['guitar_id'])  ?></td>
                <td><?php var_dump($sql_result['guitar_year'])  ?></td>
                <td><?php var_dump($sql_result['guitar_wood'])  ?></td>
              </tr>
              <?php endforeach; ?>            
    </table>
<?php 
            $row_values = array("'taylor'", 5, 2017, "'sapele'");
            $query3 = "INSERT INTO guitar (guitar_name, guitar_id, guitar_year, guitar_wood)
            VALUES ($row_values[0], $row_values[1], $row_values[2],$row_values[3])";
            echo $query3;

            $prepped_query3 = $db_con->prepare($query3);
            $success3 = $prepped_query3->execute();

            if($success3){
              echo "<br> Successful execution of query<br>";
            }            