$(document).ready(function () {
    // $("body").on("contextmenu", function (e) {
    //     return false;
    // });
    $("#cerrar").click(function () {
        Swal.fire({
            title: "Salir",
            text: "¿Esta seguro que desea salir?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7E418F",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Salir",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById("logout-form").submit();
            }
        });
    });
    $("#cerrar2").click(function () {
        Swal.fire({
            title: "Salir",
            text: "¿Esta seguro que desea salir?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7E418F",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Salir",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById("logout-form2").submit();
            }
        });
    });
});
