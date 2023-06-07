<?php
    $mysqli = new mysqli("db", "root", "example", "company1");

    if(!$mysqli){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $id = $_POST['id'];

    var_dump($id);

    $sql = "DELETE FROM todos WHERE id = '$id'";
    $result = $mysqli->query($sql);

    if(!$result){
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    var_dump($result);

    echo json_encode($result);
?>