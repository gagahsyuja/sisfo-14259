<?php

session_start();

include_once '../conn.php';

$dbname = $_SESSION['uname'];

$sql = "SELECT `coin_short_name` FROM `coin`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
    $shorts[] = $row;
}

$i = 1;

foreach ($shorts as $short)
{
    $name = 'submit' . ucfirst($short['coin_short_name']);
    $shortName = $short['coin_short_name'];

    if (isset($_POST[$name]))
    {
        $sql = "SELECT * FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$shortName'";
        $exist = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($exist) > 0)
        {
            $delete = "DELETE FROM `watchlist` WHERE `uname` = '$dbname' AND `coin_short_name` = '$shortName'";
            
            mysqli_query($conn, $delete);
            // header("Location: ../index.php");
            echo '<script>window.location = "../index.php"</script>';
        }
        
        else
        {
            $add = "INSERT INTO `watchlist` (`uname`, `coin_short_name`) VALUES ('$dbname', '$shortName')";
            
            mysqli_query($conn, $add);
            // header("Location: ../index.php");
            echo '<script>window.location = "../index.php"</script>';
        }
    }

    $i++;
}

?>