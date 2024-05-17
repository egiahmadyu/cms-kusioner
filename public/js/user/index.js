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

$(document).ready(function () {
    userlist();
});

function userlist() {
    var kolom = [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false,
            responsivePriority: 0,
        },
        {
            data: "username",
            name: "username",
            responsivePriority: -1,
        },
        {
            data: "name",
            name: "name",
            responsivePriority: -1,
        },
        {
            data: "role",
            name: "role",
            orderable: false,
            searchable: false,
            responsivePriority: -1,
        },
        {
            data: "polda",
            name: "polda",
            orderable: false,
            searchable: false,
            responsivePriority: -1,
        },
        {
            data: "division",
            name: "division",
            orderable: false,
            searchable: false,
            responsivePriority: -1,
        },
        {
            data: "action",
            name: "action",
            responsivePriority: -1,
        },
    ];
    getDataTable("zero-config", "/user/list", kolom);
    // getData()
}

function editUser(id) {
    window.location = "/user/show/" + id + "";
}

function deleteUser(id) {
    $("#deleteModal").modal("show");
    $("#deleteModal #confirmDelete").attr("data-id", id);
}

function confirmDelete() {
    id = $("#deleteModal #confirmDelete").data("id");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "delete",
        url: `/user/${id}`,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#deleteModal").modal("hide");
            $(".datatables-users").DataTable().ajax.reload();
            success_insert(response);
        },
        error: function (error) {
            $("#deleteModal").modal("hide");
            console.error("Delete error:", error);
            success_insert(error);
        },
    });
}

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
