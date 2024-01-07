<?php

include_once './conn.php';

$sql = "SELECT * FROM `ringkasan`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
    $getCols[] = $row;
}

foreach ($getCols as $i)
{
    $id = $i['id'];
    $judul = $i['judul'];

    echo 
    '
    <div class="watchlist-outside">
        <a href="./php/isi.php?id=' . $id . '"><span class="watchlist-outside-link"></span><h2>'. $id . '. ' . $judul . '</h2></a>
    </div>
    ';
}

?>