<?php
    $mysqli = new mysqli("db", "root", "example", "company1");

    if(!$mysqli){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $completed = $_POST['completed'];
    $id = $_POST['id'];

    var_dump($comepleted);

    $sql = "UPDATE todos SET completed = '$completed' WHERE id = '$id'";
    $result = $mysqli->query($sql);

    if(!$result){
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    var_dump($result);

    echo json_encode($result);
?>