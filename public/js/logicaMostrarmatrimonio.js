$(document).ready(function () {
    $("#table_matrimonio").DataTable({
        ordering: false,
        lengthChange: false,
    });
    $("#actamatri").click(function () {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Sección aún en dasarrollo!",
        });
    });
    $(".modal").modal();
    $(document).on("click", ".show-modalg_ma", function () {
        $("#testigos_novio").empty();
        $("#testigos_novia").empty();
        $("#padres_novio").empty();
        $("#padres_novia").empty();
        $("#nombres_novio").text($(this).data("nombres_novio"));
        $("#apellidos_novio").text($(this).data("apellidos_novio"));
        $("#nombres_novia").text($(this).data("nombres_novia"));
        $("#apellidos_novia").text($(this).data("apellidos_novia"));

        $("#dia_ma").text($(this).data("dia_ma"));
        $("#mes_ma").text($(this).data("mes_ma"));
        $("#anio_ma").text($(this).data("anio_ma"));

        $("#ecle_anio").text($(this).data("ecle_anio"));
        $("#ecle_tomo").text($(this).data("ecle_tomo"));
        $("#ecle_pagina").text($(this).data("ecle_pagina"));
        $("#ecle_no").text($(this).data("ecle_no"));

        $("#civil_anio").text($(this).data("civil_anio"));
        $("#civil_tomo").text($(this).data("civil_tomo"));
        $("#civil_pagina").text($(this).data("civil_pagina"));
        $("#civil_no").text($(this).data("civil_no"));
        $("#civil_ciudad").text($(this).data("civil_ciudad"));
        $("#civil_partida").text($(this).data("civil_partida"));
        $("#civil_parroquia").text($(this).data("civil_ciudad"));
        var id_no = $(this).data("id_novios");
        var id_pa = $(this).data("id_padres");
        var id_sa = $(this).data("sacramento_id");
        $.ajax({
            type: "POST",
            url: "mostrartestigosypadres",
            data: {
                _token: $("input[name=_token]").val(),
                novios_id: id_no,
                padres_id: id_pa,
                sacramento_id: id_sa,
            },
        })
            .done(function (data) {
                debugger;
                $("#padres_novio").append(
                    "<p>NOMBRES Y APELLIDOS DEL PADRE: <b>" +
                        data.padres.nombres_p_novio +
                        "</b> <b>" +
                        data.padres.apellidos_p_novio +
                        "</b></p>" +
                        "<p>NOMBRES Y APELLIDOS DE LA MADRE: <b>" +
                        data.padres.nombres_m_novio +
                        "</b> <b>" +
                        data.padres.apellidos_m_novio +
                        "</b></p>"
                );
                $("#padres_novia").append(
                    "<p>NOMBRES Y APELLIDOS DEL PADRE: <b>" +
                        data.padres.nombres_p_novia +
                        "</b> <b>" +
                        data.padres.apellidos_p_novia +
                        "</b></p>" +
                        "<p>NOMBRES Y APELLIDOS DE LA MADRE: <b>" +
                        data.padres.nombres_m_novia +
                        "</b> <b>" +
                        data.padres.apellidos_m_novia +
                        "</b></p>"
                );
                $.each(data.testigos_novio, function (index, val) {
                    $("#testigos_novio").append(
                        "<p>NOMBRES Y APELLIDOS DEL TESTIGO: <b>" +
                            val.nombres_testigo +
                            "</b> <b>" +
                            val.apellidos_testigo +
                            "</b></p>"
                    );
                });
                $.each(data.testigos_novia, function (index, val) {
                    $("#testigos_novia").append(
                        "<p>NOMBRES Y APELLIDOS DEL TESTIGO: <b>" +
                            val.nombres_testigo +
                            "</b> <b>" +
                            val.apellidos_testigo +
                            "</b></p>"
                    );
                });
            })
            .fail(function () {
                console.log("error");
            });
    });
});
