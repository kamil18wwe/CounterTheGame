<?php

$conn = mysqli_connect('szczeszek.home.pl', '01493838_infrmtk','dA6qNixJ','01493838_infrmtk');

$query = 'SELECT * FROM counter ORDER BY score DESC LIMIT 10';

$result = mysqli_query($conn, $query);

$records = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($records);