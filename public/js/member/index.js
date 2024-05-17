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
                    var url = "/member";
                    var body = $("#form_tambah").serialize();
                    callAPI("post", url, body, "success_insert");
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

function editUser(id) {
    window.location = "/member/show/" + id + "";
}

$(document).ready(function () {
    datalist();
});

function datalist() {
    var kolom = [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false,
            responsivePriority: 0,
        },
        {
            data: "name",
            name: "name",
            responsivePriority: -1,
        },
        {
            data: "nrp",
            name: "nrp",
            responsivePriority: -1,
        },
        {
            data: "pangkat",
            name: "pangkat",
            responsivePriority: -1,
        },
        {
            data: "position",
            name: "position",
            responsivePriority: -1,
        },
        {
            data: "department",
            name: "department",
            responsivePriority: -1,
        },
        {
            data: "action",
            name: "action",
            responsivePriority: -1,
        },
    ];
    getDataTable("zero-config", "/member/list", kolom);
    // getData()
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
        url: `/member/${id}`,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#deleteModal").modal("hide");
            $(".datatables-members").DataTable().ajax.reload();
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
    $(".datatables-members").DataTable().ajax.reload();
    $("#createModal").modal("hide");
    $("#editModal").modal("hide");
    if (result.status == 200) {
        add_notification({
            type: "success",
            msg: result.message,
            position: "center",
            width: 320,
            height: 60,
            autohide: true,
        });
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
