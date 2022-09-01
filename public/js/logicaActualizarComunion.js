$(document).ready(function () {
    var i = $("#canti").val();
    $("#addp").click(function () {
        i++;
        $("#dynamic_field").append(
            '<tr id="row' +
            i +
            '"><td><input type="text" name="nombre_padrino[]" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" name="apellidos_padrino[]" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            i +
            '" class="btn-floating modal-trigger red btn-small btn_removep "><i class="material-icons">clear</i></a></td></tr>'
        );
    });

    $(document).on("click", ".btn_removep", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });

    $("#dynamic_form_actu_comu").on("submit", function (event) {
        event.preventDefault();
        if (
            $("#nombres").val() == "" ||
            $("#apellidos").val() == "" ||
            $("#anio_co").val() == "" ||
            $("#parroco_comunion").val() == "" ||
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
            if ($("#anio_co").val() < $("#anio_nac").val()) {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text:
                        "Año de comunión no puede ser menor al de nacimiento",
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
                    if ($("#anio_co").val() > fecha.getFullYear()) {
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text:
                                "Año de comunión no puede ser mayor al actual",
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
                                Swal.fire({
                                    title: "¿Estás seguro de Actualizar?",
                                    text: "Se actualizará este registro ",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    cancelButtonText: "Cancelar",
                                    confirmButtonText: "¡Si, actualizar!",
                                }).then((result) => {
                                    if (result.value) {

                                        $.ajax({
                                            method: "POST",
                                            url: "/actucomu",
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
                                                            "Comunión Actualizado Correctamente",
                                                        showConfirmButton: false,
                                                        timer: 1300,
                                                    });
                                                    window.setTimeout(
                                                        function ir() {
                                                            window.location.href =
                                                                "/comuniones";
                                                        },
                                                        1300
                                                    );
                                                    console.log("correcto");
                                                }
                                            },
                                        });
                                    }
                                });
                            }
                        }
                    }
                }
            }
        }
    });
});
