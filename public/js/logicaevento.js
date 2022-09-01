$(document).ready(function () {
    $(".input-field label").addClass("active");
    setTimeout(function () {
        $(".act label").addClass("active");
    }, 1);
    $(".tooltipped").tooltip();

    $(".modal").modal();

    $("#add_e").click(function () {
        $.ajax({
            type: "POST",
            url: "addEvento",
            data: {
                _token: $("input[name=_token]").val(),
                nombre_e: $("input[name=nombre_e]").val(),
                fecha: $("input[name=fecha]").val(),
                descripcion_e: $('textarea[id="descripcion_e"]').val(),
            },
            success: function (data) {
                if (data.errors) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Rellene todo los campos",
                    });
                } else {
                    debugger;
                    $("#table_e").append(
                        "<tr class='evento" +
                        data.id +
                        "'>" +
                        "<td style='vertical-align: middle; text-align: center'>" +
                        data.nombre_e +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: center'>" +
                        data.fecha +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: left'>" +
                        data.descripcion_e +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: center;'><a href='#show_e' class='hoverable waves-effect waves-light show-modal_e btn-floating modal-trigger light-blue btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre_e='" +
                        data.nombre_e +
                        "' data-fecha='" +
                        data.fecha +
                        "' data-descripcion_e='" +
                        data.descripcion_e +
                        "' data-position='bottom' data-tooltip='Ver evento'><i class='material-icons'>visibility</i></a> <a href='#editar_e' class='hoverable waves-effect waves-light edit-modal_e btn-floating modal-trigger amber btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre_e='" +
                        data.nombre_e +
                        "' data-fecha='" +
                        data.fecha +
                        "' data-descripcion_e='" +
                        data.descripcion_e +
                        "' data-position='bottom' data-tooltip='Editar evento'><i class='material-icons'>edit</i></a> <a class='hoverable waves-effect waves-light delete-modal_e btn-floating red btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre_e='" +
                        data.nombre_e +
                        "' data-fecha='" +
                        data.fecha +
                        "' data-descripcion_e='" +
                        data.descripcion_e +
                        "' data-position='bottom' data-tooltip='Eliminar evento'><i class='material-icons'>delete</i></a></td>" +
                        "</tr>"
                    );
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Evento gregado correctamente",
                        showConfirmButton: false,
                        timer: 1300,
                    });
                    //Swal.fire("Correcto!", "Nuevo evento agregado!", "success");
                    $("#nombre_e").val("");
                    $("textarea").val("");
                    $(".tooltipped").tooltip();
                }
            },
        });
    });
    $(document).on("click", ".show-modal_e", function () {
        $("#nomb_e").text($(this).data("nombre_e"));
        $("#fech").text($(this).data("fecha"));
        $("#descrip_e").text($(this).data("descripcion_e"));
    });
    // function Edit POST
    $(document).on("click", ".edit-modal_e", function () {
        $("#id_e").val($(this).data("id"));
        $("#n_e").val($(this).data("nombre_e"));
        $("#f_e").val($(this).data("fecha"));
        $("#d_e").val($(this).data("descripcion_e"));
    });
    $("#edit_e").click(function () {
        $.ajax({
            type: "POST",
            url: "editEvento",
            data: {
                _token: $("input[name=_token]").val(),
                id: $("#id_e").val(),
                nombre_e: $("#n_e").val(),
                fecha: $("#f_e").val(),
                descripcion_e: $("#d_e").val(),
            },
        })
            .done(function (data) {
                if (data.errors) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Llene todo los campos",
                    });
                } else {
                    $(".evento" + data.id).replaceWith(
                        " " +
                        "<tr class='evento" +
                        data.id +
                        "'>" +
                        "<td style='vertical-align: middle; text-align: center'>" +
                        data.nombre_e +
                        "<td style='vertical-align: middle; text-align: center'>" +
                        data.fecha +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: left'>" +
                        data.descripcion_e +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: center;'><a href='#show_e' class='hoverable waves-effect waves-light show-modal_e btn-floating modal-trigger light-blue btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre_e='" +
                        data.nombre_e +
                        "' data-fecha='" +
                        data.fecha +
                        "' data-descripcion_e='" +
                        data.descripcion_e +
                        "' data-position='bottom' data-tooltip='Ver evento'><i class='material-icons'>visibility</i></a> <a href='#editar_e' class='hoverable waves-effect waves-light edit-modal_e btn-floating modal-trigger amber btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre_e='" +
                        data.nombre_e +
                        "' data-fecha='" +
                        data.fecha +
                        "' data-descripcion_e='" +
                        data.descripcion_e +
                        "' data-position='bottom' data-tooltip='Editar evento'><i class='material-icons'>edit</i></a> <a class='hoverable waves-effect waves-light delete-modal_e btn-floating red btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre_e='" +
                        data.nombre_e +
                        "' data-fecha='" +
                        data.fecha +
                        "' data-descripcion_e='" +
                        data.descripcion_e +
                        "' data-position='bottom' data-tooltip='Eliminar evento'><i class='material-icons'>delete</i></a></td>" +
                        "</tr>"
                    );
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Evento actualizado correctamente",
                        showConfirmButton: false,
                        timer: 1300,
                    });
                    $(".tooltipped").tooltip();
                }
            })
            .fail(function () {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Algo salio mal!",
                });
                console.log("error");
            });
    });
    // form Delete function
    $(document).on("click", ".delete-modal_e", function () {
        var idel = $(this).data("id");
        Swal.fire({
            title: "¿Estás seguro de eliminar?",
            text: "Se eliminará el evento " + $(this).data("nombre_e"),
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, eliminar este evento!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "deleteEvento",
                    data: {
                        _token: $("input[name=_token]").val(),
                        id: idel,
                    },
                })
                    .done(function () {
                        Swal.fire(
                            "Eliminado",
                            "Evento eliminado correctamente.",
                            "success"
                        );
                        $(".evento" + idel).remove();
                    })
                    .fail(function () {
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "Algo salio mal",
                        });
                        console.log("error");
                    });
            }
        });
    });
    $(".modal-footer").on("click", ".delete", function () {
        $.ajax({
            type: "POST",
            url: "deleteEvento",
            data: {
                _token: $("input[name=_token]").val(),
                id: $(".id").text(),
            },
        })
            .done(function () {
                $(".evento" + $(".id").text()).remove();
            })
            .fail(function () {
                console.log("error");
            });
    });
});
