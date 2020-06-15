<?php
session_start();
include 'head.php';
include 'connect.php';

// prikazuje formu za registraciju
function pokaziFormu(){

    echo '<section class="forma" id="login">
        <h2 class="center-text">Registracija</h2>
        <form action="" method="POST" id="registracija" novalidate>

            <div class="input">
                <label for="ime">Ime</label>
                <input type="text" name="ime" id="ime" maxlength="32" autofocus>
                <p class="error" id="ime-error"></p>
            </div>

            <div class="input">
                <label for="prezime">Prezime</label>
                <input type="text" name="prezime" id="prezime" maxlength="32">
                <p class="error" id="prezime-error"></p>
            </div>

            <div class="input">
                <label for="korisnicko_ime">Korisničko ime</label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" maxlength="32">
                <p class="error" id="korisnicko-ime-error"></p>
            </div>

            <div class="input">
                <label for="lozinka">Lozinka</label>
                <input type="password" name="lozinka" id="lozinka">
                <p class="error" id="lozinka-error"></p>
            </div>

            <div class="input">
                <label for="lozinka2">Ponoviti lozinku</label>
                <input type="password" name="lozinka2" id="lozinka2">
                <p class="error" id="lozinka2-error"></p>
            </div>

            <div class="input">
                <button type="submit" value="Unesi" name="submit" id="submit" class="prijava-btn">Unesi</button>
            </div>

        </form>

        <script src="registracija.js">
        </script>';
    }

    // prikazuje informaciju da je korisnik vec prijavljen i opciju za odjavu
    function pokaziInfo(){
        echo '<section class="info-page">
            <p class="center-text">Već ste prijavljeni kao ', $_SESSION['korisnicko_ime'], '</p>
            <div class="input">
                <button onclick="odjava();" value="Odjavi" id="odjava-info" class="prijava-btn">Odjava</button>
            </div>
        </section>
        <script>
            function odjava(){
                window.location.href = "odjava.php";
            }
        </script>';
    }

    // registrira novog korisnika
    function registriraj($dbc){
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = $_POST['lozinka'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $level = 0;

        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?;";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if(mysqli_stmt_num_rows($stmt) > 0) {
            echo '<p>Korisničko ime već postoji!</p>';
        }
        else {
            // Ako ne postoji korisnik
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $korisnicko_ime, $hashed_password, $level);
                mysqli_stmt_execute($stmt);
                echo '<p>Uspješno ste registrirani!</p>
                <button onclick="login()" class="prijava-btn" id="prijava" value="Prijava">Prijava</button>
                <script>
                function login(){
                    window.location.href = "login.php";
                }
                </script>';
            }
        }
    }

    // ako je korisnika prijavljen, mora se prvo odjaviti, inace pokazuje formu
    if (isset($_SESSION['korisnicko_ime'])){
        pokaziInfo();
    }
    else {
        pokaziFormu();
        if(isset($_POST['submit'])){
            registriraj($dbc);
        }
    }
    ?>
    </section>
    <?php
    include 'footer.php';
    ?>