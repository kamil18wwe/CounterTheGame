<?php

$conn = mysqli_connect('szczeszek.home.pl', '01493838_infrmtk','dA6qNixJ','01493838_infrmtk');

if(isset($_POST['game']) && isset($_POST['name']) && isset($_POST['score'])){
    echo $_POST['name'] . '\'s score is ' . isset($_POST['score']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $score = mysqli_real_escape_string($conn, $_POST['score']);

    $query = "INSERT INTO " . $_POST['game'] . " VALUES (NULL,'$name','$score')";

    if(mysqli_query($conn, $query)){
        echo 'Record added';
        $query2 = "DELETE * FROM " . $_POST['game'] . " WHERE score = (SELECT MIN(score) FROM " . $_POST['game'] . ")";

        if(mysqli_query($conn, $query2)){
            echo 'Record deleted';
        }
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
}