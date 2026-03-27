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
    require('function.php');
    $connection = connection();
    ?>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <aside id="lewa">
        <h3>Nasz sklep</h3>
        <?php 
        echo script_1($connection);
        ?>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>„Stronę wykonał</h3>
        <p>0000000000000</p>
    </aside>
    <main>
        <?php 
        echo script_2($connection);
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
            <?php
            echo script_4($connection);
            ?>
        </form>
    </aside>
    <footer>
        <form method="post">
            <label for="id"></label>
            <input id="skrypt" name="id" type="text">
            <button type="sumbit">Pokaż opis</button>
            <?php 
            echo script_3($connection);
            mysqli_close($connection);
            ?>
        </form>
    </footer>
</body>

</html>