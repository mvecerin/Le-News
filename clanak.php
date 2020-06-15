   <?php
    include 'head.php';
    include 'connect.php';
    define('URLPATH', 'img/');

    $id = $_GET['id'];

    $sql="SELECT * FROM $table WHERE id=$id;";

    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $red_id, $red_datum, $red_naslov, $red_sazetak, $red_vijest, $red_slika, $red_kategorija, $red_arhiva);

    mysqli_stmt_fetch($stmt);

    ?>
    <!-- ISPISUJE CLANAK KOJI JE UNESEN -->
    <section class="clanak-section">

        <p class="clanak-ime-kategorije"><?php echo $red_kategorija;?></p>

        <article class="clanak">

            <h2 class="clanak-naslov"><?php echo $red_naslov;?></h2>

            <p class="clanak-sazetak"><?php echo $red_sazetak;?></p>

            <div class="crta"></div>

            <figure>
                <?php
                echo "<img src='" . URLPATH . $red_slika . "' alt='$red_kategorija'>";
                ?>
                <figcaption></figcaption>
            </figure>

            <p class="clanak-tekst"><?php echo $red_vijest;?></p>
        </article>
    </section>
   <?php
       include 'footer.php';
    ?>