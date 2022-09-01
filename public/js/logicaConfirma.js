$(document).ready(function () {
    $(".tooltipped").tooltip();
    $("select").material_select();
    var i = 1;
    $("#addp1").click(function () {
        i++;
        $("#dynamic_field1").append(
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
    });

    $("#dynamic_form_confirma1").on("submit", function (event) {
        event.preventDefault();
        if (
            $("#nombres").val() == "" ||
            $("#apellidos").val() == "" ||
            $("#anio_con").val() == "" ||
            $("#obispo_confirma").val() == "" ||
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
            if ($("#nota").val() == "") {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text:
                        "Si no existe nota marginal ingrese la palabra NINGUNA",
                });
            } else {
                var fecha = new Date();
                if ($("#anio_con").val() > fecha.getFullYear()) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text:
                            "Año de confirmación no puede ser mayor al actual",
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
                            $.ajax({
                                method: "post",
                                url: "/guardarconfirma1",
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
                                        console.log("error");
                                    } else {
                                        Swal.fire({
                                            position: "center",
                                            icon: "success",
                                            title:
                                                "Confirmación registrada Correctamente",
                                            showConfirmButton: false,
                                            timer: 1300,
                                        });
                                        window.setTimeout(function ir() {
                                            window.location.href =
                                                "/bautizos";
                                        }, 1300);
                                        console.log("correcto");
                                    }
                                },
                            });

                        }
                    }
                }
            }
        }
    });
    var j = 1;
    $("#addp2").click(function () {
        j++;
        $("#dynamic_field2").append(
            '<tr id="row' +
            j +
            '"><td><input type="text" name="nombre_padrino[]" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" name="apellidos_padrino[]" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            j +
            '" class="create-modalg btn-floating modal-trigger red btn-small btn_remove tooltipped" data-position="top" data-tooltip="Quitar Padrino"><i class="material-icons">clear</i></a></td></tr>'
        );
    });

    $("#dynamic_form_confirma2").on("submit", function (event) {
        event.preventDefault();
        if (
            $("#nombres").val() == "" ||
            $("#apellidos").val() == "" ||
            $("#anio_con").val() == "" ||
            $("#ciudad_sa").val() == "" ||
            $("#anio_sa").val() == "" ||
            $("#obispo_confirma").val() == "" ||
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
                    $("#anio_con").val() > fecha.getFullYear() ||
                    $("#anio_sa").val() > fecha.getFullYear()
                ) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text:
                            "Año de nacimiento, bautizo o confirma no pueden ser mayor al actual",
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
                                "Año del registro eclesiástico o civil incorrecto",
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
                                    "Año del registro eclesiástico o civil no pueden ser mayor al actual",
                            });
                        } else {
                            $.ajax({
                                method: "post",
                                url: "/guardarconfirma2",
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
                                        console.log("error");
                                    } else {
                                        Swal.fire({
                                            position: "center",
                                            icon: "success",
                                            title:
                                                "Confirmación registrada Correctamente",
                                            showConfirmButton: false,
                                            timer: 1300,
                                        });
                                        document
                                            .getElementById(
                                                "dynamic_form_confirma2"
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
        }
    });
});
