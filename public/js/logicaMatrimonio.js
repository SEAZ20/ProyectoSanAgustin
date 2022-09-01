$(document).ready(function () {
    $(".tooltipped").tooltip();
    $("select").material_select();
    var i = 1;
    $("#addp1").click(function () {
        i++;
        $("#dynamic_field1").append(
            '<tr id="row' +
            i +
            '"><td><input type="text" id="nombres_testigo1" name="nombres_testigo1[]" placeholder="Nombres del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" id="apellidos_testigo1" name="apellidos_testigo1[]" placeholder="Apellidos del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            i +
            '" class="btn-floating red btn-small btn_remove1 tooltipped" data-position="top" data-tooltip="Quitar testigo"><i class="material-icons">clear</i></a></td></tr>'
        );
    });
    $(document).on("click", ".btn_remove1", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });
    var j = 1;
    $("#addp0").click(function () {
        i++;
        $("#dynamic_field0").append(
            '<tr id="row' +
            j +
            '"><td><input type="text" id="nombres_testigo0" name="nombres_testigo0[]" placeholder="Nombres del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" id="apellidos_testigo0" name="apellidos_testigo0[]" placeholder="Apellidos del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            j +
            '" class="btn-floating red btn-small btn_remove0 tooltipped" data-position="top" data-tooltip="Quitar testigo"><i class="material-icons">clear</i></a></td></tr>'
        );
    });
    $(document).on("click", ".btn_remove0", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });

    $("#dynamic_form_matriminio").on("submit", function (event) {
        event.preventDefault();
        if (
            $("#nombres_novio").val() == "" ||
            $("#apellidos_novio").val() == "" ||
            $("#apellidos_novia").val() == "" ||
            $("#nombres_novia").val() == "" ||
            $("#anio_ma").val() == "" ||
            $("#ecle_anio").val() == "" ||
            $("#ecle_tomo").val() == "" ||
            $("#ecle_pagina").val() == "" ||
            $("#ecle_no").val() == ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Faltan datos por ingresar!",
            });
        } else {
            var fecha = new Date();
            if ($("#anio_ma").val() > fecha.getFullYear()) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Año de matrimonio no puede ser mayor al actual",
                });
            } else {
                if (
                    $("#ecle_anio").val() > fecha.getFullYear() &&
                    $("#civil_anio").val() == ""
                ) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Año del registro eclesiástico incorrecto",
                    });
                } else {
                    if (
                        $("#ecle_anio").val() > fecha.getFullYear() ||
                        $("#civil_anio").val() > fecha.getFullYear()
                    ) {
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text:
                                "Año del registro eclesiástico o civil incorrecto",
                        });
                    } else {
                        $.ajax({
                            method: "post",
                            url: "guardarmatriminio",
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function (data) {
                                if (data.error) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Error...",
                                        text: "Faltan datos de testigos",
                                    });
                                    console.log("error");
                                } else {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title:
                                            "Matrimonio Registrado Correctamente",
                                        showConfirmButton: false,
                                        timer: 1300,
                                    });
                                    document
                                        .getElementById(
                                            "dynamic_form_matriminio"
                                        )
                                        .reset();
                                    console.log("correcto");
                                }
                            },
                        });
                    }
                }
            }
        }
    });
});
