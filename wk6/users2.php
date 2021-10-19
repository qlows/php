<?php
 $columns = ["id", "f_name", "l_name", "user_type", "status", "client"];
    $file = fopen("users2.csv","r");
    print_r(fgetcsv($file));
    fclose($file);
// get data from text file
function get_data($file, $columns){
    // global $columns;
    global $entries;
    $users = file("users.txt");
    //$columns = '';
    $handle = fopen($file, 'r') or die("Not able to read file");
    $data = [];
    $counter = 0;
    echo "<pre>";
    print_r($users);
    echo "</pre>"; 
    if($counter == 0 && $columns = $entries){
    if($handle){
        while($entries = fgetcsv($handle)) {
            $data[] = array_combine($columns,$entries);
        }
    }
} 
    fclose($handle);
    print_r($data);
    return $data;
   
}

$users = get_data('users2.csv', $columns);
?>
<!-- // printing out the content of $users array to ensure data is being read -->

