<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Gry komputerowe</title>
</head>

<body>
    <?php

    use Dba\Connection;
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'gry';

    $connection = mysqli_connect($server, $user, $password, $database);
    ?>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <aside id="lewa">
        <?php
        $query = 'SELECT gry.nazwa, gry.punkty FROM gry ORDER BY gry.punkty DESC LIMIT 5;';
        $result = mysqli_query($connection, $query);

        echo "<h3>Top 5 gier w tym miesiącu</h3>";
        echo "<ul>";
        while ($table = mysqli_fetch_row($result)) {
            echo
                "<li><div>$table[0]</div><div class='punkt'>$table[1]</div></li>";
        }
        echo "</ul>";
        ?>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>„Stronę wykonał</h3>
        <p>0000000000000</p>
    </aside>
    <main>
        <?php
        $query = 'SELECT gry.id, gry.nazwa, gry.zdjecie FROM gry;';
        $result = mysqli_query($connection, $query);

        while ($table = mysqli_fetch_row($result)) {
            echo "<div class='img'>";
            echo "<img src='resursy/{$table[2]}' alt='{$table[1]}' title='{$table[0]}'>";
            echo "<p>{$table[1]}</p>";
            echo "</div>";
        }
        ?>
    </main>
    <aside id="prawa">
        <h3>Dodaj nową grę</h3>
        <form method="post">
            <label for="nazwa"></label>
            <input id="nazwa" name="nazwa" type="text">
            <label for="opis"></label>
            <input id="opis" name="opis" type="text">
            <label for="cena"></label>
            <input id="cena" name="cena" type="text">
            <label for="zdjecie"></label>
            <input id="zdjecie" name="zdjecie" type="text">
            <button type="sumbit">DODAJ</button>
        </form>
    </aside>
    <footer>
        <form method="post">
            <label for="id"></label>
            <input id="skrypt" name="id" type="text">
            <button type="sumbit">Pokaż opis</button>
            <?php
            if (isset($_POST["id"])) {
                $id = ($_POST["id"]);
                $query = "SELECT gry.nazwa, LEFT(gry.opis, 100) opis, gry.punkty, gry.cena FROM gry WHERE gry.id='{$id}';";
                $result = mysqli_query($connection, $query);
                $table = mysqli_fetch_row($result);

                echo "<h2>{$table[0]} {$table[2]} {$table[3]}</h2>";
                echo "<p>{$table[1]}</p>";

                mysqli_close($connection);
            }
            ?>
        </form>
    </footer>
</body>

</html>