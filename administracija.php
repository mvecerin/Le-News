<?php
   session_start();
   include 'head.php';
   include 'connect.php';
   define('URLPATH', 'img/');

    //    ISPISUJE FORMU ZA UREĐIVANJE VIJESTI
    function pokaziFormu($table, $dbc){
        $query = "SELECT * FROM $table;";
        $result = mysqli_query($dbc, $query);

        while($row = mysqli_fetch_array($result)) {

            echo '<section class="forma">
            <h2 class="center-text">Uređivanje vijesti</h2>
            <form enctype="multipart/form-data" action="" method="POST" id="unos-vijesti">

            <div class="input">
                <label for="naslov">Naslov vijesti</label>
                <input type="text" name="naslov" id="naslov" class="form-width" value="'.$row['naslov'].'">
            </div>

            <div class="input">
                <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova)</label>
                <textarea name="sazetak" id="sazetak" class="form-width" rows="5">'.$row['sazetak'].'</textarea>
            </div>

            <div class="input">
                <label for="vijest">Sadržaj vijesti</label>
                <textarea name="vijest" id="vijest" class="form-width" rows="30">'.$row['tekst'].'</textarea>
            </div>

            <div class="input">
                <label for="kategorija">Kategorija vijesti</label>
                <select name="kategorija" id="kategorija" autocomplete="off">';
                echo '<option value="zabava"', !strcmp($row["kategorija"],"zabava") ? ' selected' : '', '>zabava</option>';
                echo '<option value="sport"', !strcmp($row["kategorija"],"sport") ? ' selected' : '', '>sport</option>';
            echo '</select>
            </div>

            <div class="input">
                <label for="slika">Slika</label>
                <img src="'. URLPATH . $row['slika'] . '" class="preview-slika">
                <input type="file" name="slika" id="slika" accept="image/*">

            </div>

            <div class="input">
                <label for="obavijest">Arhivirati?</label>';

                if($row['arhiva'] == 0) {
                    echo'<input type="checkbox" name="obavijest" id="obavijest">';
                }
                else {
                    echo'<input type="checkbox" name="obavijest" id="obavijest" checked>';
                }
            echo '</div>

            <div class="input">
                <input type="hidden" name="id" value="'.$row['id'].'">

                <button type="reset" value="Poništi" class="prijava-btn">Poništi</button>
                <button type="submit" name="update" value="Prihvati" class="prijava-btn"> Izmijeni</button>
                <button type="submit" name="delete" value="Izbriši" class="prijava-btn"> Izbriši</button>
            </div>
        </form>
        </section>';

        }
        // ako je izbrisano
        if(isset($_POST['delete'])) {
            $id=$_POST['id'];
            $query= "DELETE FROM $table WHERE id=$id;";
            $result= mysqli_query($dbc, $query);
        }

        // ako je izmijenjeno
        if(isset($_POST['update'])) {
            $naslov = $_POST['naslov'];
            $sazetak = $_POST['sazetak'];
            $vijest = $_POST['vijest'];
            $kategorija = $_POST['kategorija'];
            $id = $_POST['id'];

            if(isset($_POST['obavijest'])) {
                $obavijest = 1;
            }
            else {
                $obavijest = 0;
            }

            // mijenja sliku u bazi samo ako je izmijenjena
            if(isset($_POST['slika'])){
                $slika = $_FILES['slika']['name'];
                $target_dir = 'img/'.$slika;
                move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
                $slika_string = ", slika='$slika'";
            }
            else{
                $slika_string = "";
            }

            $query = "UPDATE $table SET naslov='$naslov', sazetak='$sazetak', tekst='$vijest', kategorija='$kategorija', arhiva='$obavijest' '$slika_string' WHERE id=$id;";
            $result = mysqli_query($dbc, $query);
        }
    }

    // POKAZUJE INFORMACIJU O ZABRANJENOM PRISTUPU
    function pokaziInfo(){
        echo '<section class="info-page fifty-center">
        <p class="center-text">Zabranjeno uređivanje ako korisnik nije administrator.</p>',
        isset($_SESSION['korisnicko_ime']) ? '' : '<button onclick="login()" class="prijava-btn" id="prijava-info" value="Prijava">Prijava</button>',
        '</section>
        <script>
        function login(){
            window.location.href = "login.php";
        }
        </script>';
    }

    // ako je već prijavljen i admin, pokazuje formu
    if($_SESSION['level'] == 1 && isset($_SESSION['korisnicko_ime'])){
        pokaziFormu($table, $dbc);
    }
    else{
        pokaziInfo();
    }

    include 'footer.php';
    ?>