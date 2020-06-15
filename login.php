<?php
   session_start();

    // pokazuje formu za prijavu
   function pokaziFormu(){

    echo '<section class="forma" id="login">
        <h2 class="center-text">Prijava</h2>
        <form action="" method="POST" id="prijava" novalidate>

            <div class="input">
                <label for="korisnicko_ime">Korisničko ime</label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" maxlength="32" autofocus>
                <p class="error" id="korisnicko-ime-error"></p>
            </div>

            <div class="input">
                <label for="lozinka">Lozinka</label>
                <input type="password" name="lozinka" id="lozinka">
                <p class="error" id="lozinka-error"></p>
            </div>

            <div class="input">
                <button type="submit" value="Prijava" name="submit" id="submit" class="prijava-btn">Prijava</button>
            </div>

            <div class="input">
                <a href="registracija.php">Nemaš račun?</a>
            </div>

        </form>
    </section>

    <script src="login.js">
    </script>';
    }

    // prebacuje korisnika na administraciju
    function pokaziInfo(){
        header('Location: administracija.php');
    }

    // prijavljuje korisnika
    function login($dbc){
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = $_POST['lozinka'];

        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?;";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        mysqli_stmt_bind_result($stmt, $user, $pass, $level);
        mysqli_stmt_fetch($stmt);

        if(mysqli_stmt_num_rows($stmt) > 0) {
            if(password_verify($lozinka, $pass)) {
                $_SESSION['korisnicko_ime'] = $korisnicko_ime;
                $_SESSION['level'] = $level;
                pokaziInfo();
            }
            else {
                echo '<p>Neispravna lozinka!</p>';
            }
        }
        else {
            echo '<p>Korisnik ne postoji!</p>';
        }
    }

    // prijavljuje korisnika ako nije vec prijavljen, inace ga prebacuje
    if (isset($_SESSION['korisnicko_ime'])){
        pokaziInfo();
    }
    else {
        include 'head.php';
        include 'connect.php';
        pokaziFormu();
        if(isset($_POST['submit'])){
            login($dbc);
        }
        include 'footer.php';
    }

   ?>