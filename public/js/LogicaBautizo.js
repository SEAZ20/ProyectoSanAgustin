$(document).ready(function () {
    $(".tooltipped").tooltip();
    $("select").material_select();
    var i = 1;
    $("#addp").click(function () {
        i++;
        $("#dynamic_field").append(
            '<tr id="row' +
            i +
            '"><td><input type="text" name="nombre_padrino[]" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" name="apellidos_padrino[]" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            i +
            '" class="create-modalg btn-floating modal-trigger red btn-small btn_remove tooltipped" data-position="top" data-tooltip="Quitar Padrino"><i class="material-icons">clear</i></a></td></tr>'
        );
    });

    $(document).on("click", ".btn_remove", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();

        debugger;
    });

    $("#dynamic_form").on("submit", function (event) {
        event.preventDefault();
        if (
            $("#nombres").val() == "" ||
            $("#apellidos").val() == "" ||
            $("#anio_nac").val() == "" ||
            $("#ciudad_nac").val() == "" ||
            $("#anio_sa").val() == "" ||
            $("#parroco").val() == "" ||
            $("#ecle_anio").val() == "" ||
            $("#ecle_tomo").val() == "" ||
            $("#ecle_pagina").val() == "" ||
            $("#ecle_no").val() == "" ||
            $("#nombres_p").val() == "" ||
            $("#apellidos_p").val() == "" ||
            $("#nombres_m").val() == "" ||
            $("#apellidos_m").val() == "" ||
            $("#nombre_padrino").val() == "" ||
            $("#apellidos_m").val() == "" ||
            $("#apellidos_padrino").val() == ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Faltan datos por ingresar",
            });
        } else {
            if ($("#anio_sa").val() < $("#anio_nac").val()) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Año de bautizo no puede ser menor al de nacimiento",
                });
            } else {
                if ($("#nota").val() == "") {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text:
                            "Si no existe nota marginal ingrese la palabra NINGUNA",
                    });
                } else {
                    var fecha = new Date();
                    if (
                        $("#anio_nac").val() > fecha.getFullYear() ||
                        $("#anio_sa").val() > fecha.getFullYear()
                    ) {
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "Año de nacimiento o de bautizo incorrecto",
                        });
                    } else {
                        if (
                            $("#ecle_anio").val() > fecha.getFullYear() &&
                            $("#civil_anio").val() == ""
                        ) {
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text:
                                    "Año del registro eclesiástico incorrecto",
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
                                // $("#progre").append(
                                //     "<div class='progress'>" +
                                //         "<div class='indeterminate'></div>" +
                                //         "</div>"
                                // );
                                $.ajax({
                                    method: "POST",
                                    url: "guardarbautizo",
                                    data: $(this).serialize(),
                                    dataType: "json",
                                    success: function (data) {
                                        if (data.error) {
                                            Swal.fire({
                                                icon: "error",
                                                title: "Error...",
                                                text:
                                                    "Faltan datos de padrinos",
                                            });
                                            // $("#progre").empty();
                                            console.log("error");
                                        } else {
                                            Swal.fire({
                                                position: "center",
                                                icon: "success",
                                                title:
                                                    "Bautizo Registrado Correctamente",
                                                showConfirmButton: false,
                                                timer: 1300,
                                            });
                                            // $("#progre").empty();
                                            document
                                                .getElementById("dynamic_form")
                                                .reset();
                                            console.log("correcto");
                                        }
                                    },
                                });
                            }
                        }
                    }
                }
            }
        }
    });
});
