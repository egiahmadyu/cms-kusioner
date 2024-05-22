(function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = $("#form_tambah");
   

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
                    var url = "/kuesioner/tambah/simpan";
                    var body = $("#form_tambah").serialize();
                    callAPI("post", url, body, "success_tambah");
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

function success_tambah(data) {
    console.log(data);
}

