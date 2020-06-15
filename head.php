<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="img/fav.png" type="image/x-icon">
    <title>Le News</title>
</head>
<body>
    <header>
        <h1 class="center-text">Le News</h1>
        <nav class="meni fifty-center">
            <ul>
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <a href="kategorija.php?id=zabava">ZABAVA</a>
                </li>
                <li>
                    <a href="kategorija.php?id=sport">SPORT</a>
                </li>
                <li>
                    <a href="administracija.php">ADMINISTRACIJA</a>
                </li>
                <li>
                    <a href="unos-forma.php">UNOS</a>
                </li>
                <!-- odjava -->
                <?php
                session_start();
                echo isset($_SESSION['korisnicko_ime']) ? '<li><button onclick="odjava();" value="Odjava" class="prijava-btn">Odjava</button>
                </li>' : '',
                '<script>
                function odjava(){
                    window.location.href = "odjava.php";
                }
                </script>';
                ?>
            </ul>
        </nav>
    </header>
    <main>