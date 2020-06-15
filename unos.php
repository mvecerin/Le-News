 <?php

   include 'head.php';
   include 'connect.php';

    // unosi vijesti unesene sa unos-forma.php
    if(isset($_POST["submit"])){

        $naslov = $_POST['naslov'];
        $sazetak = $_POST['sazetak'];
        $vijest = $_POST['vijest'];
        $kategorija = $_POST['kategorija'];
        $datum = date('d.m.Y');

        // slika
        $slika = $_FILES['slika']['name'];
        $target = 'img/' . $slika;
        move_uploaded_file($_FILES['slika']['tmp_name'], $target);

        // arhiva
        if(isset($_POST['obavijest'])){
            $arhiva = 1;
        }
        else{
            $arhiva = 0;
        }

        if($dbc){
            $sql="INSERT INTO $table(datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $naslov, $sazetak, $vijest, $slika, $kategorija, $arhiva);
                mysqli_stmt_execute($stmt);
             }
        }
    }
    ?>
    <section class="clanak-section">

        <p class="clanak-ime-kategorije"><?php echo $kategorija;?></p>

        <article class="clanak">

            <h2 class="clanak-naslov"><?php echo $naslov;?></h2>
            <p class="clanak-sazetak"><?php echo $sazetak;?></p>
            <div class="crta"></div>
            <figure>
                <?php
                echo "<img src='img/$slika' alt='$kategorija'>";
                ?>
                <figcaption></figcaption>
            </figure>
            <p class="clanak-tekst"><?php echo $vijest;?></p>

        </article>
    </section>
   <?php
    include 'footer.php';
   ?>