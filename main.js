// prikazivanje forme za dodavanje - na klik

$("#nova-pozajmica").click(function () {
    $(".prozor-knjiga").toggleClass("hidden-knjiga");
});

// iznajmljivanje nove knjige

$("#dodajNovu").submit(function (e) {
    e.preventDefault();
    console.log("Dodavanje");
    const $form = $(this);
    const $input = $form.find('input, textarea, button, select');
    const podaci = $form.serialize();
    $input.prop('disabled', true);

    let request = $.ajax({
        url: 'handler/add.php', 
        type: 'POST',
        data: podaci
    });

    request.done(function (response) {
        if (response === 'Success') {
            alert("Uspesno ste iznajmili novu knigu.");
            location.reload(true);
        } else {
            console.log("Neuspesno iznajmljivanje knjige. " + response);
        }
    });

    request.fail(function () {
        console.error("Desila se greska.");
    });

});

// vrati knjigu tj obrisi iz baze

$(".vrati-knjigu-button").click(function (e) {
    e.preventDefault();

    console.log("Vracanje knjige");

    let id = $(this).data('id');

    let td = $("#" + id).closest('tr');

    
    let request = $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: {
            id_pozajmice: id
        }
    });



    request.done(function (response) {
        console.log(response)
        if (response === 'Success') {
            td.remove();
            alert("Vratili ste knigu.");
            location.reload(true);
        } else {
            console.log("Neuspesno vracanje knjige.");
        }
    });
});

// prikazivanje forme za izmenu


$(".izmeni-knjigu-button").click(function () {
    $(".izmeni-knjigu").toggleClass("hidden-knjiga");
    console.log("Izmena");

    let id = $(this).data('id');
    let knjiga = $("#" + id).children("td[data-target=knjiga]").text();
    let autor = $("#" + id).children("td[data-target=autor]").text();
    let vrsta = $("#" + id).children("td[data-target=vrsta]").text();
    let id_korisnik = $("#" + id).children("td[data-target=id_korisnik]").text();

    $("#id-pozajmice").val(id);
    $("#knjiga-input").val(knjiga);
    $("#autor-input").val(autor);
    $("#vrsta-input").val(vrsta);
    $("#id-korisnik").val(id_korisnik);


});

// update

$("#izmeniKnjigu").submit(function (e) {
    e.preventDefault();
    let id = $("#id-pozajmice").val();
    let knjiga = $("#knjiga-input").val();
    let autor = $("#autor-input").val();
    let vrsta = $("#vrsta-input").val();
    let id_korisnik = $("#id-korisnik").val();


    let request = $.ajax({
        url: 'handler/update.php',
        type: 'post',
        data: {
            id_pozajmice: id,
            knjiga: knjiga,
            autor: autor,
            vrsta: vrsta,
            id_korisnik: id_korisnik
        }
    });

    request.done(function (response) {

        console.log(response)
        if (response === 'Success') {
            alert("Uspesno ste promenili knjigu.");
            location.reload(true);
        }
    });
});