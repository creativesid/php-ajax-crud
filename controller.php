<?php
require 'model.php';

$obj = new Model();

// check if user is performing a read action
if(isset($_POST['actionType']) && $_POST['actionType'] == "read"){
   $data = $obj->getAll();

   $output;
   if(count($data) > 0){
        foreach ($data as $row) {
            $output = '<tr>
                <th scope="row">' .$row['tutorial_id']. '</th>
                <td>' .$row['tutorial_title']. '</td>
                <td>' .$row['tutorial_author']. '</td>
                <td>' .$row['submission_date']. '</td>
                <td>
                    <button type="button" id="updateData" class="btn btn-success" data-update-id='.$row['tutorial_id'].' data-toggle="modal" data-target="#updateTutorialModal">
                        Update
                    </button>
                    <button type="button" id="deleteData" class="btn btn-danger" data-id='.$row['tutorial_id'].'>
                        Delete
                    </button>
                </td>
            </tr>';
            echo $output;
        } 

   }else{
        echo '<h4 class="mt-3">Not Data Found :(</h4>';
   }
}

// check if user is inserting data
if(isset($_POST['actionType']) && $_POST['actionType'] == "insert"){
    $tutorial_title = $_POST['tutorial_title'];
    $tutorial_author = $_POST['tutorial_author'];
    $submission_date = $_POST['submission_date'];

    $res = $obj->insert($tutorial_title,$tutorial_author,$submission_date);
    if($res == true){
        echo 1;
    }else{
        echo 0;
    }
}

// check if user is deleting data
if(isset($_POST['actionType']) && $_POST['actionType'] == "delete"){
    $tutorial_id = $_POST['id'];

    $res = $obj->delete($tutorial_id);
    if($res == true){
        echo 1;
    }else{
        echo 0;
    }
}

// show updating tutorial data 
if(isset($_POST['actionType']) && $_POST['actionType'] == "showUpdateData"){
    $tutorial_id = $_POST['id'];

    $res = $obj->get($tutorial_id);
    echo json_encode($res);
}

// check if user is updating data
if(isset($_POST['actionType']) && $_POST['actionType'] == "update"){
    $tutorial_id = $_POST['tutorial_id'];
    $tutorial_title = $_POST['tutorial_title'];
    $tutorial_author = $_POST['tutorial_author'];
    $submission_date = $_POST['submission_date'];

    $res = $obj->update($tutorial_id,$tutorial_title,$tutorial_author,$submission_date);
    if($res == true){
        echo 1;
    }else{
        echo 0;
    }
}

// if user importing data from csv 
if(isset($_POST['actionType']) && $_POST['actionType'] == "importCsv"){
    // Allowed file types
    $allowedTypes = array(
        'text/csv',
        'application/csv',
        'application/excel',
    );

    // Validate whether selected file is a CSV file
    if (in_array($_FILES['file']['type'], $allowedTypes)){
        // Open uploaded CSV file with read-only mode
        $file = fopen($_FILES['file']['tmp_name'], 'r');
        fgetcsv($file);

        $finalRes = 0;
        while (($row = fgetcsv($file, 10000, ",")) !== FALSE){
            $title = $row[0];
            $author = $row[1];
            $date = $row[2];
            $res = $obj->insert($title,$author,$date);
            if($res== true){
                $finalRes = 1;
            }
        }
        
        echo $finalRes;

    }else{
        echo 0;
    }
}

// if user exporting data as csv file
if(isset($_GET['export']) && $_GET['export'] == "csv"){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=output.csv');  
    header('Expires: 0');
    
    $output = fopen("php://output", "w");  
    fputcsv($output, array('tutorial_id', 'tutorial_title', 'tutorial_author', 'submission_date')); 

    $res = $obj->getAll();
    foreach($res as $row)
    {  
        fputcsv($output, $row);  
    }
    fclose($output); 
}


?>