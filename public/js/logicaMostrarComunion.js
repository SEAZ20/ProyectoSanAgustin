$(document).ready(function () {
    $("#table_comunion").DataTable({
        ordering: false,
        lengthChange: false,
    });
    $("#actacomu").click(function () {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Sección aún en dasarrollo",
        });
    });

    $(".modal").modal();
    $(document).on("click", ".show-modalg_co", function () {
        $("#padri").empty();
        $("#padres").empty();
        $("#nombres").text($(this).data("nombres"));
        $("#apellidos").text($(this).data("apellidos"));

        $("#dia_sa").text($(this).data("dia_sa"));
        $("#mes_sa").text($(this).data("mes_sa"));
        $("#anio_sa").text($(this).data("anio_sa"));
        $("#ciudad_sa").text($(this).data("ciudad_sa"));
        $("#parroco_comunion").text($(this).data("parroco_comunion"));

        $("#dia_co").text($(this).data("dia_co"));
        $("#mes_co").text($(this).data("mes_co"));
        $("#anio_co").text($(this).data("anio_co"));

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
