$(document).ready(function () {
    $("#table_bautizo").DataTable({
        ordering: false,
        lengthChange: false,
    });
    $(document).on("click", ".ingrebau", function () {

        var id = $(this).data("id_persona");
        var slug = $(this).data("slug");
        $.ajax({
            url: 'existecomunion/' + $(this).data("id_persona"),
            type: 'GET',
            dataType: 'json',

        })
            .done(function (datos) {


                if (datos == true) {
                    Swal.fire(
                        'Mensaje',
                        'Esta persona ya ralizó la comunión',
                        'error'
                    )
                } else {

                    window.location.href = "registarcomunion1/" + slug;
                }
                console.log("success");
            })
            .fail(function () {
                console.log("error");
            })
    });
    $(document).on("click", ".ingreconfir", function () {

        var id = $(this).data("id_persona");
        var slug = $(this).data("slug");
        $.ajax({
            url: 'existeconfirma/' + $(this).data("id_persona"),
            type: 'GET',
            dataType: 'json',

        })
            .done(function (datos) {


                if (datos == true) {
                    Swal.fire(
                        'Mensaje',
                        'Esta persona ya ralizó la confirmación',
                        'error'
                    )
                } else {

                    window.location.href = "registarconfirma1/" + slug;
                }
                console.log("success");
            })
            .fail(function () {
                console.log("error");
            })
    });
    $(".modal").modal();
    //VISUALIZAR BAUTIZO
    $(document).on("click", ".show-modalg_bau", function () {
        $("#padri").empty();
        $("#padres").empty();
        $("#nombres").text($(this).data("nombres"));
        $("#apellidos").text($(this).data("apellidos"));

        $("#ciudad_nac").text($(this).data("ciudad_nac"));

        $("#dia_nac").text($(this).data("dia_nac"));
        $("#mes_nac").text($(this).data("mes_nac"));
        $("#anio_nac").text($(this).data("anio_nac"));

        $("#dia_sa").text($(this).data("dia_sa"));
        $("#mes_sa").text($(this).data("mes_sa"));
        $("#anio_sa").text($(this).data("anio_sa"));
        $("#parroco").text($(this).data("parroco"));

        $("#ecle_anio").text($(this).data("ecle_anio"));
        $("#ecle_tomo").text($(this).data("ecle_tomo"));
        $("#ecle_pagina").text($(this).data("ecle_pagina"));
        $("#ecle_no").text($(this).data("ecle_no"));

        $("#civil_anio").text($(this).data("civil_anio"));
        $("#civil_tomo").text($(this).data("civil_tomo"));
        $("#civil_pagina").text($(this).data("civil_pagina"));
        $("#civil_no").text($(this).data("civil_no"));
        $("#civil_parroquia").text($(this).data("civil_parroquia"));

        $("#nota").text($(this).data("nota"));

        var id_per = $(this).data("id_persona");
        var id_pa = $(this).data("id_padre");
        var id_sa = $(this).data("sacramento_id");
        $.ajax({
            type: "POST",
            url: "mostrarpadrinos",
            data: {
                _token: $("input[name=_token]").val(),
                persona_id: id_per,
                padre_id: id_pa,
                sacramento_id: id_sa,
            },
        })
            .done(function (data) {
                debugger;
                $("#padres").append(
                    "<p>NOMBRES Y APELLIDOS DEL PADRE: <b>" +
                    data.padres.nombres_p +
                    "</b> <b>" +
                    data.padres.apellidos_p +
                    "</b></p>" +
                    "<p>NOMBRES Y APELLIDOS DE LA MADRE: <b>" +
                    data.padres.nombres_m +
                    "</b> <b>" +
                    data.padres.apellidos_m +
                    "</b></p>"
                );
                $.each(data.padrinos, function (index, val) {
                    $("#padri").append(
                        "<p>NOMBRES Y APELLIDOS DEL PADRINO: <b>" +
                        val.nombre_padrino +
                        "</b> <b>" +
                        val.apellidos_padrino +
                        "</b></p>"
                    );
                });
            })
            .fail(function () {
                console.log("error");
            });
    });
});
