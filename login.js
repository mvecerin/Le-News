const form = document.getElementById('prijava');
// validacija forme za prijavu
form.addEventListener('submit', function (event) {

    let slanjeForme = true;

    // Korisničko ime
    let korisnicko_ime = document.getElementById("korisnicko_ime");
    if (korisnicko_ime.value.length == 0) {
        slanjeForme = false;
        korisnicko_ime.style.border="1px solid red";
        document.getElementById("korisnicko-ime-error").innerHTML="Unesite korisničko ime!";
    }
    else {
        korisnicko_ime.style.border="";
        document.getElementById("korisnicko-ime-error").innerHTML= "";
    }

    // Lozinke
    let lozinka = document.getElementById("lozinka");
    if (lozinka.value.length == 0) {
        slanjeForme = false;
        lozinka.style.border="1px solid red";
        document.getElementById("lozinka-error").innerHTML= "Unesite lozinku!";
    }
    else {
        lozinka.style.border="";
        document.getElementById("lozinka-error").innerHTML="";
    }

    if (slanjeForme != true) {
        event.preventDefault();
    }
});
