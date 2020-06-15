const form = document.getElementById('registracija');
// validacija forme za registraciju
form.addEventListener('submit', function (event) {

    let slanjeForme = true;

    // Ime
    let ime = document.getElementById("ime");
    if (ime.value.length == 0) {
        slanjeForme = false;
        ime.style.border="1px solid red";
        document.getElementById("ime-error").innerHTML="Unesite ime!";
    }
    else {
        ime.style.border="";
        document.getElementById("ime-error").innerHTML="";
    }

    // Prezime
    let prezime = document.getElementById("prezime");
    if (prezime.value.length == 0) {
        slanjeForme = false;
        prezime.style.border="1px solid red";
        document.getElementById("prezime-error").innerHTML="Unesite prezime!";
    }
    else {
        prezime.style.border="";
        document.getElementById("prezime-error").innerHTML="";
    }

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
    let lozinka2 = document.getElementById("lozinka2");
    if (lozinka.value.length == 0) {
        slanjeForme = false;
        lozinka.style.border="1px solid red";
        document.getElementById("lozinka-error").innerHTML= "Unesite lozinku!";
    }
    else if(lozinka.value != lozinka2.value){
        slanjeForme = false;
        lozinka2.style.border="1px solid red";
        document.getElementById("lozinka2-error").innerHTML= "Lozinke nisu iste!";
    }
    else {
        lozinka.style.border="";
        lozinka2.style.border="";
        document.getElementById("lozinka-error").innerHTML="";
        document.getElementById("lozinka2-error").innerHTML="";
    }

    if (slanjeForme != true) {
        event.preventDefault();
    }
});