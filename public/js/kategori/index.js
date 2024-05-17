(function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = $("#form_tambah");
    var formsEdit = $("#form_edit");

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
                    var url = "/kategori/create";
                    var body = $("#form_tambah").serialize();
                    callAPI("post", url, body, "success_insert");
                }

                form.classList.add("was-validated");
            },
            false
        );
    });

    Array.prototype.slice.call(formsEdit).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    event.stopPropagation();
                    var id = $("#submitEdit").attr("data-id");

                    var url = `/kategori/update/` + id;
                    var body = $("#form_edit").serialize();
                    callAPI("post", url, body, "success_insert");
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

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
            data: "category",
            name: "category",
            responsivePriority: -1,
        },
        {
            data: "name",
            name: "name",
            responsivePriority: -1,
        },
        {
            data: "action",
            name: "action",
            responsivePriority: -1,
        },
    ];
    getDataTable("zero-config", "/kategori/list", kolom);
    // getData()
}

function deleteCategory(id) {
    $("#deleteModal").modal("show");
    $("#deleteModal #confirmDelete").attr("data-id", id);
}

function confirmDelete() {
    id = $("#deleteModal #confirmDelete").data("id");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "delete",
        url: `/kategori/${id}`,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#deleteModal").modal("hide");
            $(".datatables-categories").DataTable().ajax.reload();
            success_insert(response);
        },
        error: function (error) {
            $("#deleteModal").modal("hide");
            console.error("Delete error:", error);
            success_insert(error);
        },
    });
}

function editCategory(button) {
  var id = button.getAttribute('data-id');
  var dataFull = JSON.parse(button.getAttribute('data-full'));

  $('#editModal').modal('show');
  $('#editModal #jenis').val(dataFull.category_id).change();
  $('#editModal #name').val(dataFull.name);
  $('#editModal #submitEdit').attr('data-id', dataFull.id);
}

function success_insert(result) {
    $(".datatables-categories").DataTable().ajax.reload();
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
        window.location.reload();
    }
}
