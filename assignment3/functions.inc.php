<?php
function create_record($record, $file_name="users.csv"){
    $handle = fopen($file_name, "a") or die("File could not open!");
    $id = uniqid();
    array_unshift($record, $id);
    fputcsv($handle, $record);
    fclose($handle);
}

function get_data($file_name="users.csv"){
    $handle = fopen($file_name, "r") or die("File could not open!");
    $users = [];
    while($entries = fgetcsv($handle)){
        $users[] = $entries;
    }
    fclose($handle);
    return $users;
}

function get_record($records, $id){
    $index = array_search($id, array_column($records, 0));
    if($index >= 0){
        return $records[$index];
    }
    else return null;
}

function update_record($records, $record, $file_name="users.csv"){
    $index = array_search($record[0], array_column($records, 0));
    if($index >= 0){
        $data = [];
        $data = array_map(function($r) use($record){
            if($r[0] === $record[0]){
                return $record;
            }
            else return $r;
        }, $records);
        return overwrite_file($data);
    }
    else return false;
}

function delete_record($records, $id, $file_name="users.csv"){
    $index = array_search($id, array_column($records, 0));
    if($index >= 0){
        array_splice($records, $index, 1);
        return overwrite_file($records);
    }
    else{
        return false;
    }
}

function overwrite_file($records, $file_name="users.csv"){
    $file = fopen($file_name, "w") or die("couldnt open the file for writing");
    foreach($records as $record){
        fputcsv($file, $record);
    }
    fclose($file);
    return true;
}