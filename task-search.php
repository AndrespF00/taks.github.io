<?php
    include('database.php');

    $search = $_POST['search'];

    if(!empty($search)){
        require 'database.php';
        $query = "SELECT * FROM task WHERE name LIKE '$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Query Error'. mysqli_error($conn));
        }
        
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name' => $row['name'],
                'description' => $row['description'],
                'id' => $row['id']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }


?>