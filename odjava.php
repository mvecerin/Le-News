<?php
    session_start();
    // unistava session i session varijable
    function odjavi() {
        $_SESSION = array();
        session_destroy();
    }
    odjavi();
    if(isset($_SESSION['korisnicko_ime'])) {
        echo '<p>Niste uspješno odjavljeni</p>';
    }
    else {
        header('Location: index.php');
    }
?>