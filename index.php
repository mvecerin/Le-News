<?php
   include 'head.php';
   include 'connect.php';
   define('URLPATH', 'img/');

   $kategorije = array('sport','zabava');

   // prikazuje po 3 clanka za svaku kategoriju
   foreach($kategorije as $i){
      echo '<section class="section-3-clanaka">';
      echo '<h3 class="ime-kategorije-naslovna">', ucfirst($i), '</h3>';

      $sql="SELECT * FROM $table WHERE arhiva = 0 AND kategorija = '$i' ORDER BY id DESC LIMIT 3;";

      $stmt = mysqli_stmt_init($dbc);
      if (mysqli_stmt_prepare($stmt, $sql)){
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
       }
       mysqli_stmt_bind_result($stmt, $red_id, $red_datum, $red_naslov, $red_sazetak, $red_vijest, $red_slika, $red_kategorija, $red_arhiva);

       while(mysqli_stmt_fetch($stmt)){
          echo "<article class='clanak-naslovna'>";
          echo "<a href='clanak.php?id=".$red_id."'>";
          echo "<img src='" . URLPATH . $red_slika . "' alt='$red_kategorija'>";
          echo "<p>$red_sazetak</p>";
          echo "</a>";
          echo "</article>";
       }
       echo '</section>';
   }
    //  footer, zatvara main i ostatak, zatvara konekciju s bazom
    include 'footer.php';
?>