$(document).ready(function () {
    $(".input-field label").addClass("active");
    setTimeout(function () {
        $(".ac label").addClass("active");
    }, 1);
    $(".tooltipped").tooltip();

    $(".modal").modal();

    $("#addg").click(function () {
        $.ajax({
            type: "POST",
            url: "addGrupo",
            data: {
                _token: $("input[name=_token]").val(),
                nombre: $("input[name=nombre]").val(),
                descripcion: $('textarea[id="descripcion"]').val()
            }
        })
            .done(function (data) {
                debugger;
                if (data.errors) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "llene todos los campos"
                    });
                } else {
                    // $(".error").remove();
                    $("#tableg").append(
                        "<tr class='grupo" +
                        data.id +
                        "'>" +
                        "<td style='vertical-align: middle; text-align: center'>" +
                        data.nombre +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: left'>" +
                        data.descripcion +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: center;'><a href='#showg' class='hoverable waves-effect waves-light show-modalg btn-floating modal-trigger light-blue btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre='" +
                        data.nombre +
                        "' data-descripcion='" +
                        data.descripcion +
                        "' data-position='bottom' data-tooltip='Ver grupo' ><i class='material-icons'>visibility</i></a> <a href='#editarg' class='hoverable waves-effect waves-light edit-modalg btn-floating modal-trigger amber btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre='" +
                        data.nombre +
                        "' data-descripcion='" +
                        data.descripcion +
                        "' data-position='bottom' data-tooltip='Editar grupo'><i class='material-icons'>edit</i></a> <a class='hoverable waves-effect waves-light delete-modalg btn-floating modal-trigger red btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre='" +
                        data.nombre +
                        "' data-descripcion='" +
                        data.descripcion +
                        "' data-position='bottom' data-tooltip='Eliminar grupo'><i class='material-icons'>delete</i></a></td>" +
                        "</tr>"
                    );
                    // $("#createg").modal("hide");
                    Swal.fire("Correcto", "Nuevo grupo agregado", "success");
                    $(".tooltipped").tooltip();
                    $("#nombre").val("");
                    $("textarea").val("");
                }
            })
            .fail(function () {
                console.log("error");
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Algo salio Mal!"
                });
            });


    });
    $(document).on("click", ".show-modalg", function () {
        //$("#showg").modal("show");
        // $("#i").text($(this).data("id"));
        $("#nomb").text($(this).data("nombre"));
        $("#descrip").text($(this).data("descripcion"));
        // $(".modal-title").text("Ver Grupo");
    });
    // function Edit POST
    $(document).on("click", ".edit-modalg", function () {
        $("#fid").val($(this).data("id"));
        $("#n").val($(this).data("nombre"));
        $("#d").val($(this).data("descripcion"));
    });
    $("#editg").click(function () {
        $.ajax({
            type: "POST",
            url: "editGrupo",
            data: {
                _token: $("input[name=_token]").val(),
                id: $("#fid").val(),
                nombre: $("#n").val(),
                descripcion: $("#d").val()
            }
        })
            .done(function (data) {
                if (data.errors) {
                    // $(".error").removeClass("hidden");
                    // $(".error").text("Nombre es requerido");
                    // $(".error").text("datos es requerido");
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Rellene todo los campos!"
                    });
                } else {
                    $(".grupo" + data.id).replaceWith(
                        " " +
                        "<tr class='grupo" +
                        data.id +
                        "'>" +
                        "<td style='vertical-align: middle; text-align: center'>" +
                        data.nombre +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: left'>" +
                        data.descripcion +
                        "</td>" +
                        "<td style='vertical-align: middle; text-align: center;'><a href='#showg' class='hoverable waves-effect waves-light show-modalg btn-floating modal-trigger light-blue btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre='" +
                        data.nombre +
                        "' data-descripcion='" +
                        data.descripcion +
                        "' data-position='bottom' data-tooltip='Ver grupo' ><i class='material-icons'>visibility</i></a> <a href='#editarg' class='hoverable waves-effect waves-light edit-modalg btn-floating modal-trigger amber btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre='" +
                        data.nombre +
                        "' data-descripcion='" +
                        data.descripcion +
                        "' data-position='bottom' data-tooltip='Editar grupo'><i class='material-icons'>edit</i></a> <a class='hoverable waves-effect waves-light delete-modalg btn-floating modal-trigger red btn-small tooltipped' data-id='" +
                        data.id +
                        "' data-nombre='" +
                        data.nombre +
                        "' data-descripcion='" +
                        data.descripcion +
                        "' data-position='bottom' data-tooltip='Eliminar grupo'><i class='material-icons'>delete</i></a></td>" +
                        "</tr>"
                    );
                    // $("#createg").modal("hide");
                    Swal.fire("Correcto", "Grupo Actualizado", "success");
                    $(".tooltipped").tooltip();
                }
            })
            .fail(function () {
                console.log("error");
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Algo salio mal"
                });
            });
    });
    $(document).on("click", ".delete-modalg", function () {
        debugger;
        var idel = $(this).data("id");
        //$("#idel").val($(this).data("id"));
        //$(".nom").html($(this).data("nombre"));
        Swal.fire({
            title: "¿Estás seguro de eliminar?",
            text: "Se eliminará el grupo " + $(this).data("nombre"),
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, eliminar este grupo!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "deleteGrupo",
                    data: {
                        _token: $("input[name=_token]").val(),
                        id: idel
                    },
                    success: function (data) {
                        Swal.fire(
                            "Eliminado",
                            "Grupo eliminado correctamente.",
                            "success"
                        );
                        $(".grupo" + idel).remove();
                    }
                });
            }
        });
    });

    // form Delete function
    // $(document).on("click", ".delete-modalg", function() {
    //     $("#idel").val($(this).data("id"));
    //     $(".nom").html($(this).data("nombre"));
    // });
    // $("#elimarg").click(function() {
    //     debugger;
    //     $.ajax({
    //         type: "POST",
    //         url: "deleteGrupo",
    //         data: {
    //             _token: $("input[name=_token]").val(),
    //             id: $("#idel").val()
    //         },
    //         success: function(data) {
    //             if (data.errors) {
    //                 Swal.fire({
    //                     icon: "error",
    //                     title: "Error...",
    //                     text: "No se puede eliminar este grupo!"
    //                 });
    //             } else {
    //                 Swal.fire({
    //                     position: "center",
    //                     icon: "success",
    //                     title: "Grupo eliminado correctamente",
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 });
    //                 $(".grupo" + $("#idel").val()).remove();
    //                 $("#elimg").closeModal();
    //             }
    //         }
    //     });
    // });
});
