<?php
    $mysqli = new mysqli("db", "root", "example", "company1");

    if(!$mysqli){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $title = $_POST['title'];

    var_dump($title);

    $sql = "INSERT INTO todos (title) VALUES ('$title')";
    $result = $mysqli->query($sql);

    if(!$result){
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    var_dump($result);

    echo json_encode($result);
?>