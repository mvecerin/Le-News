<?php
include 'head.php';
?>
<!-- FORMA ZA UNOS NOVIH VIJESTI -->
     <section class="forma">
        <h2 class="center-text">Unos vijesti</h2>
        <form action="unos.php" method="POST" id="unos-vijesti" enctype='multipart/form-data' novalidate>

            <div class="input">
                <label for="naslov">Naslov vijesti (do 30 znakova)</label>
                <input type="text" name="naslov" id="naslov" class="form-width" minlength="5" maxlength="30" autofocus>
                <p class="error" id="naslov-error"></p>
            </div>

            <div class="input">
                <label for="sazetak">Kratki sadržaj vijesti (do 100 znakova)</label>
                <textarea name="sazetak" id="sazetak" class="form-width" rows="5" minlength="10" maxlength="100"></textarea>
                <p class="error" id="sazetak-error"></p>
            </div>

            <div class="input">
                <label for="vijest">Sadržaj vijesti</label>
                <textarea name="vijest" id="vijest" class="form-width" rows="30" minlength="1" maxlength="65535"></textarea>
                <p class="error" id="vijest-error"></p>
            </div>

            <div class="input">
                <label for="kategorija">Kategorija vijesti</label>
                <select name="kategorija" id="kategorija">
                  <option value="sport">sport</option>
                  <option value="zabava">zabava</option>
                </select>
                <p class="error" id="kategorija-error"></p>
            </div>

            <div class="input">
                <label for="slika">Slika</label>
                <input type="file" name="slika" id="slika" accept="image/*" required>
                <p class="error" id="slika-error"></p>
            </div>

            <div class="input">
                <label for="obavijest">Arhivirati?</label>
                <input type="checkbox" name="obavijest" id="obavijest">
                <p class="error" id="obavijest-error"></p>
            </div>

            <div class="input">
                <button type="reset" value="Poništi" class="prijava-btn">Poništi</button>
                <button type="submit" name="submit" id="submit" value="Unesi" class="prijava-btn">Unesi</button>
            </div>

        </form>
    </section>
    <script src="unos.js"></script>
   <?php
   include 'footer.php';
   ?>