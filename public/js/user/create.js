(function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = $("#form_tambah");
    $("#mabesRole").hide();
    $("#poldaWilayah").hide();
    $("#poldaRole").hide();

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    event.stopPropagation();
                    var url = "/user";
                    var body = $("#form_tambah").serialize();
                    callAPI("post", url, body, "success_insert");
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

function success_insert(result) {
    if (result.status == 200) {
        add_notification({
            type: "success",
            msg: result.message,
            position: "center",
            width: 320,
            height: 60,
            autohide: true,
        });
        window.location = "/user";
    } else {
        add_notification({
            type: "error",
            msg: result.message,
            position: "center",
            width: 320,
            height: 60,
            autohide: true,
        });
    }
}

$("#mainRole").on("change", function () {
    if (this.value == "mabes") {
        $("#mabesRole").show();
        $("#poldaWilayah").hide();
        $("#poldaRole").hide();
    } else if (this.value == "polda") {
        $("#mabesRole").hide();
        $("#poldaWilayah").show();
        $("#poldaRole").hide();
    } else {
        $("#mabesRole").hide();
        $("#poldaWilayah").hide();
        $("#poldaRole").hide();
    }
});

$("#poldaWilayah").on("change", function () {
    $("#poldaRole").show();
});
