<?php
    $mysqli = new mysqli("db", "root", "example", "company1");

    $sql = 'SELECT * FROM todos';

    if ($result = $mysqli->query($sql)) {
        while ($data = $result->fetch_object()) {
            $todos[] = $data;
        }
    }

    echo json_encode($todos);
?>