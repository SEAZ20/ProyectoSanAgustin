function myFunction() {

    var meses = new Array(
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    );
    var f = new Date();
    $("#fecha").text("<strong>Calceta, " + f.getDate() + " de " + meses[f.getMonth()] + " " + f.getFullYear() + "</strong>");
}