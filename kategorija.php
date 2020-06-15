   <?php
    include 'head.php';
    include 'connect.php';
    define('URLPATH', 'img/');

    $kategorija = $_GET['id'];

    echo '<h3 class="ime-kategorije-naslovna">', strtoupper($kategorija), '</h3>';

    $sql="SELECT * FROM $table WHERE kategorija='$kategorija' AND arhiva=0 ORDER BY id DESC;";

    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $red_id, $red_datum, $red_naslov, $red_sazetak, $red_vijest, $red_slika, $red_kategorija, $red_arhiva);

    // ispisuje sve clanke te kategorije, stavlja section oko reda od 3 artikla
    $i = 0;
    while(mysqli_stmt_fetch($stmt)){
        $i++;
        if($i == 1){
            echo '<section class="section-3-clanaka" id="kategorije">';
        }
        echo "<article class='clanak-naslovna'>";
        echo "<a href='clanak.php?id=".$red_id."'>";
        echo "<img src='" . URLPATH . $red_slika . "' alt='$red_kategorija'>";
        echo "<p>$red_sazetak</p>";
        echo "</a>";
        echo "</article>";
        if($i == 3){
            echo '</section>';
            $i = 0;
        }
     }
     if($i != 0){
         echo '</section>';
     }

     include 'footer.php';
    ?>