<?php
function connection()
{
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'gry';

    return mysqli_connect($server, $user, $password, $database);
}

function script_1($connection)
{
    $query = 'SELECT gry.nazwa, gry.punkty FROM gry ORDER BY gry.punkty DESC LIMIT 5;';
    $result = mysqli_query($connection, $query);

    $temp = "<h3>Top 5 gier w tym miesiącu</h3><ul>";
    while ($table = mysqli_fetch_row($result)) {
        $temp = $temp . "<li><div id='li_block'>$table[0]<div class='punkt'>$table[1]</div></div></li>";
    }
    $temp = $temp . "</ul>";

    return $temp;
}

function script_2($connection)
{
    $query = 'SELECT gry.id, gry.nazwa, gry.zdjecie FROM gry;';
    $result = mysqli_query($connection, $query);
    $temp = '';
    while ($table = mysqli_fetch_row($result)) {
        $temp = $temp . "<div class='img'><img src='resources/{$table[2]}' alt='{$table[1]}' title='{$table[0]}'><p>{$table[1]}</p></div>";
    }
    return $temp;
}


function script_3($connection)
{
    if (isset($_POST["id"])) {
        $id = ($_POST["id"]);
        $query = "SELECT gry.nazwa, LEFT(gry.opis, 100) opis, gry.punkty, gry.cena FROM gry WHERE gry.id='{$id}';";
        $result = mysqli_query($connection, $query);
        $table = mysqli_fetch_row($result);

        $temp = "<h2>{$table[0]} {$table[2]} {$table[3]}</h2><p>{$table[1]}</p>";
        return $temp;

    }
}

function script_4($connection)
{
    if (isset($_POST['nazwa'])) {
        $nazwa = $_POST['nazwa'];
        $opis = $_POST['opis'];
        $cena = $_POST['cena'];
        $zdjecie = $_POST['zdjecie'];

        $query = "INSERT INTO `gry`(`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('{$nazwa}','{$opis}',0,'{$cena}','{$zdjecie}');";
    }
}

?>