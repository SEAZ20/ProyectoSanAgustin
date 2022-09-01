$(document).ready(function () {
    var table = $("#table_consulta").DataTable({
        ordering: false,
        lengthChange: false,
        searching: false,
    });

    $("#sacra").change(function () {
        if ($("#sacra option:selected").text() == "BAUTIZO") {
            $(".cambiar").replaceWith(
                "<tr class='cambiar'><th width='50px'>CÓDIGO</th> <th>NOMBRES Y APELLIDOS</th> <th width='100px'>FECHA BAUTIZO</th> <th>PADRE</th><th>MADRE</th></tr>"
            );
            $(".nom").text("Nombres");
            $(".ape").text("Apellidos");
        } else {
            if ($("#sacra option:selected").text() == "COMUNIÓN") {
                $(".cambiar").replaceWith(
                    "<tr class='cambiar'><th width='50px'>CÓDIGO</th> <th>NOMBRES Y APELLIDOS</th> <th width='100px'>FECHA COMUNIÓN</th> <th>PADRE</th><th>MADRE</th></tr>"
                );
                $(".nom").text("Nombres");
                $(".ape").text("Apellidos");
            } else {
                if ($("#sacra option:selected").text() == "CONFIRMACIÓN") {
                    $(".cambiar").replaceWith(
                        "<tr class='cambiar'><th width='50px'>CÓDIGO</th> <th>NOMBRES Y APELLIDOS</th> <th width='120px'>FECHA CONFIRMACIÓN</th> <th>PADRE</th><th>MADRE</th></tr>"
                    );
                    $(".nom").text("Nombres");
                    $(".ape").text("Apellidos");
                } else {
                    if ($("#sacra option:selected").text() == "MATRIMONIO") {
                        $(".cambiar").replaceWith(
                            "<tr class='cambiar'><th width='50px'>CÓDIGO</th> <th>NOVIO</th><th>NOVIA</th><th width='110px'>FECHA MATRIMONIO</th><th width='110px'>AÑOS DE CASADOS</th></tr>"
                        );
                        $(".nom").text("Nombres de Novio(a)");
                        $(".ape").text("Apellidos de Novio(a)");
                    }
                }
            }
        }
        table.destroy();
        $("#table_consulta tbody tr").remove();
        table = $("#table_consulta").DataTable({
            ordering: false,
            lengthChange: false,
            searching: false,
        });
    });
    $("#buscar").on("submit", function (event) {
        event.preventDefault();
        table.destroy();
        $("#table_consulta tbody tr").remove();
        table = $("#table_consulta").DataTable({
            ordering: false,
            lengthChange: false,
            searching: false,
        });
        if ($("#sacra option:selected").text() == "BAUTIZO") {
            $.ajax({
                type: "POST",
                url: "busquedabautizo",
                data: {
                    _token: $("input[name=_token]").val(),
                    nombres: $("input[name=nombres]").val(),
                    apellidos: $("input[name=apellidos]").val(),
                },
                success: function (data) {
                    if (data.error) {
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "Rellene todo los campos!",
                        });
                    } else {
                        if (data.error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: "llene todo los campos",
                            });
                        } else {
                            if (data.personas.length == 0) {
                                Swal.fire(
                                    "No se encontraron resultados",
                                    "No existe ningun registro con esos nombres y apellidos",
                                    "warning"
                                );
                            } else {
                                debugger;
                                //$("#table_consulta tbody tr").remove();
                                table.destroy();
                                $.each(data.personas, function (index2, val) {
                                    $(".body").append(
                                        "<tr>" +
                                        "<td>" +
                                        val.slug +
                                        "</td><td>" +
                                        val.nombres +
                                        " " +
                                        val.apellidos +
                                        "</td><td>" +
                                        val.dia_sa +
                                        " DE " +
                                        val.mes_sa +
                                        " DE " +
                                        val.anio_sa +
                                        "</td><td>" +
                                        data.padres[index2].nombres_p +
                                        " " +
                                        data.padres[index2].apellidos_p +
                                        "</td><td>" +
                                        data.padres[index2].nombres_m +
                                        " " +
                                        data.padres[index2].apellidos_m +
                                        "</td></tr>"
                                    );
                                });
                                table = $("#table_consulta").DataTable({
                                    ordering: false,
                                    lengthChange: false,
                                    searching: false,
                                });
                            }
                        }
                    }
                },
            });
        } else {
            if ($("#sacra option:selected").text() == "COMUNIÓN") {
                $.ajax({
                    type: "POST",
                    url: "busquedacomunion",
                    data: {
                        _token: $("input[name=_token]").val(),
                        nombres: $("input[name=nombres]").val(),
                        apellidos: $("input[name=apellidos]").val(),
                    },
                    success: function (data) {
                        debugger;
                        if (data.error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: "Rellene todo los campos!",
                            });
                        } else {
                            if (data.personas.length == 0) {
                                Swal.fire(
                                    "No se encontraron resultados",
                                    "No existe ningun registro con esos nombres y apellidos",
                                    "warning"
                                );
                            } else {
                                debugger;
                                //$("#table_consulta tbody tr").remove();
                                table.destroy();
                                $.each(data.personas, function (index2, val) {
                                    $(".body").append(
                                        "<tr class='odd'>" +
                                        "<td>" +
                                        val.slug +
                                        "</td><td>" +
                                        val.nombres +
                                        " " +
                                        val.apellidos +
                                        "</td><td>" +
                                        val.dia_co +
                                        " DE " +
                                        val.mes_co +
                                        " DE " +
                                        val.anio_co +
                                        "</td><td>" +
                                        data.padres[index2].nombres_p +
                                        " " +
                                        data.padres[index2].apellidos_p +
                                        "</td><td>" +
                                        data.padres[index2].nombres_m +
                                        " " +
                                        data.padres[index2].apellidos_m +
                                        "</td></tr>"
                                    );
                                });
                                table = $("#table_consulta").DataTable({
                                    ordering: false,
                                    lengthChange: false,
                                    searching: false,
                                });
                            }
                        }
                    },
                });
            } else {
                if ($("#sacra option:selected").text() == "CONFIRMACIÓN") {
                    $.ajax({
                        type: "POST",
                        url: "busquedaconfirma",
                        data: {
                            _token: $("input[name=_token]").val(),
                            nombres: $("input[name=nombres]").val(),
                            apellidos: $("input[name=apellidos]").val(),
                        },
                        success: function (data) {
                            if (data.error) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error...",
                                    text: "Rellene todo los campos!",
                                });
                            } else {
                                if (data.personas.length == 0) {
                                    Swal.fire(
                                        "No se encontraron resultados",
                                        "No existe ningun registro con esos nombres y apellidos",
                                        "warning"
                                    );
                                } else {
                                    debugger;
                                    //$("#table_consulta tbody tr").remove();
                                    table.destroy();
                                    $.each(data.personas, function (
                                        index2,
                                        val
                                    ) {
                                        $(".body").append(
                                            "<tr class='odd'>" +
                                            "<td>" +
                                            val.slug +
                                            "</td><td>" +
                                            val.nombres +
                                            " " +
                                            val.apellidos +
                                            "</td><td>" +
                                            val.dia_con +
                                            " DE " +
                                            val.mes_con +
                                            " DE " +
                                            val.anio_con +
                                            "</td><td>" +
                                            data.padres[index2].nombres_p +
                                            " " +
                                            data.padres[index2].apellidos_p +
                                            "</td><td>" +
                                            data.padres[index2].nombres_m +
                                            " " +
                                            data.padres[index2].apellidos_m +
                                            "</td></tr>"
                                        );
                                    });
                                    table = $("#table_consulta").DataTable({
                                        ordering: false,
                                        lengthChange: false,
                                        searching: false,
                                    });
                                }
                            }
                        },
                    });
                } else {
                    if ($("#sacra option:selected").text() == "MATRIMONIO") {
                        $.ajax({
                            type: "POST",
                            url: "busquedamatrimonio",
                            data: {
                                _token: $("input[name=_token]").val(),
                                nombres: $("input[name=nombres]").val(),
                                apellidos: $("input[name=apellidos]").val(),
                            },
                            success: function (data) {
                                var fecha = new Date();
                                if (data.error) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Error...",
                                        text: "Llene todo los campos!",
                                    });
                                } else {
                                    if (data.personas.length == 0) {
                                        Swal.fire(
                                            "No se encontraron resultados",
                                            "No existe ningun registro con esos nombres y apellidos",
                                            "warning"
                                        );
                                    } else {
                                        debugger;
                                        //$("#table_consulta tbody tr").remove();
                                        table.destroy();
                                        $.each(data.personas, function (
                                            index,
                                            val
                                        ) {
                                            $(".body").append(
                                                "<tr class='odd'>" +
                                                "<td>" +
                                                val.slug +
                                                "</td><td>" +
                                                val.nombres_novio +
                                                " " +
                                                val.apellidos_novio +
                                                "</td><td>" +
                                                val.nombres_novia +
                                                " " +
                                                val.apellidos_novia +
                                                "</td><td>" +
                                                val.dia_ma +
                                                " DE " +
                                                val.mes_ma +
                                                " DE " +
                                                val.anio_ma +
                                                "</td><td>" +
                                                (fecha.getFullYear() -
                                                    val.anio_ma) +
                                                "</td></tr>"
                                            );
                                        });
                                        table = $("#table_consulta").DataTable({
                                            ordering: false,
                                            lengthChange: false,
                                            searching: false,
                                        });
                                    }
                                }
                            },
                        });
                    }
                }
            }
        }
    });
});
