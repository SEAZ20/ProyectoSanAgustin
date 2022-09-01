$(document).ready(function () {
    $(".input-field label").addClass("active");
    setTimeout(function () {
        $(".actu label").addClass("active");
    }, 1);
    $(".tooltipped").tooltip();

    $(".modal").modal();
    $("#addinfo").click(function () {
        event.preventDefault();
        if (
            $("#direccion").val() == "" ||
            $("#horario").val() == "" ||
            $("#urlfacebook").val() == "" ||
            $("#urltwitter").val() == "" ||
            $("#urlinstagram").val() == "" ||
            $("#email").val() == ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Todos los campos son requeridos",
            });
        } else {
            $("#guardarinfo").submit();
        }
    });
    $(document).on("click", ".actu_info", function () {
        $("#id_i").val($(this).data("id"));
        $("#dir").val($(this).data("direccion"));
        $("#h").val($(this).data("horario"));
        $("#uf").val($(this).data("urlfacebook"));
        $("#ut").val($(this).data("urltwitter"));
        $("#ui").val($(this).data("urlinstagram"));
        $("#ui").val($(this).data("urlinstagram"));
        $("#em").val($(this).data("email"));
    });
    $("#acinfo").click(function () {
        if (
            $("#dir").val() == "" ||
            $("#h").val() == "" ||
            $("#uf").val() == "" ||
            $("#ut").val() == "" ||
            $("#ui").val() == "" ||
            $("#em").val() == ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Todos los campos son requeridos",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "editInfo",
                data: {
                    _token: $("input[name=_token]").val(),
                    id: $("#id_i").val(),
                    direccion: $("#dir").val(),
                    horario: $("#h").val(),
                    urlfacebook: $("#uf").val(),
                    urltwitter: $("#ut").val(),
                    urlinstagram: $("#ui").val(),
                    email: $("#em").val(),
                },
                success: function (data) {
                    debugger;
                    $("#dire").text(data.direccion);
                    $("#hor").text(data.horario);
                    $("#urlf").text(data.urlfacebook);
                    $("#urlt").text(data.urltwitter);
                    $("#urli").text(data.urlinstagram);
                    $("#ema").text(data.email);
                    $(".datos").replaceWith(
                        " " +
                        "<a href='#actuinf' class='actu_info modal-trigger btn blue datos' data-id='" +
                        data.id +
                        "' data-direccion='" +
                        data.direccion +
                        "' data-horario='" +
                        data.horario +
                        "' data-urlfacebook='" +
                        data.urlfacebook +
                        "' data-urltwitter='" +
                        data.urltwitter +
                        "' data-urlinstagram='" +
                        data.urlinstagram +
                        "' data-email='" +
                        data.email +
                        "'> <i class='material-icons left' >edit</i>Actulizar</a>"
                    );
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Información actualizada",
                        showConfirmButton: false,
                        timer: 1300,
                    });
                    $("#actuinf").closeModal();
                },
            });
        }
    });
});
