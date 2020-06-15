const form = document.getElementById('unos-vijesti');
// validacija forme za unos clanaka
form.addEventListener('submit', function (event) {

    let slanjeForme = true;

    // Naslov vijesti (5-30 znakova)
    let naslov = document.getElementById("naslov");

    if (naslov.value.length < 5 || naslov.value.length > 30) {
        slanjeForme = false;
        naslov.style.border="1px solid red";
        document.getElementById("naslov-error").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!";
    }
    else {
        naslov.style.border="";
        document.getElementById("naslov-error").innerHTML="";
    }

    // Kratki sadržaj (10-100 znakova)
    let sazetak = document.getElementById("sazetak");
    if (sazetak.value.length < 10 || sazetak.value.length > 100) {
        slanjeForme = false;
        sazetak.style.border="1px solid red";
        document.getElementById("sazetak-error").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!";
    }
    else {
        sazetak.style.border="";
        document.getElementById("sazetak-error").innerHTML="";
    }

    // Sadržaj mora biti unesen
    let vijest = document.getElementById("vijest");
    if (vijest.value.length == 0) {
        slanjeForme = false;
        vijest.style.border="1px solid red";
        document.getElementById("vijest-error").innerHTML="Sadržaj mora biti unesen!";
    }
    else {
        vijest.style.border="";
        document.getElementById("vijest-error").innerHTML="";
    }

    // Slika mora biti unesena
    let slika = document.getElementById("slika");
    if (slika.value.length == 0) {
        slanjeForme = false;
        slika.style.border="1px solid red";
        document.getElementById("slika-error").innerHTML="Slika mora biti unesena!";
    }
    else {
        slika.style.border="";
        document.getElementById("slika-error").innerHTML="";
    }

    if (slanjeForme != true) {
        event.preventDefault();
    }
});

