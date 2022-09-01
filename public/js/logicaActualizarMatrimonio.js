$(document).ready(function () {
    var i = $("#canti1").val();
    $("#addp1").click(function () {
        i++;
        $("#dynamic_field1").append(
            '<tr id="row' +
            i +
            '"><td><input type="text"  name="nombres_testigo1[]" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" name="apellidos_testigo1[]" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            i +
            '" class="btn-floating modal-trigger red btn-small btn_remove1 "><i class="material-icons">clear</i></a></td></tr>'
        );
    });

    $(document).on("click", ".btn_remove1", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });
    var j = $("#canti0").val();
    $("#addp0").click(function () {
        j++;
        $("#dynamic_field0").append(
            '<tr id="row' +
            j +
            '"><td><input type="text" name="nombres_testigo0[]" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><input type="text" name="apellidos_testigo0[]" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td><td><a name="remove" id="' +
            j +
            '" class="btn-floating modal-trigger red btn-small btn_remove0 "><i class="material-icons">clear</i></a></td></tr>'
        );
    });

    $(document).on("click", ".btn_remove0", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });

    $("#dynamic_form_actu_confirma").on("submit", function (event) {
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
            if ($("#anio_con").val() < $("#anio_nac").val()) {
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
                    if ($("#anio_con").val() > fecha.getFullYear()) {
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
                                    debugger
                                    if (result.value) {
                                        $.ajax({
                                            method: "POST",
                                            url: "/actucmatrimonio",
                                            data: $(this).serialize(),
                                            dataType: "json",
                                            success: function (data) {
                                                debugger;
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
                                                            "Matrimonio Actualizado Correctamente",
                                                        showConfirmButton: false,
                                                        timer: 1300,
                                                    });
                                                    window.setTimeout(
                                                        function ir() {
                                                            window.location.href =
                                                                "/matrimonios";
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
